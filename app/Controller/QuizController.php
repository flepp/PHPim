<?php

namespace Controller;
use \W\Controller\Controller;
use \Manager\QuizManager;
use \Manager\CategoryManager;
use \Manager\SessionManager;
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
        $day = isset($_POST['quiDay']) ? trim($_POST['quiDay']) : '';
        $title = isset($_POST['quiTitle']) ? trim($_POST['quiTitle']) : '';
        $link = isset($_POST['quiLink']) ? trim($_POST['quiLink']) : '';
        $text = isset($_POST['quiText']) ? trim($_POST['quiText']) : '';
        $category = isset($_POST['categories']) ? trim($_POST['categories']) : '';

        if (empty($text)) {
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link,
                'qui_text' => $link,
                'category_id' => $category
            );
        }
        else{
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link,
                'qui_text' => $text,
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
            debug($_SESSION);
            $this->redirectToRoute('quiz_add');
        }
    }

    public function manage()
    {
        $this->allowTo(['admin']);
        $quizManager = new QuizManager();
        $quizList = $quizManager->findAllQuizInfo($orderBy = "qui_day");
        $this->show('user/admin/manageQuiz',
            array(
                    'quizList' => $quizList
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
            debug($quizList);
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
        //J'appelle la methode findAll heritee de manager
        $quizSingle = $quizManager->find($id);

        $day = $_POST['quiDay'];
        $title = $_POST['quiTitle'];
        $link = $_POST['quiLink'];
        $text = $_POST['quiText'];
        $category = isset($_POST['categories']) ? trim($_POST['categories']) : '';

        if (empty($text)) {
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link,
                'qui_text' => $link,
                'category_id' => $category
            );
        }
        else{
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link,
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
        //j'instancie le manager lié à la table quiz
        $quizManager = new QuizManager();
        //J'appelle la methode findAll heritee de manager
        $quizList = $quizManager->findAll($orderBy = "qui_day");
        $sessionManager = new AllUsers();
        $id = $_SESSION['user']['session_id'];
        $sessionList = $sessionManager->findAllUsersFromSession($id);
        $this->show('quiz/quiz', array('quizList' => $quizList, 'sessionList' => $sessionList));
    }

}
?>