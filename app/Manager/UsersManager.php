<?php

namespace Manager;

use \Controller\UsersController;

class UsersManager extends \W\Manager\Manager{

	function __construct(){
		parent::__construct();
		$this->setTable('users');
	}
	/*Method allowing us to change status for all users linked by the same session*/
	public function UpdateUsersStatusBySession(array $data, $id, $stripTags = true){
		if (!is_numeric($id)){
			return false;
		}
		$sql = "UPDATE " . $this->table . " SET ";
		foreach($data as $key => $value){
			$sql .= "$key = :$key, ";
		}
		$sql = substr($sql, 0, -2);
		$sql .= " WHERE session_id = :id";

		$sth = $this->dbh->prepare($sql);
		foreach($data as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(":".$key, $value);
		}
		$sth->bindValue(":id", $id);
		return $sth->execute();
	}

	public function updateToken(array $data, $email, $stripTags = true)
	{

		$sql = "UPDATE " . $this->table . " SET ";
		foreach($data as $key => $value){
			$sql .= "$key = :$key, ";
		}
		$sql = substr($sql, 0, -2);
		$sql .= " WHERE usr_email = :email";

		$sth = $this->dbh->prepare($sql);
		foreach($data as $key => $value){
			$value = ($stripTags) ? strip_tags($value) : $value;
			$sth->bindValue(":".$key, $value);
		}
		$sth->bindValue(":email", $email);
		return $sth->execute();
	}

	public function getIdFromToken($token)
    {

        $sql = "SELECT id FROM " . $this->table . " WHERE usr_token = :token LIMIT 1";
        $sth = $this->dbh->prepare($sql);
        $sth->bindValue(":token", $token);
        $sth->execute();

        return $sth->fetch();
    }

	public function getAllBySession($session){

		$sql = "SELECT id, usr_firstname, usr_name, usr_status FROM " . $this->table . " WHERE session_id = :session ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":session", $session);
		$sth->execute();

		return $sth->fetchAll();
	}

	public function connectionToDatabase($sql){
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
	}

	public function getUsrUpdated($email){

		$sql = "SELECT usr_firstname, usr_updated FROM " . $this->table . " WHERE usr_email = :email ";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(":email", $email);
		$sth->execute();

		return $sth->fetch();
	}
}

