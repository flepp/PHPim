<?php

	namespace Controller;
	use \Manager\UsersManager;
	use \W\Controller\Controller;

class UsersController extends Controller
{

    public function register()
    {

        $this->show('user/register');
    }

     public function registerPost()
    {

        $this->show('user/register');
    }

   public function login()
    {

        $this->show('user/login');
    }

    public function loginPost()
    {

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
        //debug($userInfo);
        $this->show(
            'user/edit',
            array(
                'edit' => $userInfo,

            )
        );
    }

    public function editPost()
    {   
        
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