<?php

namespace Manager;

class UsersManager extends \W\Manager\UserManager
{
	public function __construct() {
		parent::__construct();
		// I'm defining the table name
		$this->setTable('users');
	}
}