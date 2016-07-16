<?php
namespace Manager;

class QuizManager extends \W\Manager\Manager
{
	public function __construct (){

		parent::__construct();
		$this->setTable('quiz');
	}

	public function findAllQuizInfo($orderBy = "", $orderDir = "ASC")
	{
		$sql = "SELECT
				  quiz.id,
				  category_id,
				  qui_title,
				  qui_link,
				  qui_status,
				  qui_day,
				  qui_created,
				  qui_updated,
				  cat_name
				FROM
				  quiz
				LEFT OUTER JOIN
				  category ON category.id = quiz.category_id";

		if (!empty($orderBy)){

			//sécurisation des paramètres, pour éviter les injections SQL
			if(!preg_match("#^[a-zA-Z0-9_$]+$#", $orderBy)){
				die("invalid orderBy param");
			}
			$orderDir = strtoupper($orderDir);
			if($orderDir != "ASC" && $orderDir != "DESC"){
				die("invalid orderDir param");
			}

			$sql .= " ORDER BY $orderBy $orderDir";
		}
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}
}
