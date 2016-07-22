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
		$sql = 'SELECT users.id, users.usr_name, users.usr_firstname, users.session_id, users.usr_photo, users.usr_pseudo, session.ses_name
				FROM '.$this->table.'
				LEFT OUTER JOIN session
				ON session.id = users.session_id  WHERE session.id ='.$id;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}
}
