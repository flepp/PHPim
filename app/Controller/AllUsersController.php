<?php

	namespace Controller;
	use \W\Manager\AllUsersManager;
	use \W\Controller\Controller;

class AllUsersController extends Controller
{

    public function allUsers()
    {

        $this->show('allusers/allUsers');
    }

    public function details()
    {

        $this->show('allusers/details');
    }


}
 ?>