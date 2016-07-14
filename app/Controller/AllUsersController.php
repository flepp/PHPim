<?php

namespace Controller;

use \Manager\AllUsersManager;
use \W\Controller\Controller;

class AllUsersController extends Controller
{

    public function allUsers()
    {   
        $allUsersManager = new AllUsersManager();
        $allUsersTable = $allUsersManager->findAll();
        //debug($allUsersTable);
        $this->show(
            'allusers/allUsers',
            array(
                'allUsersTable' => $allUsersTable
            )
        );
    }

    public function details($id)
    {   echo $id;
        $detailsUser = new AllUsersManager();
        $userInfo = $detailsUser->find($id);
        debug($userInfo);
        $this->show(
            'allusers/details',
            array(
                'details' => $userInfo
            )
        );
    }

}
 ?>