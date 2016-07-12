<?php

	namespace Controller;
    use \W\Controller\Controller;
	use \Manager\QuizManager;

class QuizController extends Controller
{

    public function quiz()
    {
        //j'instancie le manager lié à la table team
        $quizManager = new QuizManager();
        //J'appelle la methode findAll heritee de manager
        $quizList = $quizManager->findAll();

        $this->show('quiz/quiz', array('quizList' => $quizList));
    }

}
 ?>