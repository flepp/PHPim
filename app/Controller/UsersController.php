<?php

	namespace Controller;
	use \W\Manager\UserManager;
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
    {

        $this->show('user/edit');
    }

    public function editPost()
    {

        $this->show('user/edit');
    }

}
 ?>