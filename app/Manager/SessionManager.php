<?php

namespace Manager;

use \Controller\SessionController;

class SessionManager extends \W\Manager\Manager{
	
	function __construct(){
		parent::__construct();
		$this->setTable('session');
	}
}