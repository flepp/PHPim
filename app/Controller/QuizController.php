<?php

namespace Controller;
use \W\Controller\Controller;
use \Manager\QuizManager;
use \Manager\CategoryManager;
use \Manager\SessionManager;
use \Manager\UsersManager;
use \Manager\AllUsersManager as AllUsers;

class QuizController extends Controller
{

    public function add(){
        $this->allowTo(['admin']);
        $categoryManager = new CategoryManager();
        $categoryList = $categoryManager->findAll();
        $quizManager = new QuizManager();
        $quizList = $quizManager->findAll();
        $this->show('user/admin/addQuiz',array('quizList' => $quizList,'categoryList' => $categoryList));
    }

    public function addPost(){
        $quizManager = new QuizManager();
        $quizList = $quizManager->findAll();
        $day = isset($_POST['quiDay']) ? trim(strip_tags($_POST['quiDay'])) : '';
        $title = isset($_POST['quiTitle']) ? strip_tags($_POST['quiTitle']) : '';
        $link = isset($_POST['quiLink']) ? trim(strip_tags($_POST['quiLink'])) : '';
        $text = isset($_POST['quiText']) ? strip_tags($_POST['quiText']) : '';
        $category = $_POST['categories'];

        if (empty($text)) {
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link,
                'qui_text' => $link,
                'category_id' => $category,
                'qui_status' => 0,
                'qui_created' => date('Y-m-d'),
                'category_id' => $category
            );
        }
        else{
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link,
                'qui_text' => $text,
                'category_id' => $category,
                'qui_status' => 0,
                'qui_created' => date('Y-m-d'),
                'category_id' => $category
            );
        }

        if(!empty($_POST)) {
            if(empty($day)) {
                $_SESSION['errorList'][] = 'Le champ jour est vide.';
            }
            if(!empty($day) && !is_numeric($day)){
                $_SESSION['errorList'][] = 'Le champ jour doit être un chiffre ou un nombre';
            }
            if(empty($title)) {
                $_SESSION['errorList'][] = 'Le champ titre est vide.';
            }
            if(!empty($title) && strlen($title) < 3){
                $_SESSION['errorList'][] = 'Le champ titre doit comporter au moins trois caractères';
            }
            if(empty($link)) {
                $_SESSION['errorList'][] = 'Le champ lien est vide.';
            }
            if(empty($_SESSION['errorList'])){
                $quizManager->insert($data);
                $_SESSION['successList'][] = 'Le quiz a bien été ajouté!';
            }
            $this->redirectToRoute('quiz_add');
        }
    }

    public function manage()
    {
        $this->allowTo(['admin']);
        $quizManager = new QuizManager();
        /*$quizList = $quizManager->findAllQuizInfo($orderBy = "qui_day");*/
        $quizList = $quizManager->getQuizByCat();
        /*grouping quiz by category name*/
        $quizListBycat = array();
        foreach($quizList as $key => $value) {
            $quizListBycat[ucfirst ($value['cat_name'])][] = array(
                'id' => $value['qui_id'],
                'category_id' => $value['id'],
                'qui_title' => ucfirst ($value['qui_title']),
                'qui_link' => $value['qui_link'],
                'qui_status' => $value['qui_status'],
                'qui_day' => $value['qui_day']
            );
        }
        $this->show('user/admin/manageQuiz',
            array(
                    'quizList' => $quizListBycat
            )
        );
    }

    public function managePost()
    {
        $quizManager = new QuizManager();
        $quizList = $quizManager->findAll();

        if(isset($_POST['quiStatus'])){
            $id = $_POST['quiId'];
            $quiStatus = $_POST['quiStatus'];
            $data = array(
                "qui_status" => $quiStatus
            );
            $quizManager->update($data, $id, $stripTags = true);
            $this->redirectToRoute('quiz_manage');
        }

        if (isset($_POST['delete'])) {
            $id = $_POST['deleteQuiz'];
            $quizManager = new QuizManager();
            //$quizSingle = $quizManager->find($id);
            $quizDelete = $quizManager->delete($id);
            $quizName = $_POST['quizName'];
            $_SESSION['successList'][] = 'Le quiz '.$quizName.' a bien été supprimé!';
            $this->redirectToRoute('quiz_manage');
            //$this->show('user/admin/activateQuiz', array('quizDelete' => $quizDelete));
        }
    }

    public function modify($id)
    {
        $this->allowTo(['admin']);
        $quizManager = new QuizManager();
        $quizSingle = $quizManager->find($id);
        $categoryManager = new CategoryManager();
        $categoryList = $categoryManager->findAll();
        $this->show('user/admin/modifyQuiz', array('quizSingle' => $quizSingle, 'categoryList' => $categoryList));
    }

    public function modifyPost($id){

        $quizManager = new QuizManager();
        //Updating Quiz
        $quizSingle = $quizManager->find($id);

        $day = isset($_POST['quiDay']) ? trim(strip_tags($_POST['quiDay'])) : '';
        $title = isset($_POST['quiTitle']) ? strip_tags($_POST['quiTitle']) : '';
        $link = isset($_POST['quiLink']) ? trim(strip_tags($_POST['quiLink'])) : '';
        $text = isset($_POST['quiText']) ? strip_tags($_POST['quiText']) : '';
        $category = $_POST['categories'];

        if (empty($text)) {
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link,
                'qui_text' => $link,
                'category_id' => $category,
                'qui_updated' => date('Y-m-d'),
                'category_id' => $category
            );
        }
        else{
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link,
                'category_id' => $category,
                'qui_updated' => date('Y-m-d'),
                'qui_text' => $text,
                'category_id' => $category
            );
        }

        $id = $quizSingle['id'];

        if(!empty($_POST)) {
            if(empty($day)) {
                $_SESSION['errorList'][] = 'Le champ jour est vide.';
            }
            if(!empty($day) && !is_numeric($day)){
                $_SESSION['errorList'][] = 'Le champ jour doit être un chiffre ou un nombre';
            }
            if(empty($title)) {
                $_SESSION['errorList'][] = 'Le champ titre est vide.';
            }
            if(!empty($title) && strlen($title) < 3){
                $_SESSION['errorList'][] = 'Le champ titre doit comporter au moins trois caractères';
            }
            if(empty($link)) {
                $_SESSION['errorList'][] = 'Le champ lien est vide.';
            }
            if(!empty($_SESSION['errorList'])){
                $this->redirectToRoute('quiz_modify', ['id' => $quizSingle[id]]);
            }
            if(empty($_SESSION['errorList'])){
                $quizUpdate = $quizManager->update($data, $id, $stripTags = true);
                $_SESSION['successList'][] = 'Le quiz '.$title.' a bien été modifié!';
                $this->redirectToRoute('quiz_manage');
            }

        }
    }

    public function quiz()
    {
        //getting quiz table
        $quizManager = new QuizManager();
        //fetchin all and sorting par cat_name
        $quizList = $quizManager->getQuizByCat($orderBy = "qui_day");
        $quizListBycat = array();
        $quizListBycatStatusOn = array();
        $i = 0;
        foreach($quizList as $key => $value) {
            $quizListBycat[ucfirst ($value['cat_name'])][] = array(
                'id' => $value['qui_id'],
                'category_id' => $value['id'],
                'qui_title' => ucfirst ($value['qui_title']),
                'qui_link' => $value['qui_link'],
                'qui_status' => $value['qui_status'],
                'qui_day' => $value['qui_day']
            );
        }
        foreach($quizList as $key => $value) {
            if($value['qui_status'] == 1){
                $quizListBycatStatusOn[ucfirst ($value['cat_name'])][] = array(
                    'id' => $value['qui_id'],
                    'category_id' => $value['id'],
                    'qui_title' => ucfirst ($value['qui_title']),
                    'qui_link' => $value['qui_link'],
                    'qui_status' => $value['qui_status'],
                    'qui_day' => $value['qui_day']
                );
            }
        }
        /* ----------------------- Getting the SES_END for users --------------------- */
        if(isset($_SESSION) && !empty($_SESSION)){
            $id = $_SESSION['user']['session_id'];
            $userManager = new UsersManager;
            $getSesEnd = $userManager->getSesdEnd($id);
            $_SESSION['user']['ses_end'] = $getSesEnd['ses_end'];
        }

        $quizManager = new QuizManager();
        $quizList = $quizManager->findAll($orderBy = "qui_day");
        $sessionManager = new SessionManager();
        $sessionList = $sessionManager->findAll();
        $this->show('quiz/quiz', array('quizList' => $quizListBycat, 'sessionList' => $sessionList, 'quizList2' => $quizListBycatStatusOn)); 
    }
}
?>