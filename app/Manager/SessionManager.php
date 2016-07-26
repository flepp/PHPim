<?php

namespace Manager;

use \Controller\SessionController;

class SessionManager extends \W\Manager\Manager{
	
	function __construct(){
		parent::__construct();
		$this->setTable('session');
	}
	/*Method wich can allow us to select a session and tell us the number of students from this session*/
	public function sessionWithStudents(){
		$sql ='
			SELECT COUNT(*) AS nb_student, session.id,session.ses_name,session.ses_start,session.ses_end,session.ses_status 
			FROM users 
			INNER JOIN session ON session.id = users.session_id 
			GROUP BY session.id, session.ses_name
			ORDER BY session.ses_name ASC
		';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function sessionWithoutStudents(){
		$sql ='
			SELECT session.id, session.ses_name, session.ses_start, session.ses_end, session.ses_status, users.usr_name
			FROM
			  session
			LEFT OUTER JOIN users ON session
			  .id = users.session_id
			  
			WHERE users.id IS NULL
			ORDER BY session.ses_name ASC
		';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}
}