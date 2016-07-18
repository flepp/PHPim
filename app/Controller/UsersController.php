<?php
	namespace Controller;
    use \Manager\UsersManager;
    use \Manager\SessionManager;
	use \W\Controller\Controller;
    use \W\Security\AuthentificationManager;

class UsersController extends Controller
{
    //INSCRIPTION\\
    //Calling the inscription view
    public function register()
    {
        $this->show('user/register');
    }

    //Inscription method
     public function registerPost()
    {
        $extensionAutorisees = array('jpg','png','gif');

        // Gathering file (photo) info table
        foreach ($_FILES as $key => $photo) {
            // Testing upload of file
            if (!empty($photo) && !empty($photo['avatar'])) {
                print_r($photo);
                if ($photo['size'] <= 500000) {
                    $filename = $photo['avatar'];
                    $dotPos = strrpos($filename, '.');
                    $extension = strtolower(substr($filename, $dotPos+1));
                    // Testing the extension
                    if (in_array($extension, $extensionAutorisees)) {
                        // Moving file to the right folder
                        if (move_uploaded_file($photo['tmp_name'], 'public/assets/upload/img/'. 'img_'.$userpseudo.'.'.$extension)) {
                            //echo 'fichier téléversé<br />';
                        }
                        else {
                            echo 'une erreur est survenue<br />';
                        }
                    }
                    else {
                        echo 'extension interdite<br />';
                    }
                }
                else {
                    echo 'fichier trop lourd<br />';
                }
            }
        }

        //debug($_POST);
        // Gathering POST datas (form)
        $email = isset($_POST['email']) ? trim($_POST['email']): '';
        $userpseudo = isset($_POST['userpseudo']) ? trim($_POST['userpseudo']): '';
        $password = isset($_POST['password']) ? trim($_POST['password']): '';
        $street = isset($_POST['street']) ? trim($_POST['street']): '';
        $city = isset($_POST['city']) ? trim($_POST['city']): '';
        $zipcode = isset($_POST['zipcode']) ? trim($_POST['zipcode']): '';
        $country = isset($_POST['country']) ? trim($_POST['country']): '';
        $birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']): '';
        $photo = isset($_POST['avatar']) ? $_POST['avatar']: '';

        // Verification des données
        $authManager = new AuthentificationManager();
        $id = $authManager->isValidLoginInfo($email, $password);
        if ($id === 0) {
            echo'Login invalide <br />';
        }
        else {
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
                    'usr_photo' => $photo,
                    'usr_status' => '1',
                    'usr_updated' => date('Y-m-d H:i:s')
                )
            );

            //Redirect to "LOGIN" page
            $this->redirectToRoute('user_login');
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
        debug($_POST);exit;
        //Gathering POST datas (form)
        $userPseudoOrEmail = isset($_POST['userpseudo']) ? trim($_POST['userpseudo']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        // Data verification
        $authManager = new \W\Security\AuthentificationManager();
        $usr_id = $authManager->isValidLoginInfo($userPseudoOrEmail, $password);
        if ($usr_id === 0) {
            echo'Login invalide <br />';
        }
        else {
            $userManager = new \Manager\UsersManager();

            // We are "logged" and the infos are placed on session
            $authManager->logUserIn(
                $userManager->find($usr_id)
            );

            // Redirection to "Home"
            $this->redirectToRoute('home');
        }
        $this->show('user/login');
    }

    public function forgot()
    {

        $this->show('user/forgot');
    }

    public function forgotPost()
    {

        $this->show('user/forgot');
    }

    public function edit()
    {   $id = '1'; //to change when I'll have some users in database
        $detailsUser = new UsersManager();
        $userInfo = $detailsUser->find($id);
        debug($userInfo);
        $this->show(
            'user/edit',
            array(
                'editUserInfo' => $userInfo,
            )
        );
    }

    public function editPost()
    {   
        
        $this->show('user/edit');
    }
    public function invitations(){
        /*IMPORT CSV FILE AND CONVERTING TO ARRAY*/
        $filePath = $_SESSION['filePath'];
        $filePathReplace = str_replace(';', ',', $filePath);
        $lines = explode(PHP_EOL, $filePathReplace);
        $arrayStudents = array();
        foreach ($lines as $line) {
            $arrayStudents[] = str_getcsv($line);
        }
        unset($arrayStudents[count($arrayStudents)-1]);
        debug($arrayStudents);
        /*-------------------------Getting the list of sessions------------------*/
        $sessionManager = new SessionManager;
        $sessionList = $sessionManager->findAll();
        //debug($sessionList);
        $this->show('user/admin/invitations', ['arrayStudents'=>$arrayStudents, 'sessionList'=>$sessionList]);
    }

    /*-----Uploading Users list form a file and sending them an invintation to register-----*/
    public function invitationsPost(){
        if(isset($_POST['upload'])){
            if (!empty($_POST)) {
                debug($_POST);
                $extensionAutorisees = array('csv');

                // Je récupère mon tableau avec les infos sur le fichier
                foreach ($_FILES as $key => $fichier) {
                    // Je teste si le fichier a été uploadé
                    if (!empty($fichier) && !empty($fichier['name'])) {
                        if ($fichier['size'] <= 250000) {

                            $filename = $fichier['name'];
                            $dotPos = strrpos($filename, '.');
                            $extension = strtolower(substr($filename, $dotPos+1));
                            // Je test si c'est pas un hack (sur l'extension)
                            //if (substr($fichier['name'], -4) != '.php') {
                            if (in_array($extension, $extensionAutorisees)) {
                                // Je déplace le fichier uploadé au bon endroit
                                if (move_uploaded_file($fichier['tmp_name'], PATHUPLOAD.$filename)) {
                                    $_SESSION['filePath'] = file_get_contents(PATHUPLOAD.$filename);
                                    
                                    /*--------REDIRECTION---------*/
                                   $this->redirectToRoute('user_invitations');
                                }
                                else {
                                    echo 'une erreur est survenue<br />';
                                }
                            }
                            else {
                                echo 'extension interdite<br />';
                            }
                        }
                        else {
                            echo 'fichier trop lourd<br />';
                        }
                    }
                }
            }
        }
        if(isset($_POST['sendInvitations'])){
            if(!empty($_POST)){
                unset($_SESSION['errorList']);               
                unset($_SESSION['successList']);  
                $i = 0;             
                foreach ($_POST['student'] as $key=> $value){
                    $name = isset($value['name']) ? trim($value['name']) : '';
                    $firstname = isset($value['firstname']) ? trim($value['firstname']) : '';
                    $email = isset($value['email']) ? trim($value['email']) : '';
                    $session = isset($_POST['session']) ? trim($_POST['session']) : '';
                    $password = time();
                    $_SESSION['errorList'] =array();
                    $_SESSION['successList'] =array();
                    debug($_SESSION['errorList']);

                    if(strlen(strip_tags($firstname)) >= 2){
                    }
                    else{
                        $_SESSION['errorList'][] = 'Prénom invalide en ligne #'.$key.' Email non envoyé à '.$firstname.' '.$name;
                    }

                    if(strlen(strip_tags(trim($name))) >=2){
                    }
                    else{
                        $_SESSION['errorList'][] = 'Nom invalide en ligne #'.$key.' Email non envoyé à '.$firstname.' '.$name;
                    }
                    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        
                    }
                    else{
                        $_SESSION['errorList'][] = 'Email invalide en ligne #'.$key.' Email non envoyé à '.$firstname.' '.$name;
                    }
                    if(count($_SESSION['errorList']) == 0){
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
                        $i++;
                        debug($insert);
                    }
                }
                $this->redirectToRoute('user_invitations');

            }
        }
    }
}
?>