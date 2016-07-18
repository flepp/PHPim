<?php
	namespace Controller;
	use \Manager\UsersManager;
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

    public function edit($id)
    {   
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

    public function editPost($id)
    {   
        $authorizedExtensions = array ('jpg', 'jpeg', 'gif', 'png');
        foreach ($_FILES as $key => $value) {
            if (!empty($value) && !empty($value['photo'])){
                print_r($value);
                if ($value['size'] <= 300000) {
                    $fileName = $value['photo'];
                    $dotPosition = strrpos($fileName, '.');
                    $extension = strtolower(substr($fileName, $dotPosition + 1));
                    /*Checking if a value exists in an array with "in_array" function*/
                    if (in_array($extension, $authorizedExtensions)) {
                        /*Moving an uploaded file to a new location*/
                        if (move_uploaded_file($value['tmp_name'], 'public/assets/upload/img/'.'img_'.$userPseudo.'.'.$extension)) {
                            // I'm updating the photo in database
                            $photo = isset($_POST['photo']) ? trim($_POST['photo']): '';

                            $detailsUser = new UsersManager();
                            $userInfo = $detailsUser->find($id);
                            $userPhoto = array (
                                        'usr_photo' => $photo
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
        //Inserting data from POST
        $userPseudo = isset($_POST['userpseudo']) ? trim($_POST['userpseudo']): '';
        $password = isset($_POST['userpassword']) ? trim($_POST['userpassword']): '';
        $street = isset($_POST['userstreet']) ? trim($_POST['userstreet']): '';
        $city = isset($_POST['usercity']) ? trim($_POST['usercity']): '';
        $zipcode = isset($_POST['userzipcode']) ? trim($_POST['userzipcode']): '';
        $country = isset($_POST['usercountry']) ? trim($_POST['usercountry']): '';
        $birthdate = isset($_POST['userbirthdate']) ? trim($_POST['userbirthdate']): '';
        $photo = isset($_POST['photo']) ? trim($_POST['photo']): '';

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

    public function invitations(){
        $this->show('user/admin/invitations');
    }

    /*-----Uploading Users list form a file and sending them an invintation to register-----*/
    public function invitationsPost(){
        if (!empty($_POST)) {
        debug($_POST);
        debug($_FILES);

        $extensionAutorisees = array('txt');

        // Je récupère mon tableau avec les infos sur le fichier
        foreach ($_FILES as $key => $fichier) {
            // Je teste si le fichier a été uploadé
            if (!empty($fichier) && !empty($fichier['name'])) {
                print_r($fichier);
                if ($fichier['size'] <= 250000) {
                    $filename = $fichier['name'];
                    $dotPos = strrpos($filename, '.');
                    $extension = strtolower(substr($filename, $dotPos+1));
                    // Je test si c'est pas un hack (sur l'extension)
                    //if (substr($fichier['name'], -4) != '.php') {
                    if (in_array($extension, $extensionAutorisees)) {
                        // Je déplace le fichier uploadé au bon endroit
                        if (move_uploaded_file($fichier['tmp_name'], 'C:\xampp\htdocs\PHPim\public\assets\upload\text/'.$filename)) {
                            echo 'fichier téléversé<br />';
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
}
?>