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

}
 ?>