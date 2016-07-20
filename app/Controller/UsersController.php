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
    
        //debug($_POST);

        // Gathering POST datas (form)
        $email = isset($_POST['email']) ? trim($_POST['email']): '';
        $userpseudo = isset($_POST['userpseudo']) ? strip_tags(trim($_POST['userpseudo'])): '';
        $password = isset($_POST['password']) ? trim($_POST['password']): '';
        $street = isset($_POST['street']) ? strip_tags(trim($_POST['street'])): '';
        $city = isset($_POST['city']) ? strip_tags(trim($_POST['city'])): '';
        $zipcode = isset($_POST['zipcode']) ? strip_tags(trim($_POST['zipcode'])): '';
        $country = isset($_POST['country']) ? strip_tags(trim($_POST['country'])): '';
        $birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']): '';
        $validPseudo = '';
        $validLogin = '';

        // Verification des données
        if(strlen($userpseudo) <= 2){
                $_SESSION['errorList'][] = 'entrez un pseudo';
                $validPseudo = false;
            }else{
                $validPseudo = true;
            }

        $authManager = new AuthentificationManager();
        $id = $authManager->isValidLoginInfo($email, $password);
        if ($id === 0) {
            $_SESSION['errorList'][] = 'Login invalide';
            $validLogin = false;
        }else{
            $validLogin = true;
        }

        if($validPseudo == true && $validLogin == true){
            $userManager = new UsersManager();
            $info = $userManager->getUsrUpdated($email);

            $updated = $info['usr_updated'];
            $firstname = $info['usr_firstname'];
            $password = 'webforce3';
            if ($updated == NULL) {
            
                //DB insersion
                $userManager = new \Manager\UsersManager();
                $userManager->update(
                    array(
                        'usr_pseudo' => $userpseudo,
                        'usr_street' => $street,
                        'usr_city' => $city,
                        'usr_zipcode' => $zipcode,
                        'usr_country' => $country,
                        'usr_birthdate' => $birthdate,
                        'usr_photo' => ('img_0.png'),
                        'usr_status' => '1',
                        'usr_updated' => date('Y-m-d H:i:s')
                    ), $id
                );
                $AllUsersManager = new UsersManager;

                //USER DATABASE creation
                // Add distant access user
                $sql = 'CREATE USER \''.$firstname.'\'@\'%\' IDENTIFIED BY \''.$password.'\'';
                $sth = $AllUsersManager->connectionToDatabase($sql);

                $sql = 'CREATE USER \''.$firstname.'\'@\'localhost\' IDENTIFIED BY \''.$password.'\'';
                $sth = $AllUsersManager->connectionToDatabase($sql);

                $sql = 'GRANT ALL PRIVILEGES ON `'.$firstname.'\_%` .  * TO \''.$firstname.'\'@\'%\'';
                $sth = $AllUsersManager->connectionToDatabase($sql);

                $sql = 'GRANT ALL PRIVILEGES ON `'.$firstname.'\_%` .  * TO \''.$firstname.'\'@\'localhost\'';
                $sth = $AllUsersManager->connectionToDatabase($sql);
                for($i=0; $i<4; $i++){
                    $sql = 'CREATE DATABASE IF NOT EXISTS `'.$firstname.'_sql'.$i.'` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
                    $sth = $AllUsersManager->connectionToDatabase($sql);
                }
            }
            else {
                $_SESSION['errorList'][] = 'Vous êtes déjà inscrit!';
                debug($_SESSION['errorList']);
            }   
        }
    }
    //CONNEXION\\
    //Calling the connexion view
   public function login()
    {
        $this->show('user/login');
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
            echo'Login invalide <br />';
        }
        else {
            $userManager = new \Manager\UsersManager();

            // We are "logged" and the infos are placed on session
            $authManager->logUserIn(
                $userManager->find($usr_id)
            );
            //debug($_SESSION);

            // Redirection to "Home"
            $this->redirectToRoute('default_home');
        }
        $this->show('user/login');
    }

    // FORGOT PASSWORD BY PHILIPPE
    public function forgot()
    {
        $this->show('user/forgot');
    }

    public function forgotPost()
    {
        $forgotPass  = new ForgotPass();
        $token = md5(time().'ThisShitBetterWork');
        $userManager = new UsersManager();
        $data = array(
            'usr_token' => $token
        );
        $id = 2;
        $userManager->update($data,$id);
        $usrMail = isset($_POST['usrMail']) ? $_POST['usrMail'] : '';
        if (isset($_POST)) {
           $forgotPass->sendMail($usrMail, 'Changez votre mot de passe','Message Test. Voici le token : <a href="http://localhost/PHPim/public/mdp-nouveau/'.$token.'">http://localhost/PHPim/public/mdp-nouveau/'.$token.'</a>');
        }
        $this->redirectToRoute('user_forgot');
    }

    public function resetPass(){

        $this->show('user/resetPassword');
    }

    public function resetPassPost(){

    }


    //---------------- PHILIPPE END

    public function edit($id){
        $detailsUser = new UsersManager();
        $userInfo = $detailsUser->find($id);
        //debug($userInfo);
        $this->show(
            'user/edit',
            array(
                'userInfo' => $userInfo,
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
                                echo 'fichier uploaded<br/>';
                            }
                            else {
                                echo 'attention, une erreur est survenue<br/>';
                            }
                        }
                        else {
                            echo 'pas d\'extension permise<br/>';
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
            //$sessionName = isset($_POST['sessionname']) ? trim($_POST['sessionname']): '';

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

            $this->show('user/edit');
        }
    }
//                       'ses_name' => $sessionName

    public function invitations(){
        //$this->allowTo(['admin']);

        /*IMPORT CSV FILE AND CONVERTING TO ARRAY*/
        $filePath = $_SESSION['filePath'];
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

        $this->show('user/admin/invitations', ['arrayStudents'=>$_SESSION['stuSession'], 'sessionList'=>$sessionList]);
    }

    /*-----Uploading Users list form a file and sending them an invintation to register-----*/
    public function invitationsPost(){
        //$this->allowTo(['admin']);

        if(isset($_POST['upload'])){
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
                                    $_SESSION['errorFile'][] = 'une erreur est survenue<br />';
                                }
                            }
                            else {
                                $_SESSION['errorFile'][] = 'Cette extension n\'est pas permise, choisissez un fichier ".csv" S.V.P';
                            }
                        }
                        else {
                            $_SESSION['errorFile'][] = 'Votre fichier est trop lourd';
                        }
                        /*--------REDIRECTION---------*/
                       $this->redirectToRoute('user_invitations');
                       debug($_SESSION) ;
                    }
                }
            }
        }
        else if(isset($_POST['sendInvitations'])){
            if(!empty($_POST)){
                if(isset($_SESSION['errorList']) || isset($_SESSION['successList'])){
                    //unset($_SESSION['errorList']);
                    //unset($_SESSION['successList']);
                }  
                $i = 0;             
                foreach ($_POST['student'] as $key=> $value){
                    $name = isset($value['name']) ? trim($value['name']) : '';
                    $firstname = isset($value['firstname']) ? trim($value['firstname']) : '';
                    $email = isset($value['email']) ? trim($value['email']) : '';
                    $session = isset($_POST['session']) ? trim($_POST['session']) : '';
                    $password = time();
                    $path = '<a href="http://localhost/PHPim/public/inscription/">http://localhost/PHPim/public/inscription/</a>';
                    $validFirstname = '';
                    $validName = '';
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

                    if($validFirstname == true && $validName == true && $validEmail == true && $validemailEXist == true){
                        $userManager = new UsersManager;

                        $tableInsert = [
                            'usr_firstname' => $firstname,
                            'usr_name' => $name,
                            'usr_email' => $email,
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
                        $message = 'Bonjour '.$firstname.'<br/> Veuillez compléter votre inscription sur '.$path.'. Vos identifiants sont: <br/> Email: '.$email.'<br/>'.'Mot de passe:'.$password.' <br/> Merci!!';

                        $posting = $invitations->sendMail($email, $subject,$message);
                        $i++;
                        //debug($insert);
                        //debug($_SESSION['successList']);
                    }
                }
                unset($_SESSION['stuSession']);
                debug($_SESSION['stuSession']);
                debug($_SESSION);
                $this->redirectToRoute('user_invitations');
            }
        }
    }
}
?>