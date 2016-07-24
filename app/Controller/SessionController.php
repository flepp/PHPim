<?php

	namespace Controller;

    use \Manager\SessionManager;
    use \Manager\UsersManager;
    use \W\Controller\Controller;

class SessionController extends Controller{

    public function session(){
        $this->allowTo(['admin']);

        $sessionManager = new SessionManager;
        $sessionList = $sessionManager->findAll();
        //debug($sessionList);

        $this->show('user/admin/sessions', ['sessionList'=>$sessionList]);
    }

    public function sessionPost(){
        $this->allowTo(['admin']);

        $tableInsert = array();
        $sessionManager = new SessionManager;
        //debug($_POST);

        /*¨-------------------Getting Post from Form Creation---------------------*/
        if(isset($_POST['sessionCreate'])){
            if(!empty($_POST)){
                $sessionName = $_POST['sessionName'];
                $sessionStart = $_POST['sessionStart'];
                $sessionEnd = $_POST['sessionEnd'];
                $valdate = '';
                $valLenght = '';

                if(strtotime($sessionStart) < strtotime($sessionEnd)){
                    $valdate = true;
                }
                else{
                    $_SESSION['errorCreation'][] = "La date de début de session ne peut pas être plus récente que la date de fin de session";
                    $valdate = false;
                }
                
                if(strlen(trim(strip_tags($sessionName))) >= 7){
                    $valLenght = true;

                }
                else{
                    $_SESSION['errorCreation'][] = "Nom de session trop courte";
                    $valLenght = false;
                }
                if($valdate == true && $valLenght == true){
                    $tableInsert = [
                        'ses_name' => $sessionName,
                        'ses_start' => $sessionStart,
                        'ses_end' => $sessionEnd,
                        'ses_status' => 1,
                        'ses_created' => date('Y-m-d'),
                        'ses_updated' => date('Y-m-d'),
                    ];

                    $insert = $sessionManager->insert($tableInsert);
                    $_SESSION['successCreation'][] = "Création réussie!";
                }

                /*--------REDIRECTION---------*/
                $this->redirectToRoute('session_session');
            }
        }

         /*¨-------------------Getting Post from Form Activation---------------------*/
        if(isset($_POST['sessionOn']) || isset($_POST['sessionOff'])){
            if(!empty($_POST)){ 
                /*-------------------Disable OR Enable  session------------*/   
                $id = $_POST['sessionId'];
                $sessionStatus = $_POST['sessionStatus'];
                $tableUpdate = array();
                $tableUpdateUser = array();
                $userManager = new UsersManager;
                $tableUpdate = [
                    'ses_status' => $sessionStatus,
                    'ses_updated' => date('Y-m-d'),
                ];
                $update = $sessionManager->update($tableUpdate, $id);

                /*-------------------Disable OR Enable all students from a specific session------------*/
                $tableUpdateUser = [
                    'usr_status' => $sessionStatus,
                    'usr_updated' => date('Y-m-d'),
                ];
                $updateUser = $userManager->UpdateUsersStatusBySession($tableUpdateUser, $id);
                if($sessionStatus == 1){
                    $_SESSION['success'][] = "La session a été réactivée avec succés!";
                }
                else if($sessionStatus == 0){
                    $_SESSION['success'][] = "La session a été désactivée avec succés!";
                }

                /*--------REDIRECTION---------*/
                $this->redirectToRoute('session_session');
            }
        }

        /*--------------------Getting Post from Form Delete---------------------*/
        if(isset($_POST['sessionDelete'])){
            if(!empty($_POST)){ 
                $id = $_POST['sessionId'];
                $name = $_POST['sessionName'];
                $delete = $sessionManager->delete($id);
                $_SESSION['success'][] = $name." a été supprimée avec succés!";

                /*--------REDIRECTION---------*/
                $this->redirectToRoute('session_session');
            }
        }
        /*--------------------Getting Post from Form Edit---------------------*/
        if(isset($_POST['sessionEdit'])){
            if(!empty($_POST)){
                //debug($_POST);
                $id = $_POST['sessionId'];
                $name = $_POST['sessionName'];
                $sessionName = $_POST['sessionName'];
                $sessionStart = $_POST['sessionStart'];
                $sessionEnd = $_POST['sessionEnd'];
                $valdate = '';
                $valLength = '';

                if(strtotime($sessionStart) < strtotime($sessionEnd)){
                    $valdate = true;
                }
                else{
                    $_SESSION['errorUpdated'][] = "La date de début de session ne peut pas être plus récente que la date de fin de session";
                    $valdate = false;
                }
                
                if(strlen(trim(strip_tags($sessionName))) >= 7){
                    $valLength = true;

                }
                else{
                    $_SESSION['errorUpdated'][] = "Nom de session trop courte";
                    $valLength = false;
                }
                if($valdate == true && $valLength == true){
                    $tableUpdate = [
                        'ses_name' => $sessionName,
                        'ses_start' => $sessionStart,
                        'ses_end' => $sessionEnd,
                        'ses_updated' => date('Y-m-d'),
                    ];

                    $update = $sessionManager->update($tableUpdate, $id);
                    $_SESSION['success'][] = $name." a été mis à jour avec succés!";
                }
                /*--------REDIRECTION---------*/
                $this->redirectToRoute('session_session');
            }
        }
    }
    public function database(){
        $this->allowTo(['admin']);
        $sessionManager = new SessionManager;
        $sessionList = $sessionManager->sessionWithStudents();

        $this->show('user/admin/database',['sessionList'=>$sessionList]);
    }
    public function databasePost(){
        if(isset($_POST['suffixe'])){
            if(!empty($_POST)){
                debug($_POST);
                $suffixe = $_POST['suffixe'];
                $session = $_POST['session'];
                if(strlen(strip_tags(trim($suffixe))) >= 4){
                    $AllUsersManager = new UsersManager;
                    $getAllBySession = $AllUsersManager->getAllBySession($session);
                    foreach($getAllBySession as $key=>$value){
                        $id = $value['id'];
                        $firstname = $value['usr_firstname'];
                        $pseudo = $value['usr_pseudo'];
                        $name = $value['usr_name'];
                        $password = 'webforce3';
                        $status = $value['usr_status'];

                        if($status == 1){
                            $sql = 'CREATE DATABASE IF NOT EXISTS `'.$pseudo.'_'.$suffixe.'` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
                            $sth = $AllUsersManager->connectionToDatabase($sql);
                            $_SESSION['successList'][] = 'Création réussie pour '.$firstname.' '.$name.'.';
                        }
                        else{
                            $_SESSION['errorList'][] = $firstname.' '.$name.' est désactivé(e), impossible de lui affecter une nouvelle base de données';
                        }
                    }
                }
                else{
                    $_SESSION['errorList'][] = 'Suffixe trop court ou invalide!';
                }
                /*--------REDIRECTION---------*/
                $this->redirectToRoute('session_database');
            }
        }
    }
}