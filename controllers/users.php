<?php
class users extends controller
{
	var $models = array("user");
	function index()
	{
		if (isset($_SESSION['User'])){
			$d["mess"]="No cheat here,Pal";
			$this->set($d);
			$this->render('connexion');
		}
		else{
		$this->render('index');
	}
	}
	function create()
	{
		if (isset($_SESSION['User'])){
			$d["mess"]="No cheat here";
			$this->set($d);
			$this->render('connexion');
		}
		else{
		$d['Users']=$this->user->getAllUser();
		$this->set($d);
		$this->render('create');
		}
	}
	function create2()
	{
		$d['mess']="Compte créé";
		$this->user->createUser($_POST["User"],$_POST["Mdp"]);
		$user=$this->user->getUser($_POST["User"],$_POST["Mdp"]);
		$this->Session->write('User', $user);
		$this->set($d);
		$this->render('connexion');
	}
	function connexion()
	{
		$user=$this->user->getUser($_POST["User"],$_POST["Mdp"]);
		if (!empty($user)) {
			$d['mess']="Connexion ok";
			$this->Session->write('User', $user);
		}
		else {
			$d['mess']="Problème d'identifiant ou mot de passe";
		}
		$this->set($d);
		$this->render('connexion');
	}
	function logout()
	{
		unset($_SESSION['User']);
		$this->render('index');
	}
}
?>
