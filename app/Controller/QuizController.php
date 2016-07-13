<?php

	namespace Controller;
    use \W\Controller\Controller;
	use \Manager\QuizManager;

class QuizController extends Controller
{

    public function activate()
    {
        //j'instancie le manager lié à la table quiz
        $quizManager = new QuizManager();
        //J'appelle la methode findAll heritee de manager
        $quizList = $quizManager->findAll();

        $this->show('user/admin/activateQuiz', array('quizList' => $quizList));
    }

    public function activatePost()
    {
        $quizManager = new QuizManager();
        $quizList = $quizManager->findAll();


        debug($_POST);

        if(isset($_POST)){
            $id = $_POST['quiId'];
            $quiStatus = $_POST['quiStatus'];
            $data = array(
                "qui_status" => $quiStatus
            );
            $quizManager->update($data, $id, $stripTags = true);
            $this->redirectToRoute('quiz_activate');
        }
        debug($quizList);

        $this->show('user/admin/activateQuiz', array('quizList' => $quizList));

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