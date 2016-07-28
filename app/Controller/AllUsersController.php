<?php

namespace Controller;

use \Manager\AllUsersManager;
use \Manager\UsersManager;
use \Manager\SessionManager;
use \W\Controller\Controller;

class AllUsersController extends Controller {

    public function allUsers() {
        $this->allowTo(['admin','user']);   
        if (($_SESSION['user']['usr_role'] == 'user')) {
            $session = $_SESSION['user']['session_id'];
            $sessionManager = new AllUsersManager();
            $allUsersTable = $sessionManager->findAllUsersFromSession($session);
            $this->show(
            'allusers/allUsers',
                array(
                    'allUsersTable' => $allUsersTable
                )
            );
        }
        else {
            $sessionManager = new SessionManager();
            $sessionList = $sessionManager->sessionWithStudents();

            /* ~~~~~~~~~~~~~~~~~ I'm getting the table of all users of each session ~~~~~~~~~~~~~~~~~~ */
            $allUsersManager = new AllUsersManager();

            if (!empty($_GET['session'])) {
                $allUsersTable = $allUsersManager->findAllUsersFromSession($_GET['session']);
            }

            else {
                $allUsersTable = array();
            }
            $this->show(
                'allusers/allUsers',
                array(
                    'sessionList' => $sessionList,
                    'id_session' => isset($_GET['session']) ? trim($_GET['session']): '',
                    'allUsersTable' => $allUsersTable
                )
            );
        }
    }

    public function details($id) {
        $this->allowTo(['admin','user']); 
        $usersManager = new UsersManager;
        $usersList = $usersManager->findAllUsersAndSort();

        $detailsUser = new AllUsersManager();
        $userInfo = $detailsUser->find($id);

        $this->show(
            'allusers/details',
            array(
                'userInfo' => $userInfo,
                'usersList' => $usersList
            )
        );
    }

    public function detailsPost() {
        if(isset($_POST['troll'])) {
            if(!empty($_POST)){
                $id = $_POST['userInfo'];
                $userinfo = new UsersManager;
                $infos = $userinfo->find($id);
                $_SESSION['user']['id'] = $infos['id'];
                $_SESSION['user']['session_id'] = $infos['session_id'];
                $_SESSION['user']['usr_name'] = $infos['usr_name'];
                $_SESSION['user']['usr_firstname'] = $infos['usr_firstname'];
                $_SESSION['user']['usr_email'] = $infos['usr_email'];
                $_SESSION['user']['usr_birthdate'] = $infos['usr_birthdate'];
                $_SESSION['user']['usr_photo'] = $infos['usr_photo'];
                $_SESSION['user']['usr_pseudo'] = $infos['usr_pseudo'];
                $_SESSION['user']['usr_status'] = $infos['usr_status'];
                $_SESSION['user']['usr_zipcode'] = $infos['usr_zipcode'];
                $_SESSION['user']['usr_street'] = $infos['usr_street'];
                $_SESSION['user']['usr_city'] = $infos['usr_city'];
                $_SESSION['user']['usr_country'] = $infos['usr_country'];
                $_SESSION['user']['usr_created'] = $infos['usr_created'];
                $_SESSION['user']['usr_updated'] = $infos['usr_updated'];

            /* ~~~~~~~~~~~~~~~~~ I'm redirecting to user details page ~~~~~~~~~~~~~~~~~~ */
            $this->redirectToRoute('allusers_details', ['id' => $_SESSION['user']['id']]);  
            }
        }
    }
}

?>
