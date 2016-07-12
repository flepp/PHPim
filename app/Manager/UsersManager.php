<?php

namespace Manager;

class UsersManager extends \W\Manager\UserManager {

	public function __construct() {
		parent::__construct();
		$this->setTable('users');
	}
}