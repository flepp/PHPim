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
		$sql = 'SELECT *, session.ses_name
				FROM '.$this->table.'
				INNER JOIN session
				ON users.session_id=session.id  WHERE session.id ='.$id;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}
}
