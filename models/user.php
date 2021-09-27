<?php
class user extends Model {
	var $Table="Users";

	function getUser($login, $password)
	{
		return $this->findfirst(array("condition"=> 'User="'.$login.'" and Mdp = "'. md5($password) .'"'));
	}

	function createUser($login, $password)
	{
		return $this->create(array(
			'fields'=>"User,Mdp,Rang",
			'values'=>"'".$login."','".md5($password)."','user'")
		);
	}
	function getAllUser(){
		return $this->find(array(
			'fields'=>"User")
		);
	}
}
?>
