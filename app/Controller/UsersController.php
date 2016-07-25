<?php

	namespace Controller;
    use \Manager\UsersManager;
    use \Manager\SessionManager;
	use \W\Controller\Controller;
    use \W\Manager\UserManager;
    use \W\Security\AuthentificationManager;
    use \Functions\SendEmail as SendEmail;

class UsersController extends Controller {

    /*-------------------------------------------------------------------------------------------------------------*/
                                       //INSCRIPTION FOR USERS
    /*-------------------------------------------------------------------------------------------------------------*/
    /*------------ Calling the inscription view --------------*/
    public function register() {
        $this->show('user/register');
    }

    /*---------------- Inscription method --------------------*/
    public function registerPost() {

        /*---------- Gathering POST data (form) -----------------*/
        $email = isset($_POST['email']) ? trim($_POST['email']): '';
        $password = isset($_POST['password']) ? trim($_POST['password']): '';
        $street = isset($_POST['street']) ? strip_tags(trim($_POST['street'])): '';
        $city = isset($_POST['city']) ? strip_tags(trim($_POST['city'])): '';
        $zipcode = isset($_POST['zipcode']) ? strip_tags(trim($_POST['zipcode'])): '';
        $country = isset($_POST['country']) ? strip_tags(trim($_POST['country'])): '';
        $birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']): '';
        $photo = isset($_POST['photo']) ? trim($_POST['photo']): '';
        $validLogin = '';

        /* --------- Data verification ------------ */
        $authManager = new AuthentificationManager();
        $id = $authManager->isValidLoginInfo($email, $password);
        if ($id === 0) {
            $_SESSION['errorList'][] = 'Verifiez votre email ou votre mot de passe';
            $validLogin = false;
        }else {
            $validLogin = true;
        }

        if($validLogin == true) {
            $userManager = new UsersManager();
            $info = $userManager->getUsrUpdated($email);
            $updated = $info['usr_updated'];
            $pseudo = $info['usr_pseudo'];
            $password = 'webforce3';

            if ($updated == NULL) {

                /* ---------- Photo manager ------------------ */
                $allowedExtensions = array ('jpg', 'jpeg', 'gif', 'png');
                foreach ($_FILES as $key => $value) {
                    if (!empty($value) && !empty($value['name'])) {
                        print_r($value);
                        if ($value['size'] <= 350000) {
                            $filename = $value['name'];
                            $dotPosition = strrpos($filename, '.');
                            $extension = strtolower(substr($filename, $dotPosition + 1));
                            /* --------------- Checking if a value exists in an array with "in_array" function ------------*/
                            if (in_array($extension, $allowedExtensions)) {
                                /* --------------- Moving an uploaded file to a new location --------------*/
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
                                    $_SESSION['errorList'][] = 'Une erreur est survenue au chargement de l\'image!';
                                }
                            }
                            else {
                                $_SESSION['errorList'][] = 'Une erreur est survenue au chargement de l\'image!';
                            }
                        }
                    }
                    else {
                        $photo = 'upload/img/avatar_0.png';
                    }
                }

                /* ------------- Insertion into database -------------- */
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

                /*-------------------------------------------------------------------------------------------------------------*/
                                                            //USER DATABASE CREATION
                /*-------------------------------------------------------------------------------------------------------------*/
                
                /* -------------- Adding a distant access user ------------------ */
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
                /* ----------------- Redirection to login page ------------------- */
                $this->redirectToRoute('user_login');
            }
            else {
                $_SESSION['errorList'][] = 'Vous êtes déjà inscrit!';
            }
        }
        /* ----------------- Redirection to register page ------------------- */
        $this->redirectToRoute('user_register');
    }

    /*-------------------------------------------------------------------------------------------------------------*/
                                                //USER CONNEXION
    /*-------------------------------------------------------------------------------------------------------------*/
    /* ---------------------- Connection not allowed if allready connected ----------------- */
    public function login() {
        $isLogged = $this->getUser();
        if ($isLogged != 0) {
            $this->showForbidden();
        }
        else {
        /* ---------------- Calling the connexion view ------------------ */
        $this->show('user/login');
        }
    }
    /* ------------------ Connexion method ----------------------- */
    public function loginPost() {
        /* --------------- Gathering POST data (form) ------------------ */
        $userManager = new \Manager\UsersManager();
        $usernameOrEmail = isset($_POST['userPseudoOrEmail']) ? trim($_POST['userPseudoOrEmail']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        $userStatus = $userManager->userStatus($usernameOrEmail);

        /* -------------------------- Data verification ------------------- */
        $authManager = new \W\Security\AuthentificationManager();
        $usr_id = $authManager->isValidLoginInfo($usernameOrEmail, $password);

        if ($usr_id === 0) {
            $_SESSION['errorList'][0] = 'Verifiez votre email ou votre mot de passe';
            $this->show('user/login');
        }
        if ($userStatus['usr_status'] == '0') {
            $_SESSION['errorList'][0] = 'Votre compte est désactivé. Veuillez contacter l\'administrateur';
        }
        else {
           
            /* ------------------ We are "logged" and the infos are placed on session ------------------ */
            $authManager->logUserIn(
                $userManager->find($usr_id)
            );
            /* ----------------------- Getting the SES_END for users --------------------- */
            $id = $_SESSION['user']['id'];
            $getSesEnd = $userManager->getSesdEnd($id);
            $_SESSION['user']['ses_end'] = $getSesdEnd['ses_end'];
            /* ------------ Redirection to "Home" page ------------------- */
            $this->redirectToRoute('default_home');
        }
        $this->show('user/login');
    }

    /*-------------------------------------------------------------------------------------------------------------*/
                                                //USER DECONNEXION
    /*-------------------------------------------------------------------------------------------------------------*/
    /* ---------------- Deconnecting an user ---------------- */
    public function logout() {
        /* ---------------- Suppressing the current user ----------------- */
        $authManager = new \W\Security\AuthentificationManager();
        $authManager->logUserOut();
        session_destroy();
        /* --------------- Redirection to "Home" page ---------------- */
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
                $forgotPass->sendMail($usrMail, 'Changez votre mot de passe','Message Test. <a href="http://localhost'.$controller->generateUrl('user_reset',['token' => $token]).'">Je réinitialise mon mot de passe</a>.');
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

public function resetPassPost($token){

        $userManager = new UsersManager();
        $userList = $userManager->findAll();
        // $dbToken = $userList['usr_token'];
        $id = $userManager->getIdFromToken($token);

        if (!empty($_POST)){
            $newPass = isset($_POST['password']) ? $_POST['password'] : '';
            $newPassConfirm = isset($_POST['passwordConfirm']) ? $_POST['passwordConfirm'] : '';
            $data = array(
                'usr_password' => password_hash($newPass, PASSWORD_BCRYPT),
                'usr_token'    => ''
            );
            if (!empty($newPass)) {
                if (!empty($newPassConfirm)) {
                    if ($newPass == $newPassConfirm) {
                        if (strlen(trim($newPass)) > 8) {
                            $userManager->update($data,$id['id']);
                            $_SESSION['successList'][] = 'Votre mot de passe a été réinitialisé';
                            $this->redirectToRoute('user_login');
                        }
                        else{
                            $_SESSION['errorList'][] = 'Votre mot de passe doit comporter au moins huits caractères';
                            $this->redirectToRoute('user_reset',['token' => $token]);
                        }
                    }
                    else{
                        $_SESSION['errorList'][] = 'Vos mots de passe sont différents';
                         $this->redirectToRoute('user_reset',['token' => $token]);
                    }
                }
                else{
                    $_SESSION['errorList'][] = 'Le mot de passe de confirmation est vide';
                    $this->redirectToRoute('user_reset',['token' => $token]);
                }
            }
            else{
                $_SESSION['errorList'][] = 'Pas de mot de passe entré';
                $this->redirectToRoute('user_reset',['token' => $token]);
            }
            // if ($dbToken == '') {
            //     $_SESSION['errorList'][] = 'Votre session a expiré.';
            // }
        }
    }

    //---------------- PHILIPPE END

    /*-------------------------------------------------------------------------------------------------------------*/
                                                //USER EDITION
    /*-------------------------------------------------------------------------------------------------------------*/
    public function edit($id) {
        $this->allowTo(['admin','user']);
        $detailsUser = new UsersManager();
        $userInfo = $detailsUser->find($id);

        /* ----------- I'm getting the list of all sessions ------------- */
        $sessionManager = new SessionManager();
        $sessionList = $sessionManager->findAll();

        $this->show(
            'user/edit',
            array(
                'userInfo' => $userInfo,
                'sessionList' => $sessionList,
                'id_session' => isset($_GET['session']) ? trim($_GET['session']): ''
            )
        );
    }

    public function editPost($id) {
        if(isset($_POST['userOn']) || isset($_POST['userOff'])) {
            if(!empty($_POST)) { 
                
                /* ------------------- Disabling or enabling a session ------------ */   
                $id = $_SESSION['user']['id'];
                $userStatus = $_POST['userStatus'];
                $tableUpdateUser = array();
                $userManager = new UsersManager;
              
                $tableUpdateUser = [
                    'usr_status' => $userStatus,
                    'usr_updated' => date('Y-m-d'),
                ];
                $updateUser = $userManager->update($tableUpdateUser, $id);
                if($userStatus == 1) {
                    $_SESSION['success'][] = "Le profil a été réactivé avec succés!";
                }
                else if($userStatus == 0) {
                    $_SESSION['success'][] = "Le profil a été désactivé avec succés!";
                }

                /* -------- Redirecting to user edit page --------- */
                 $this->redirectToRoute('user_edit', ['id' => $id]);
            }
        }

        if(isset($_POST['submitInfo'])) {
            $validImg = '';
            $allowedExtensions = array ('jpg', 'jpeg', 'gif', 'png');
            foreach ($_FILES as $key => $value) {
                if (!empty($value) && !empty($value['name'])) {
                    print_r($value);
                    if ($value['size'] <= 300000) {
                        $filename = $value['name'];
                        $dotPosition = strrpos($filename, '.');
                        $extension = strtolower(substr($filename, $dotPosition + 1));

                        /* ------------------- Checking if a value exists in an array with "in_array" function ---------------- */
                        if (in_array($extension, $allowedExtensions)) {
                            
                            /* ------------------ Moving an uploaded file to a new location ------------------------------ */
                            if (move_uploaded_file($value['tmp_name'], IMAGEUPLOAD.$filename)) {
                                $_SESSION['filePath'] = IMAGEUPLOAD.$filename;
                                                                        
                                $detailsUser = new UsersManager();
                                $userInfo = $detailsUser->find($id);
                                $userPhoto = array (
                                            'usr_photo' => $filename
                                            );
                                $id = $userInfo['id'];
                                if (isset($_POST)) {
                                    $detailsUser->update($userPhoto, $id);
                                }
                            }
                            else {
                                $_SESSION['errorList'][] = 'Attention, une erreur est survenue';
                                $validImg = false;
                            }
                        }
                        else {
                            $_SESSION['errorList'][] = 'Cette extension n\'est pas permise';
                            $validImg = false;
                        }
                    }
                }
            }

            /* ------------------- Inserting data from POST for "user" statute use ------------------ */
            /***********Control first name*************/
            $validFirstname = '';
            $userFirstName = isset($_POST['userfirstname']) ? trim($_POST['userfirstname']): '';
            if(strlen(strip_tags($userFirstName)) < 2) {
                $_SESSION['errorList'][] = 'Prénom invalide ou trop court';
                $validFirstname = false;
            }else {
                $validFirstname = true;
            }

            /***********Control name*************/
            $validName = '';
            $userName = isset($_POST['username']) ? trim($_POST['username']): '';
            if(strlen(strip_tags(trim($userName))) < 2) {
                $_SESSION['errorList'][] = 'Nom invalide ou trop court';
                $validName = false;
            }else {
                $validName = true;
            }

            /***********Control pseudo*************/
            $validPseudo = '';
            $userPseudo = isset($_POST['userpseudo']) ? trim($_POST['userpseudo']): '';
            if(strlen(strip_tags(trim($userPseudo))) < 2) {
                $_SESSION['errorList'][] = 'Pseudo invalide ou trop court';
                $validPseudo = false;
            }else {
                $validPseudo = true;
            }

            /***********Control email*************/
            $validEmail = '';
            $userEmail = isset($_POST['useremail']) ? trim($_POST['useremail']): '';
            if (filter_var($userEmail, FILTER_VALIDATE_EMAIL) == false) {
                $_SESSION['errorList'][] = 'Email invalide ou trop court';   
                $validEmail = false;
            }else {
                $validEmail = true;
            }

            $street = isset($_POST['userstreet']) ? strip_tags(trim($_POST['userstreet'])): '';
            $city = isset($_POST['usercity']) ? strip_tags(trim($_POST['usercity'])): '';
            $zipcode = isset($_POST['userzipcode']) ? strip_tags(trim($_POST['userzipcode'])): '';
            $country = isset($_POST['usercountry']) ? strip_tags(trim($_POST['usercountry'])): '';
            $birthdate = isset($_POST['userbirthdate']) ? trim($_POST['userbirthdate']): '';
            $photo = isset($_POST['photo']) ? strip_tags(trim($_POST['photo'])): '';
            $userSessionId = $_POST['session'];

            /* ------------------ Inserting data from POST for "admin" statute use --------------------- */
            
            if($validFirstname == true && $validName == true && $validEmail == true && $validEmail == true && $validPseudo == true) {
                $detailsUser = new UsersManager();
                $userInfo = $detailsUser->find($id);

                /* ----------- Inserting data into database ------------- */
                $userData =  array (
                    'usr_street' => $street,
                    'usr_city' => $city,
                    'usr_zipcode' => $zipcode,
                    'usr_country' => $country,
                    'usr_birthdate' => $birthdate,
                    'usr_name' => $userName,
                    'usr_firstname' => $userFirstName,
                    'usr_email' => $userEmail,
                    'usr_pseudo' => $userPseudo,
                    'session_id' => $userSessionId,
                    'usr_updated' => date ('Y-m-d H:i:s')
                );
                $id = $userInfo['id'];
                $detailsUser->update($userData, $id);

                /* ---------------------- Redirecting to allusers details page ----------------- */
                $this->redirectToRoute('allusers_details', ['id' => $userInfo['id']]);
                $_SESSION['succesList'][] = 'Vos données ont été bien mise à jour!';
            }
            /* -------------------- I'm redirecting to user edit page -------------------------- */
            $this->redirectToRoute('user_edit', ['id' => $_SESSION['user']['id']]);
        }
    }

    /*-------------------------------------------------------------------------------------------------------------*/
                                       //SENDING INVITATIONS FOR USERS
    /*-------------------------------------------------------------------------------------------------------------*/
    public function invitations(){

        $this->allowTo(['admin']);

        //IMPORT CSV FILE FROM THE ??? AND CONVERTING INTO ARRAY
        $filePath = isset($_SESSION['filePath']) ? $_SESSION['filePath']: '';
        $filePathReplace = str_replace(';', ',', $filePath);
        $lines = explode(PHP_EOL, $filePathReplace);
        $arrayStudents = array();
        foreach ($lines as $line) {
            $arrayStudents[] = str_getcsv($line);
        }
        unset($arrayStudents[count($arrayStudents)-1]);
        $_SESSION['stuSession'] = $arrayStudents;
        if (isset($_SESSION['chemin'])){
            if(file_exists($_SESSION['chemin'])){
                unlink($_SESSION['chemin']);
            }
        }
        /*-------------------------Getting the list of sessions------------------*/
        $sessionManager = new SessionManager;
        $sessionList = $sessionManager->findAll();
        
        $this->show('user/admin/invitations', ['arrayStudents'=>$_SESSION['stuSession'], 'sessionList'=>$sessionList]);
    }

    /*-----Uploading Users list from a csv file and sending them an invitation for register-----*/
    public function invitationsPost(){

        if(isset($_POST['upload'])){
            if($_FILES['fichierteleverse']['error'] >0 ){
                $_SESSION['errorFile'][] = 'Ajoutez un fichier d\'abord.';
            }
            if (!empty($_POST)) {
                $extensionAutorisees = array('csv');

                // Getting the file from the post and doing some verifications
                foreach ($_FILES as $key => $fichier) {
                    if (!empty($fichier) && !empty($fichier['name'])) {

                        if ($fichier['size'] <= 8388608) {
                            $filename = $fichier['name'];
                            $dotPos = strrpos($filename, '.');
                            $extension = strtolower(substr($filename, $dotPos+1));

                            if (in_array($extension, $extensionAutorisees)) {
                                // giving the upload path
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
                       $this->redirectToRoute('user_invitations');
                    }
                }
            }
            /*--------REDIRECTION---------*/
            $this->redirectToRoute('user_invitations');   
        }
        /*-------AFTER getting the list of student, we verify the inputs and if they already exist in our DB-----*/
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
                    $emailEx = new UserManager;
                    $emailEXist = $emailEx->emailExists($email);

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
                        $validemailEXist = false;
                    }else{
                        $validemailEXist = true;   
                    }

                    if($validFirstname == true && $validName == true && $validEmail == true && $validemailEXist == true && $validPseudo == true){
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
    /*-------------------------------------------------------------------------------------------------------------*/
                                       //USERS ADDING DATABASE FOR HIMSELF
    /*-------------------------------------------------------------------------------------------------------------*/
    /*Showing databases*/
    public function database(){
        $this->allowTo(['admin','user']);
        $database = new UsersManager();
        $pseudo = $_SESSION['user']['usr_pseudo'];
        $allDatabase = $database->getAllDatabases($pseudo);
        $allDatabases = array();
        //After getting all databases, trying to select all starting with name begin with usr_pseudo
        $index = 'Database ('.$_SESSION['user']['usr_pseudo'].'%)';
        foreach ($allDatabase as $key => $value) {
            $allDatabases[]['Database'] = $value[$index];
        }
        $this->show('user/database',['allDatabases'=>$allDatabases]);
    }
    public function databasePost(){
        /*Deleting databases*/
        if(isset($_POST['deleteDatabase'])){
            if(!empty($_POST)){
                $databaseName = $_POST['databaseName'];
                $delete = new UsersManager();
                $deleteDatabase = $delete->deleteDatabase($databaseName);
                $_SESSION['successList'][] = 'Suppression de `'.$databaseName.'` réussie!';  
            }
            /*--------REDIRECTION---------*/
            $this->redirectToRoute('user_database');
        }
        /*Adding databases*/
        if(isset($_POST['createDatabase'])){
            if(!empty($_POST['databaseName'])){
                $databaseName = $_POST['databaseName'];
                if(strlen(strip_tags(trim($databaseName))) >= 3){
                    $AllUsersManager = new UsersManager;
                    //Specifying prefix with the user pseudo
                    $sql = 'CREATE DATABASE IF NOT EXISTS `'.$_SESSION['user']['usr_pseudo'].'_'.$databaseName.'` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
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