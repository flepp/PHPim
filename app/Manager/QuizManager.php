<?php
namespace Manager;

class QuizManager extends \W\Manager\Manager
{
	public function __construct (){

		parent::__construct();
		$this->setTable('quiz');
	}
	public function getQuizByCat(){
		$sql = "
			SELECT category.id, category.cat_name, quiz.id AS qui_id, quiz.qui_title, quiz.qui_status, qui_link, quiz.qui_day
			FROM
			  category
			INNER JOIN quiz ON quiz
			  .category_id = category.id
            ORDER BY quiz.qui_day ASC";

        $sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function findQuizByCat($orderBy = "", $orderDir = "ASC")
	{

		$category = $_GET['cat_name'];

		$sql = 'SELECT
				  quiz.id,
				  category_id,
				  qui_title,
				  qui_link,
				  qui_text,
				  qui_status,
				  qui_day,
				  qui_created,
				  qui_updated,
				  cat_name
				FROM
				  quiz
				LEFT OUTER JOIN
				  category ON category.id = quiz.category_id
				WHERE
				  category ='.$category
				;

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
