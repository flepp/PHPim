<?php

	namespace Controller;
	use \Manager\SessionManager;
	use \W\Controller\Controller;

class SessionController extends Controller{

    public function session(){

        $this->show('user/admin/sessions');

        $tableInsert = array();
        $adminManager = new AdminManager;
        if(!empty($_POST)){
            $sessionName = $_POST['sessionName'];
            $sessionStart = $_POST['sessionStart'];
            $sessionEnd = $_POST['sessionEnd'];
            if(strlen(trim(strip_tags($sessionName))) > 5){

            }

        }

    }
    public function database(){

        $this->show('user/admin/database');
    }
    public function invitations(){

        $this->show('user/admin/invitations');
    }

}