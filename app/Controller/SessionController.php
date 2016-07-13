<?php

	namespace Controller;
	use \Manager\SessionManager;
	use \W\Controller\Controller;

class SessionController extends Controller{

    public function session(){
        $sessionManager = new SessionManager;
        $sessionList = $sessionManager->findAll();
        //debug($sessionList);

        $this->show('user/admin/sessions', ['sessionList'=>$sessionList]);
    }

    public function sessionPost(){
        $tableInsert = array();
        $sessionManager = new SessionManager;
        //debug($_POST);
        if(isset($_POST['sessionName'])){
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
                            //debug($tableInsert);
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
        else if(!empty($_POST)){    
            $id = $_POST['sessionId'];
            $sessionStatus = $_POST['sessionStatus'];
            $tableUpdate = array();
            $tableUpdate = [
                'ses_status' => $sessionStatus,
                'ses_updated' => date('Y-m-d'),
            ];
            $update = $sessionManager->update($tableUpdate, $id);
            $this->redirectToRoute('session_session');

        }
    }
    /*public function sessionPost(){
        $sessionManager = new SessionManager;
        
        
    }*/
    public function database(){

        $this->show('user/admin/database');
    }
    public function invitations(){

        $this->show('user/admin/invitations');
    }

}