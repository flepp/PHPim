<?php
namespace Manager;

class QuizManager extends \W\Manager\Manager
{
	public function __construct (){

		parent::__construct();
		$this->setTable('quiz');
	}
}
