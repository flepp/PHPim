<?php

	namespace Controller;

    use \Manager\UsersManager;
	use \W\Controller\Controller;

class UsersController extends Controller
{
    //INSCRIPTION\\
    //Appel de la vue d'inscription
    public function register()
    {
        $this->show('user/register');
    }

    //Methode d'inscription
     public function registerPost()
    {
        //if (!empty($_GET['id'])) {
            //$userId = $_GET['id'];
            //print_r($studentId);

            $extensionAutorisees = array('jpg','png','gif');

            // Je récupère mon tableau avec les infos sur le fichier
            foreach ($_FILES as $key => $photo) {
                // Je teste si le fichier a été uploadé
                if (!empty($photo) && !empty($photo['photo'])) {
                    print_r($photo);
                    if ($photo['size'] <= 500000) {
                        $filename = $photo['photo'];
                        $dotPos = strrpos($filename, '.');
                        $extension = strtolower(substr($filename, $dotPos+1));
                        // Je test si c'est pas un hack (sur l'extension)
                        if (in_array($extension, $extensionAutorisees)) {
                            // Je déplace le fichier uploadé au bon endroit
                            if (move_uploaded_file($photo['tmp_name'], 'upload/'. 'avatar_' .$userId.'.'.$extension)) {
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
        //}

        debug($_POST);
        //Recupération des données du POST (formulaire d'inscription)
        $email = isset($_POST['email']) ? trim($_POST['email']): '';
        $userpseudo = isset($_POST['userpseudo']) ? trim($_POST['userpseudo']): '';
        $password = isset($_POST['password']) ? trim($_POST['password']): '';
        $password2 = isset($_POST['password2']) ? trim($_POST['password2']): '';

        $street = isset($_POST['street']) ? trim($_POST['street']): '';
        $city = isset($_POST['city']) ? trim($_POST['city']): '';
        $zipcode = isset($_POST['zipcode']) ? trim($_POST['zipcode']): '';
        $country = isset($_POST['country']) ? trim($_POST['country']): '';
        $birthdate = isset($_POST['birthdate']) ? trim($_POST['birthdate']): '';
        $photo = isset($_POST['photo']) ? $_POST['photo']: '';

        //Validation des données
        if ($password != '' && $password == $password2){
            //Insertion en DB
            $userManager = new \Manager\UsersManager();
            $userManager->insert(
                array(
                    'usr_email' => $email,
                    'usr_pseudo' => $userpseudo,
                    'usr_password' =>  password_hash($password, PASSWORD_BCRYPT),
                    'usr_role' => 'user',
                    'usr_street' => $street,
                    'usr_city' => $city,
                    'usr_zipcode' => $zipcode,
                    'usr_country' => $country,
                    'usr_birthdate' => $birthdate,
                    'usr_photo' => $photo,
                    'usr_status' => '1',
                    'usr_created' => date('Y-m-d H:i:s')
                )
            );

            //Redirection vers la page "LOGIN"
            $this->redirectToRoute('user_login');
        }
        else {
            echo 'Verifiez les champs';
            exit;
        }
    }

    //CONNEXION\\
    //Appel de la vue de connexion
   public function login()
    {
        $this->show('user/login');
    }
    //Methode de connexion
    public function loginPost()
    {
        debug($_POST);exit;
        //Recupération des données du POST (formulaire de connexion)
        $userPseudoOrEmail = isset($_POST['userpseudo']) ? trim($_POST['userpseudo']) : '';
        $password = isset($_POST['password']) ? trim($_POST['password']) : '';

        // Verification des données
        $authManager = new \W\Security\AuthentificationManager();
        $usr_id = $authManager->isValidLoginInfo($userPseudoOrEmail, $password);
        if ($usr_id === 0) {
            echo'Login invalide <br />';
        }
        else {
            $userManager = new \Manager\UsersManager();

            // On est "loggé" et on met les infos en session
            $authManager->logUserIn(
                $userManager->find($usr_id)
            );

            // Redirection vers "Home"
            $this->redirectToRoute('home');
        }
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
    {

        $this->show('user/edit');
    }

    public function editPost()
    {

        $this->show('user/edit');
    }

}
 ?>