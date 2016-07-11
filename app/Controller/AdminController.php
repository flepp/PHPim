<?php

	namespace Controller;
	use \W\Manager\AdminManager;
	use \W\Controller\Controller;

class AdminController extends Controller
{

    public function sessions()
    {

        $this->show('user/admin/sessions');
    }

    public function invitations()
    {

        $this->show('user/admin/invitations');
    }

    public function database()
    {

        $this->show('user/admin/database');
    }

    public function activateQuiz()
    {

        $this->show('user/admin/activateQuiz');
    }

    public function modifyQuiz()
    {

        $this->show('user/admin/modifyQuiz');
    }


}
 ?>