<?php
namespace Manager;
class CategoryManager extends \W\Manager\Manager
{
	public function __construct (){

		parent::__construct();
		$this->setTable('category');
	}
}
