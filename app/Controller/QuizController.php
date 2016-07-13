<?php

	namespace Controller;
    use \W\Controller\Controller;
	use \Manager\QuizManager;

class QuizController extends Controller
{

    public function add(){

        $this->show('user/admin/addQuiz');
    }

    public function addPost(){

        $quizManager = new QuizManager();

        $day = isset($_POST['quiDay']) ? trim($_POST['quiDay']) : '';
        $title = isset($_POST['quiTitle']) ? trim($_POST['quiTitle']) : '';
        $link = isset($_POST['quiLink']) ? trim($_POST['quiLink']) : '';

        if (isset($_POST)) {
            $data = array(
                'qui_day' => $day,
                'qui_title' => $title,
                'qui_link' => $link
            );

            $quizManager->insert($data);
            $this->redirectToRoute('quiz_activate');
        }
    }

    public function activate()
    {
        //j'instancie le manager lié à la table quiz
        $quizManager = new QuizManager();
        //J'appelle la methode findAll heritee de manager
        $quizList = $quizManager->findAll($orderBy = "qui_day", $orderDir = "ASC");

        $this->show('user/admin/activateQuiz', array('quizList' => $quizList));
    }

    public function activatePost()
    {
        $quizManager = new QuizManager();
        $quizList = $quizManager->findAll();

        debug($_POST);

        if(isset($_POST['quiStatus'])){
            $id = $_POST['quiId'];
            $quiStatus = $_POST['quiStatus'];
            $data = array(
                "qui_status" => $quiStatus
            );
            $quizManager->update($data, $id, $stripTags = true);
            $this->redirectToRoute('quiz_activate');
        }
        debug($quizList);

        if (isset($_POST['delete'])) {
            $id = $_POST['deleteQuiz'];
            $quizManager = new QuizManager();
            //$quizSingle = $quizManager->find($id);
            $quizDelete = $quizManager->delete($id);
            $this->redirectToRoute('quiz_activate');
            //$this->show('user/admin/activateQuiz', array('quizDelete' => $quizDelete));
            debug($_POST);
        }
    }

    public function modify($id)
    {
        $quizManager = new QuizManager();
        $quizSingle = $quizManager->find($id);

        $this->show('user/admin/modifyQuiz', array('quizSingle' => $quizSingle));
    }

    public function modifyPost($id){

        $quizManager = new QuizManager();
        //J'appelle la methode findAll heritee de manager
        $quizSingle = $quizManager->find($id);

        $quiDay = $_POST['quiDay'];
        $quiTitle = $_POST['quiTitle'];
        $quiLink = $_POST['quiLink'];

        $data = array(
            "qui_day" => $quiDay,
            "qui_title" => $quiTitle,
            "qui_link" => $quiLink
        );

        $id = $quizSingle['id'];

        if(isset($_POST)){
            $quizUpdate = $quizManager->update($data, $id, $stripTags = true);
            $this->redirectToRoute('quiz_modify', ['id' => $quizSingle[id]]);
            //$this->redirectToRoute('quiz_activate');
        }

        $this->show('user/admin/modifyQuiz', array('quizSingle' => $quizSingle));
        //debug($_POST);
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