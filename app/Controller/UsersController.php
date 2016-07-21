<?php

	namespace Controller;
    use \Manager\UsersManager;
    use \Manager\SessionManager;
	use \W\Controller\Controller;
    use \W\Manager\UserManager;
    use \W\Security\AuthentificationManager;
    use \Functions\SendEmail as SendEmail;

class UsersController extends Controller
{
    //INSCRIPTION\\
    //Calling the inscription view
    public function register()
    {
        $this->show('user/register');
    }

    //Inscription method
    public function registerPost(){

        // Gathering POST datas (form)
        $email = isset($_POST['email']) ? trim($_POST['email']): '';
        $password = isset($_POST['password']) ? trim($_POST['password']): '';
        $street = isset($_POST['street']) ? strip_tags(trim($_POST['street'])): '';
        $city = isset($_POST['city']) ? strip_tags(trim($_POST['city'])): '';
        $zipcode = isset($_POST['zipcode']) ? strip_tags(trim($_POST['zipcode'])): '';
        $country = isset($_POST['country']) ? strip_tags(trim($_POST['country'])): '';
        $birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']): '';
        $photo = isset($_POST['photo']) ? trim($_POST['photo']): '';
        $validLogin = '';

        // Verification des données
        $authManager = new AuthentificationManager();
        $id = $authManager->isValidLoginInfo($email, $password);
        if ($id === 0) {
            $_SESSION['errorList'][] = 'Verifiez votre email ou votre mot de passe';
            $validLogin = false;
        }else{
            $validLogin = true;
        }

        if($validLogin == true){
            $userManager = new UsersManager();
            $info = $userManager->getUsrUpdated($email);
            $updated = $info['usr_updated'];
            $pseudo = $info['usr_pseudo'];
            $password = 'webforce3';

            if ($updated == NULL) {

                // Photo manager
                $allowedExtensions = array ('jpg', 'jpeg', 'gif', 'png');
                foreach ($_FILES as $key => $value) {
                    if (!empty($value) && !empty($value['name'])){
                        print_r($value);
                        if ($value['size'] <= 300000) {
                            $filename = $value['name'];
                            $dotPosition = strrpos($filename, '.');
                            $extension = strtolower(substr($filename, $dotPosition + 1));
                            //Checking if a value exists in an array with "in_array" function
                            if (in_array($extension, $allowedExtensions)) {
                                //Moving an uploaded file to a new location
                                if (move_uploaded_file($value['tmp_name'], IMAGEUPLOAD."img_".$pseudo.'.'.$extension)) {
                                    $photo = 'img_'.$pseudo.'.'.$extension;
                                    $detailsUser = new UsersManager();
                                    $userInfo = $detailsUser->find($id);
                                    $userPhoto = array (
                                                'usr_photo' => $photo
                                                );
                                    $id = $userInfo['id'];
                                    if (isset($_POST)) {
                                        $detailsUser->update($userPhoto, $id);
                                    }
                                }
                                else {
                                    $_SESSION['errorList'][] = 'Une erreur est survenue au chargement!';
                                }
                            }
                            else {
                                $_SESSION['errorList'][] = 'Une erreur est survenue au chargement!';
                            }
                        }
                    }
                }

                //DB insersion
                $userManager = new \Manager\UsersManager();
                $userManager->update(
                    array(
                        'usr_street' => $street,
                        'usr_city' => $city,
                        'usr_zipcode' => $zipcode,
                        'usr_country' => $country,
                        'usr_birthdate' => $birthdate,
                        'usr_status' => '1',
                        'usr_updated' => date('Y-m-d H:i:s')
                    ), $id
                );

                $AllUsersManager = new UsersManager;

                //USER DATABASE creation
                // Add distant access user
                $sql = 'CREATE USER \''.$pseudo.'\'@\'%\' IDENTIFIED BY \''.$password.'\'';
                $sth = $AllUsersManager->connectionToDatabase($sql);

                $sql = 'CREATE USER \''.$pseudo.'\'@\'localhost\' IDENTIFIED BY \''.$password.'\'';
                $sth = $AllUsersManager->connectionToDatabase($sql);

                $sql = 'GRANT ALL PRIVILEGES ON `'.$pseudo.'\_%` .  * TO \''.$pseudo.'\'@\'%\'';
                $sth = $AllUsersManager->connectionToDatabase($sql);

                $sql = 'GRANT ALL PRIVILEGES ON `'.$pseudo.'\_%` .  * TO \''.$pseudo.'\'@\'localhost\'';
                $sth = $AllUsersManager->connectionToDatabase($sql);
                for($i=0; $i<4; $i++){
                    $sql = 'CREATE DATABASE IF NOT EXISTS `'.$pseudo.'_sql'.$i.'` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
                    $sth = $AllUsersManager->connectionToDatabase($sql);
                }
                // Redirection to "Home"
                $this->redirectToRoute('user_login');
            }
            else {
                $_SESSION['errorList'][] = 'Vous êtes déjà inscrit!';
            }
        }
        // Redirection to "Home"
        $this->redirectToRoute('user_register');
    }

    //CONNEXION\\
    //Not allowed if allready connected

        

    //Calling the connexion view
    public function login()
    {
        $isLogged = $this->getUser();
        if ($isLogged != 0) {
            $this->showForbidden();
        }
        else{
        $this->show('user/login');
        }
    }
    //Connexion method
    public function loginPost()
    {
        //debug($_POST);exit;
        //Gathering POST datas (form)
        $usernameOrEmail = isset($_POST['userPseudoOrEmail']) ? trim($_POST['userPseudoOrEmail']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        // Data verification
        $authManager = new \W\Security\AuthentificationManager();
        $usr_id = $authManager->isValidLoginInfo($usernameOrEmail, $password);
        if ($usr_id === 0) {
            $_SESSION['errorList'][] = 'Verifiez votre email ou votre mot de passe';
        }
        else {
            $userManager = new \Manager\UsersManager();

            // We are "logged" and the infos are placed on session
            $authManager->logUserIn(
                $userManager->find($usr_id)
            );
            // Redirection to "Home"
            $this->redirectToRoute('default_home');
        }
        $this->show('user/login');
    }

    //DECONNEXION\\
    // Déconnecte un utilisateur
    public function logout(){
        //Suppress current user
        $authManager = new \W\Security\AuthentificationManager();
        $authManager->logUserOut();
        // Redirection to "Home"
        $this->redirectToRoute('default_home');
    }

    // FORGOT PASSWORD BY PHILIPPE
    public function forgot()
    {
        $userManager = new UsersManager();
        $userList = $userManager->findAll();
        $this->show('user/forgot', array('userList' => $userList));
    }

     public function forgotPost()
    {
        $forgotPass  = new SendEmail();
        $userManager = new UserManager();
        $userList    = new UsersManager();
        $controller  = new \W\Controller\Controller;
        if (!empty($_POST)) {
            $token = md5(time().'ThisShitBetterWork');
            $data = array(
                'usr_token' => $token
            );
            $usrMail = isset($_POST['usrMail']) ? htmlspecialchars(trim($_POST['usrMail'])) : '';
            $emailExists = $userManager->emailExists($usrMail);
            if ($emailExists == 1) {
                $forgotPass->sendMail($usrMail, 'Changez votre mot de passe','Message Test. <a href="http://localhost'.$controller->generateUrl('user_reset').'?token='.$token.'">Je réinitialise mon mot de passe</a>.');
                $userList->updateToken($data,$usrMail);
                $_SESSION['successList'][] = 'Un email contenant un lien pour la réinitialisation de votre mot de passe vous a été envoyé.';
            }
            else{
                $_SESSION['errorList'][] = 'Votre adresse email n\'est pas dans la base de données. Inscrivez-vous ou contactez votre formateur.';
            }
        }
        else{
            $_SESSION['errorList'][] = 'Veuillez compléter le champ.';
        }

        $this->redirectToRoute('user_forgot');
    }

    public function resetPass(){
        $this->show('user/resetPassword');
    }

    public function resetPassPost(){

        if (isset($_GET['token'])) {

            $token = $_GET['token'];

            $userManager = new UsersManager();
            $id = $userManager->getIdFromToken($token);

            if (isset($_POST)){
                $newPass = isset($_POST['password']) ? $_POST['password'] : '';
                $newPassConfirm = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '';
                $data = array(
                    'usr_password' => password_hash($newPass, PASSWORD_BCRYPT),
                    'usr_token'    => ''
                );
                if (!empty($newPass)) {
                    if (strlen(trim($newPass)) > 8) {
                        if ($newPass == $newPassConfirm) {
                            $userManager->update($data,$id['id']);
                            $_SESSION['successList'][] = 'Votre mot de passe a été réinitialisé';
                            $this->redirectToRoute('user_login');
                        }
                        else{
                             $_SESSION['errorList'][] = 'Vos mots de passe sont différents';
                             $this->redirectToRoute('user_reset');
                        }
                    }
                    else{

                        $_SESSION['errorList'][] = 'Votre mot de passe doit comporter au moins huits caractères';
                    }
                }
                else{
                    $_SESSION['errorList'][] = 'Pas de mot de passe entré';
                    $this->redirectToRoute('user_reset');
                }

            }
        }
    }


    //---------------- PHILIPPE END

    public function edit($id){

        $this->allowTo(['admin','user']);
        $detailsUser = new UsersManager();
        $userInfo = $detailsUser->find($id);
        //debug($userInfo);
        //debug($_SESSION);
        //I'm getting the list of all sessions
        $sessionManager = new SessionManager();
        $sessionList = $sessionManager->findAll();
        //debug($sessionList);
        $this->show(
            'user/edit',
            array(
                'userInfo' => $userInfo,
                'sessionList' => $sessionList,
                'id_session' => isset($_GET['session']) ? trim($_GET['session']): ''//to see if I need this codeline
            )
        );
    }

    public function editPost($id){
        if(isset($_POST['submitInfo'])){
            //debug($_FILES);
            $allowedExtensions = array ('jpg', 'jpeg', 'gif', 'png');
            foreach ($_FILES as $key => $value) {
                if (!empty($value) && !empty($value['name'])){
                    print_r($value);
                    if ($value['size'] <= 300000) {
                        $filename = $value['name'];
                        $dotPosition = strrpos($filename, '.');
                        $extension = strtolower(substr($filename, $dotPosition + 1));
                        /*Checking if a value exists in an array with "in_array" function*/
                        if (in_array($extension, $allowedExtensions)) {
                            /*Moving an uploaded file to a new location*/
                            if (move_uploaded_file($value['tmp_name'], IMAGEUPLOAD.$filename)) {
                                $_SESSION['filePath'] = IMAGEUPLOAD.$filename;
                                //debug($_SESSION);
                                                                        
                                $detailsUser = new UsersManager();
                                $userInfo = $detailsUser->find($id);
                                $userPhoto = array (
                                            'usr_photo' => $filename
                                            );
                                $id = $userInfo['id'];
                                if (isset($_POST)) {
                                    $detailsUser->update($userPhoto, $id);
                                }
                                $_SESSION['successList'][] = 'fichier uploaded<br/>';
                            }
                            else {
                                $_SESSION['errorList'][] = 'attention, une erreur est survenue<br/>';
                            }
                        }
                        else {
                            $_SESSION['errorList'][] = 'pas d\'extension permise<br/>';
                        }
                    }
                }
            }
            //debug($_POST);
            //Inserting data from POST for "user" statute use
            $userPseudo = isset($_POST['userpseudo']) ? trim($_POST['userpseudo']): '';
            $password = isset($_POST['userpassword']) ? trim($_POST['userpassword']): '';
            $street = isset($_POST['userstreet']) ? trim($_POST['userstreet']): '';
            $city = isset($_POST['usercity']) ? trim($_POST['usercity']): '';
            $zipcode = isset($_POST['userzipcode']) ? trim($_POST['userzipcode']): '';
            $country = isset($_POST['usercountry']) ? trim($_POST['usercountry']): '';
            $birthdate = isset($_POST['userbirthdate']) ? trim($_POST['userbirthdate']): '';
            $photo = isset($_POST['photo']) ? trim($_POST['photo']): '';

            //Inserting data from POST for "admin" statute use
            $userName = isset($_POST['username']) ? trim($_POST['username']): '';
            $userFirstName = isset($_POST['userfirstname']) ? trim($_POST['userfirstname']): '';
            $userEmail = isset($_POST['useremail']) ? trim($_POST['useremail']): '';
            
            $detailsUser = new UsersManager();
            $userInfo = $detailsUser->find($id);
            //Inserting data in database
            $userData =  array (
                        'usr_pseudo' => $userPseudo,
                        'usr_password' => $password,
                        'usr_street' => $street,
                        'usr_city' => $city,
                        'usr_zipcode' => $zipcode,
                        'usr_country' => $country,
                        'usr_birthdate' => $birthdate,
                        'usr_name' => $userName,
                        'usr_firstname' => $userFirstName,
                        'usr_email' => $userEmail,
                        'usr_updated' => date ('Y-m-d H:i:s')
                        );
            $id = $userInfo['id'];

            if (isset($_POST)) {

                $detailsUser->update($userData, $id);
                //Redirecting to allusers_details page
                $this->redirectToRoute('allusers_details', ['id' => $userInfo['id']]);
            }

            $this->show(
                'user/edit'
            );
        }
    }

    public function invitations(){
        $this->allowTo(['admin']);

        /*IMPORT CSV FILE AND CONVERTING TO ARRAY*/
        $filePath = isset($_SESSION['filePath']) ? $_SESSION['filePath']: '';
        $filePathReplace = str_replace(';', ',', $filePath);
        $lines = explode(PHP_EOL, $filePathReplace);
        $arrayStudents = array();
        foreach ($lines as $line) {
            $arrayStudents[] = str_getcsv($line);
        }
        unset($arrayStudents[count($arrayStudents)-1]);
        $_SESSION['stuSession'] = $arrayStudents;
        //debug($_SESSION['stuSession']);
        if(file_exists($_SESSION['chemin'])){
            unlink($_SESSION['chemin']);
        }

        /*-------------------------Getting the list of sessions------------------*/
        $sessionManager = new SessionManager;
        $sessionList = $sessionManager->findAll();
        //debug($sessionList);
        /*------------------------TO DROP------------------------------------------------------*/
        /*------------------------TO DROP------------------------------------------------------*/
        $usersManager = new UsersManager;
        $usersList = $usersManager->findAllUsersAndSort();
        /*------------------------TO DROP------------------------------------------------------*/
        /*------------------------TO DROP------------------------------------------------------*/

        $this->show('user/admin/invitations', ['arrayStudents'=>$_SESSION['stuSession'], 'sessionList'=>$sessionList, 'usersList'=>$usersList]);
    }

    /*-----Uploading Users list form a file and sending them an invintation to register-----*/
    public function invitationsPost(){
        /*------------------------TO DROP------------------------------------------------------*/
        /*------------------------TO DROP------------------------------------------------------*/
        if(isset($_POST['troll'])){
            if(!empty($_POST)){
                $id = $_POST['userInfo'];
                $userinfo = new UsersManager;
                $infos = $userinfo->find($id);
                debug($infos);
                $_SESSION['user']['id'] = $infos['id'];
                $_SESSION['user']['session_id'] = $infos['session_id'];
                $_SESSION['user']['usr_name'] = $infos['usr_name'];
                $_SESSION['user']['usr_firstname'] = $infos['usr_firstname'];
                $_SESSION['user']['usr_password'] = $infos['usr_password'];
                $_SESSION['user']['usr_email'] = $infos['usr_email'];
                $_SESSION['user']['usr_birthdate'] = $infos['usr_birthdate'];
                $_SESSION['user']['usr_photo'] = $infos['usr_photo'];
                $_SESSION['user']['usr_pseudo'] = $infos['usr_pseudo'];
                $_SESSION['user']['usr_status'] = $infos['usr_status'];
                $_SESSION['user']['usr_zipcode'] = $infos['usr_zipcode'];
                $_SESSION['user']['usr_street'] = $infos['usr_street'];
                $_SESSION['user']['usr_city'] = $infos['usr_city'];
                $_SESSION['user']['usr_country'] = $infos['usr_country'];
                $_SESSION['user']['usr_created'] = $infos['usr_created'];
                $_SESSION['user']['usr_updated'] = $infos['usr_updated'];
                debug($_SESSION['user']);
            /*--------REDIRECTION---------*/
            $this->redirectToRoute('user_invitations');  
            }
        }
        /*------------------------TO DROP------------------------------------------------------*/
        /*------------------------TO DROP------------------------------------------------------*/
        $this->allowTo(['admin']);

        if(isset($_POST['upload'])){
            debug($_FILES);
            if($_FILES['fichierteleverse']['error'] >0 ){
                $_SESSION['errorFile'][] = 'Ajoutez un fichier d\'abord.';
            }
            if (!empty($_POST)) {
                //unset($_SESSION['errorFile']);
                //unset($_SESSION['successFile']);

                $extensionAutorisees = array('csv');

                // Je récupère mon tableau avec les infos sur le fichier
                foreach ($_FILES as $key => $fichier) {
                    // Je teste si le fichier a été uploadé
                    if (!empty($fichier) && !empty($fichier['name'])) {
                        if ($fichier['size'] <= 8388608) {

                            $filename = $fichier['name'];
                            $dotPos = strrpos($filename, '.');
                            $extension = strtolower(substr($filename, $dotPos+1));
                            // Je test si c'est pas un hack (sur l'extension)
                            //if (substr($fichier['name'], -4) != '.php') {
                            if (in_array($extension, $extensionAutorisees)) {
                                // Je déplace le fichier uploadé au bon endroit
                                if (move_uploaded_file($fichier['tmp_name'], PATHUPLOAD.$filename)) {
                                    $_SESSION['filePath'] = file_get_contents(PATHUPLOAD.$filename);
                                    $_SESSION['chemin'] = PATHUPLOAD.$filename;

                                    $_SESSION['successFile'][] = 'Téléchargement réussi!';                                                                      
                                }
                                else {
                                    $_SESSION['errorFile'][] = 'Une erreur est survenue<br />';
                                }
                            }
                            else {
                                $_SESSION['errorFile'][] = 'Cette extension n\'est pas permise, choisissez un fichier ".csv" S.V.P';
                            }
                        }
                        else {
                            $_SESSION['errorFile'][] = 'Votre fichier est trop lourd';
                        }
                        
                       //$this->redirectToRoute('user_invitations');
                       debug($_SESSION) ;
                    }
                }
            }
            /*--------REDIRECTION---------*/
            $this->redirectToRoute('user_invitations');   
        }
        else if(isset($_POST['sendInvitations'])){
            if(!empty($_POST)){ 
                $i = 0;             
                foreach ($_POST['student'] as $key=> $value){
                    $name = isset($value['name']) ? trim($value['name']) : '';
                    $firstname = isset($value['firstname']) ? trim($value['firstname']) : '';
                    $pseudo = isset($value['pseudo']) ? trim($value['pseudo']) : '';
                    $email = isset($value['email']) ? trim($value['email']) : '';
                    $session = isset($_POST['session']) ? trim($_POST['session']) : '';
                    $password = time();
                    $path = '<a href="http://localhost/PHPim/public/inscription/">http://localhost/PHPim/public/inscription/</a>';
                    $validFirstname = '';
                    $validName = '';
                    $validPseudo = '';
                    $validEmail = '';
                    $validvalidEmail = '';
                    //$_SESSION['errorList'] = array();
                    //$_SESSION['successList'] = array();
                    $emailEx = new UserManager;
                    $emailEXist = $emailEx->emailExists($email);
                    debug($emailEXist);

                    if(strlen(strip_tags($firstname)) < 2){
                        $_SESSION['errorList'][] = 'Prénom invalide en ligne #'.$key;
                        $validFirstname = false;
                    }else{
                        $validFirstname = true;
                    }

                    if(strlen(strip_tags(trim($name))) < 2){
                        $_SESSION['errorList'][] = 'Nom invalide en ligne #'.$key;
                        $validName = false;
                    }else{
                        $validName = true;
                    }
                    if(strlen(strip_tags(trim($pseudo))) < 2){
                        $_SESSION['errorList'][] = 'Pseudo invalide en ligne #'.$key;
                        $validPseudo = false;
                    }else{
                        $validPseudo = true;
                    }

                    if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                        $_SESSION['errorList'][] = 'Email invalide en ligne #'.$key;   
                        $validEmail = false;
                    }else{
                        $validEmail = true;
                    }
                    if($emailEXist == 1){
                        $_SESSION['errorList'][] = 'Email '.$email.' en ligne #'.$key.' existe déja en BDD.';
                        debug($_SESSION['errorList']);  
                        $validemailEXist = false;
                    }else{
                        $validemailEXist = true;   
                    }

                    if($validFirstname == true && $validName == true && $validEmail == true && $validemailEXist == true && validPseudo == true){
                        $userManager = new UsersManager;

                        $tableInsert = [
                            'usr_firstname' => $firstname,
                            'usr_name' => $name,
                            'usr_email' => $email,
                            'usr_pseudo' => $pseudo,
                            'usr_password' => password_hash($password,PASSWORD_BCRYPT),
                            'usr_role' => 'user',
                            'session_id' => $session,
                            'usr_status' => 0,
                            'usr_created' => date('Y-m-d'),
                        ];
                        $_SESSION['successList'][$i] = 'Invitation bien envoyée à '.$firstname.' '.$name;
                        $insert = $userManager->insert($tableInsert);
                        /*SENDING EMAIL to USER*/
                        $invitations = new SendEmail;
                        $subject = 'Inscription sur la plateforme PHPim';
                        $message = 'Bonjour '.$firstname.'<br/> Veuillez compléter votre inscription sur '.$path.'. Vos identifiants sont: <br/> Email: '.$email.'<br/> Pseudo: '.$pseudo.'<br/> Mot de passe: '.$password.'<br/> Merci!!';

                        $posting = $invitations->sendMail($email, $subject,$message);
                        $i++;
                    }
                }
                unset($_SESSION['filePath']);
                if(isset($_SESSION['errorList']) && count($_SESSION['errorList']) == 0){
                    $_SESSION['errorList'][] = 'Aucun étudiant sélectionné';
                }
                $this->redirectToRoute('user_invitations');
            }
        }
    }
    public function database(){
        $this->allowTo(['admin','user']);
        $database = new UsersManager();
        $pseudo = $_SESSION['user']['usr_pseudo'];
        $allDatabase = $database->getAllDatabases($pseudo);
        $allDatabases = array();
        $index = 'Database ('.$_SESSION['user']['usr_pseudo'].'%)';
        foreach ($allDatabase as $key => $value) {
            $allDatabases[]['Database'] = $value[$index];
        }
        $this->show('user/database',['allDatabases'=>$allDatabases]);
    }
    public function databasePost(){
        if(isset($_POST['deleteDatabase'])){
            if(!empty($_POST)){
                debug($_POST);
                $databaseName = $_POST['databaseName'];
                $delete = new UsersManager();
                $deleteDatabase = $delete->deleteDatabase($databaseName);
                $_SESSION['successList'][] = 'Suppression de `'.$databaseName.'` réussie!';  
            }
            /*--------REDIRECTION---------*/
            $this->redirectToRoute('user_database');
        }
        if(isset($_POST['createDatabase'])){
            if(!empty($_POST['databaseName'])){
                debug($_POST);
                $databaseName = $_POST['databaseName'];
                if(strlen(strip_tags(trim($databaseName))) >= 3){
                    $AllUsersManager = new UsersManager;
                    $sql = 'CREATE DATABASE IF NOT EXISTS `'.$_SESSION['user']['usr_pseudo'].'_'.$databaseName.'_sql` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
                    $sth = $AllUsersManager->connectionToDatabase($sql);
                    $_SESSION['successList2'][] = '`'.$databaseName.'` a été crée avec succés';
                }
                else{
                    $_SESSION['errorList2'][] = 'Nom trop court ou invalide!';
                }
            }
            else{
                $_SESSION['errorList2'][] = 'Le champs est vide!';
            }
            /*--------REDIRECTION---------*/
            $this->redirectToRoute('user_database');
        }
    }
}
?>