<?php
class exemples extends controller
{
	var $models = array("exemple","objet");
	var $Table="Exemple";

	function index($id){
		$d["champs"]=$this->objet->champs($this->Table);
		foreach ($d["champs"] as $unChamps) {
			if ($unChamps->COLUMN_KEY=="MUL")
			{
				$tableEt=substr($unChamps->COLUMN_NAME,2);
				$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($tableEt);
			}
		}
		$d["Exem"]=$this->objet->getOneTable($id,$this->Table);
		$this->set($d);
		$this->render('index');

	}
	function tableau(){
		$d["champs"]=$this->objet->champs($this->Table);
		foreach ($d["champs"] as $unChamps) {
			if ($unChamps->COLUMN_KEY=="MUL")
			{
				$tableEt=substr($unChamps->COLUMN_NAME,2);
				$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($tableEt);
			}
		}
		$d["Exem"]=$this->objet->getAllTable($this->Table);
		$this->set($d);
		$this->render('tableau');
	}
	function tableauformAjout(){
	$d["champs"]=$this->objet->champs($this->Table);
	$d["action"]="Ajout";
	foreach ($d["champs"] as $unChamps) {
		if ($unChamps->COLUMN_KEY=="MUL")
		{
			$tableEt=substr($unChamps->COLUMN_NAME,2);
			$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($tableEt);
		}
	}
	$this->set($d);
	$this->render('tableauform');
}
function tableauformModif($id){
	$d["champs"]=$this->objet->champs($this->Table);
	$d["action"]="Modif";
	foreach ($d["champs"] as $unChamps) {
		if ($unChamps->COLUMN_KEY=="MUL")
		{
			$tableEt=substr($unChamps->COLUMN_NAME,2);
			$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($tableEt);
		}
	}
	$d["Exem"]=$this->objet->getOneTable($id,$this->Table);
	$this->set($d);
	$this->render('tableauform');
}
function tableauformSupp($id){
	$this->objet->delObjet($id,$this->Table);
	$d["champs"]=$this->objet->champs('exemple');
	foreach ($d["champs"] as $unChamps) {
		if ($unChamps->COLUMN_KEY=="MUL")
		{
			$tableEt=substr($unChamps->COLUMN_NAME,2);
			$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($tableEt);
		}
	}
	$d["Exem"]=$this->objet->getAllTable($this->Table);
	$this->set($d);
	$this->render('tableau');
}

function tableauformSubmit($action){
	$values="";
	$fields="";
	$d["champs"]=$this->objet->champs($this->Table);
	foreach ($d["champs"] as $unChamps) {
		$Name=$unChamps->COLUMN_NAME;
		if ($action=="Modif"){
			if ($unChamps->COLUMN_KEY=="PRI" and $unChamps->EXTRA=="auto_increment"){
				$id=$_POST[$Name];
			}
			$fields=$fields.$Name."='".$_POST[$Name]."',";
		}
		else{
			if ($unChamps->COLUMN_KEY!="PRI" and $unChamps->EXTRA!="auto_increment"){
				$values=$values."'".$_POST[$Name]."',";
				$fields=$fields.$Name.",";
				}
			}
		}
	$fields=substr($fields,0,-1);
	$values=substr($values,0,-1);
	if ($action=="Modif"){
		$this->objet->modifObjet($id,$this->Table,$fields);
	}
	else{
		$this->objet->ajoutObjet($this->Table,$fields,$values);
	}
	foreach ($d["champs"] as $unChamps) {
		if ($unChamps->COLUMN_KEY=="MUL")
		{
			$tableEt=substr($unChamps->COLUMN_NAME,2);
			$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($tableEt);
		}
	}
	$d["Exem"]=$this->objet->getAllTable($this->Table);
	$this->set($d);
	$this->render('tableau');
	}
	function style(){
		$this->render('style');
	}
	function wheel(){
		$this->render('wheel');
	}
	function test(){
		$this->render('test');
	}
	function lexique($id){
		$this->exemple->RangPlus($id);
		$d["lex"]=$this->objet->getOneTable($id,"Lexique");
		$this->set($d);
		$this->render('lexique');
	}
}
?>
