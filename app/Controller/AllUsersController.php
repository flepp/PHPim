<?php

namespace Controller;

use \Manager\AllUsersManager;
use \Manager\SessionManager;
use \W\Controller\Controller;

class AllUsersController extends Controller
{

    public function allUsers()
    {   
        debug($_SESSION);
        //I'm getting the list of all sessions
        $sessionManager = new SessionManager();
        $sessionList = $sessionManager->findAll();
        //debug($sessionList);

        //I'm getting the table of all users
        $allUsersManager = new AllUsersManager();
        $allUsersTable = $allUsersManager->findAll();
        //debug($allUsersTable);
        $this->show(
            'allusers/allUsers',
            array(
                'sessionList' => $sessionList
            ),
            array(
                'allUsersTable' => $allUsersTable
            )
        );
    }

    public function details($id)
    {   //echo $id;
        $detailsUser = new AllUsersManager();
        $userInfo = $detailsUser->find($id);
        //debug($userInfo);
        $this->show(
            'allusers/details',
            array(
                'userInfo' => $userInfo
            )
        );
    }

}

?>
