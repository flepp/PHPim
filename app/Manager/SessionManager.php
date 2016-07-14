<?php

namespace Manager;

use \Controller\SessionController;

class SessionManager extends \W\Manager\Manager{
	
	function __construct(){
		parent::__construct();
		$this->setTable('session');
	}
	/*Method wich can allow us to select a session and tell us the number of students from this session*/
	public function sessionAndStudentsNumberBySession(){
		$sql ='
			SELECT COUNT(*) AS nb_student, session.id,session.ses_name,session.ses_start,session.ses_end,session.ses_status 
			FROM users 
			INNER JOIN session ON session.id = users.session_id 
			GROUP BY session.id, session.ses_name
		';
		$sth = $this->dbh->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}
}