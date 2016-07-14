<?php
namespace Manager;
class CategoryManager extends \W\Manager\Manager
{
	public function __construct (){

		parent::__construct();
		$this->setTable('category');
	}
	public function findCategory($id)
	{
		if (!is_numeric($id)){
			return false;
		}

		$sql = "SELECT cat_name FROM quiz INNER JOIN category ON category.id = quiz.category_id WHERE quiz.category_id = :id";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":id", $id);
		$sth->execute();

		return $sth->fetch();
	}
	/*public function findAllCategories($orderBy = "", $orderDir = "ASC")
	{

		$sql = "SELECT cat_name FROM quiz INNER JOIN category ON category.id = quiz.category_id WHERE quiz.category_id = :id LIMIT 1" . $this->table;
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
		$id="";
		$sth = $this->dbh->prepare($sql);
				$sth->bindValue(":id", $id);

		$sth->execute();

		return $sth->fetchAll();
	}*/
}
