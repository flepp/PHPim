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

                if(strtotime($sessionStart) < strtotime($sessionEnd)){
                    if(strip_tags($sessionName)){
                        if(strlen(trim($sessionName)) >= 7){
                            $tableInsert = [
                                'ses_name' => $sessionName,
                                'ses_start' => $sessionStart,
                                'ses_end' => $sessionEnd,
                                'ses_status' => 1,
                                'ses_created' => date('Y-m-d'),
                                'ses_updated' => date('Y-m-d'),
                            ];

                            $insert = $sessionManager->insert($tableInsert);

                            /*--------REDIRECTION---------*/
                            $this->redirectToRoute('session_session');
                        }
                        else{
                            echo "Nom de session trop courte";
                        }
                    }
                    else{
                        echo "Saississez des données valides svp";
                    }
                }else{
                    echo "La date de début de session ne peut pas être plus récente que la date de fin de session";
                }
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

                /*--------REDIRECTION---------*/
                $this->redirectToRoute('session_session');
            }
        }

        /*--------------------Getting Post from Form Delete---------------------*/
        if(isset($_POST['sessionDelete'])){
            if(!empty($_POST)){ 
                $id = $_POST['sessionId'];
                $sessionManager = new SessionManager;
                $delete = $sessionManager->delete($id);
                /*--------REDIRECTION---------*/
                $this->redirectToRoute('session_session');
            }
        }
        /*--------------------Getting Post from Form Edit---------------------*/
        if(isset($_POST['sessionEdit'])){
            if(!empty($_POST)){
                //debug($_POST);
                $id = $_POST['sessionId'];
                $sessionName = $_POST['sessionName'];
                $sessionStart = $_POST['sessionStart'];
                $sessionEnd = $_POST['sessionEnd'];
                $sessionManager = new SessionManager;

                if(strtotime($sessionStart) < strtotime($sessionEnd)){
                    if(strip_tags($sessionName)){
                        if(strlen(trim($sessionName)) >= 7){
                            $tableUpdate = [
                                'ses_name' => $sessionName,
                                'ses_start' => $sessionStart,
                                'ses_end' => $sessionEnd,
                                'ses_updated' => date('Y-m-d'),
                            ];

                            $update = $sessionManager->update($tableUpdate, $id);

                            /*--------REDIRECTION---------*/
                            $this->redirectToRoute('session_session');
                        }
                        else{
                            echo "Nom de session trop courte";
                        }
                    }
                    else{
                        echo "Saississez des données valides svp";
                    }
                }else{
                    echo "La date de début de session ne peut pas être plus récente que la date de fin de session";
                }
            }
        }
    }
    public function database(){
        $this->allowTo(['admin']);
        $sessionManager = new SessionManager;
        $sessionList = $sessionManager->findAll();

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
                    $test = count($getAllBySession);

                    if($test > 0){
                        foreach($getAllBySession as $key=>$value){
                            $id = $value['id'];
                            $username = $value['usr_firstname'];
                            $name = $value['usr_name'];
                            $password = 'webforce3';
                            $status = $value['usr_status'];

                            if($status == 1){
                                $sql = 'CREATE DATABASE IF NOT EXISTS `'.$username.'_'.$suffixe.'` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci';
                                $sth = $AllUsersManager->connectionToDatabase($sql);
                                $_SESSION['successList'][] = 'Création réussie pour '.$username.' '.$name.'.';
                            }
                            else{
                                $_SESSION['errorList'][] = $username.' '.$name.' est désactivé(e), impossible de lui affecter une nouvelle base de données';
                            }
                        }
                    }
                    else{
                        $_SESSION['errorList'][] = 'Cette session ne comporte pas d\'étudiant, veuillez la remplir avant tout!';
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