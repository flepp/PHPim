<?php

namespace Manager;

class AllUsersManager extends \W\Manager\UserManager{
	public function __construct() {
		parent::__construct();
		// I'm defining the table name
		$this->setTable('users');
	}

	public function findAllUsersFromSession($id){
		if (!is_numeric($id)){
			return false;
		}
		$sql = 'SELECT * FROM '.$this->table.' WHERE session_id = :id';
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':id', $id);
		$sth->execute();

		return $sth->fetchAll();
	}
}
