<?php

namespace Controller;
use \W\Controller\Controller;
use \Manager\QuizManager;
use \Manager\CategoryManager;

class QuizController extends Controller
{

    public function add(){
        $categoryManager = new CategoryManager();
        $categoryList = $categoryManager->findAll();
        $this->show('user/admin/addQuiz',array('categoryList' => $categoryList));
    }

    public function addPost(){
        $quizManager = new QuizManager();

        $day = isset($_POST['quiDay']) ? trim($_POST['quiDay']) : '';
        $title = isset($_POST['quiTitle']) ? trim($_POST['quiTitle']) : '';
        $link = isset($_POST['quiLink']) ? trim($_POST['quiLink']) : '';
        $category = isset($_POST['categories']) ? trim($_POST['categories']) : '';

        if (isset($_POST)) {
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link,
                'category_id' => $category
            );
            $quizManager->insert($data);
            $this->redirectToRoute('quiz_manage');
        }
    }

    public function manage()
    {
        $quizManager = new QuizManager();
        $quizList = $quizManager->findAllQuizInfo();
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
            $this->redirectToRoute('quiz_manage');
            //$this->show('user/admin/activateQuiz', array('quizDelete' => $quizDelete));
        }
    }

    public function modify($id)
    {
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

        $quiDay = $_POST['quiDay'];
        $quiTitle = $_POST['quiTitle'];
        $quiLink = $_POST['quiLink'];
        $category = isset($_POST['categories']) ? trim($_POST['categories']) : '';

        $data = array(
            "qui_day" => $quiDay,
            "qui_title" => $quiTitle,
            "qui_link" => $quiLink,
            "category_id" => $category
        );

        $id = $quizSingle['id'];

        if(isset($_POST)){
            $quizUpdate = $quizManager->update($data, $id, $stripTags = true);
            $this->redirectToRoute('quiz_modify', ['id' => $quizSingle[id]]);
        }

        $this->show('user/admin/modifyQuiz', array('quizSingle' => $quizSingle));
    }

     public function quizPerCat(){
        $quizManager = new QuizManager();
        $quizList = $quizManager->findQuizByCat();
        $this->show('user/admin/quizPerCategory', array('quizList' => $quizList));
    }

    public function quiz()
    {
        //j'instancie le manager lié à la table quiz
        $quizManager = new QuizManager();
        //J'appelle la methode findAll heritee de manager
        $quizList = $quizManager->findAll();

        $this->show('quiz/quiz', array('quizList' => $quizList));
    }

}
?>