<?php
class exemples extends controller
{
	var $models = array("exemple","objet");
	function tableau()
	{
		$d["champs"]=$this->objet->champs('exemple');
		foreach ($d["champs"] as $unChamps) {
			if ($unChamps->COLUMN_KEY=="MUL")
			{
				$table=substr($unChamps->COLUMN_NAME,2);
				$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($table,"1=1");
			}
		}
		$d["Exem"]=$this->objet->getAllTable('exemple',"1=1");
		$this->set($d);
		$this->render('tableau');
	}
	function tableauformAjout(){
	$d["champs"]=$this->objet->champs('exemple');
	$d["action"]="Ajout";
	foreach ($d["champs"] as $unChamps) {
		if ($unChamps->COLUMN_KEY=="MUL")
		{
			$table=substr($unChamps->COLUMN_NAME,2);
			$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($table,"1=1");
		}
	}
	$this->set($d);
	$this->render('tableauform');
}
function tableauformModif($id){
	$d["champs"]=$this->objet->champs('exemple');
	$d["action"]="Modif";
	foreach ($d["champs"] as $unChamps) {
		if ($unChamps->COLUMN_KEY=="MUL")
		{
			$table=substr($unChamps->COLUMN_NAME,2);
			$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($table,"1=1");
		}
	}
	$d["Exem"]=$this->objet->getOneTable($id,"exemple");
	$this->set($d);
	$this->render('tableauform');
}
function tableauformSupp($id){
	$this->objet->delObjet($id,"Exemple");
	$d["champs"]=$this->objet->champs('exemple');
	foreach ($d["champs"] as $unChamps) {
		if ($unChamps->COLUMN_KEY=="MUL")
		{
			$table=substr($unChamps->COLUMN_NAME,2);
			$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($table,"1=1");
		}
	}
	$d["Exem"]=$this->objet->getAllTable('exemple',"1=1");
	$this->set($d);
	$this->render('tableau');
}

function tableauformSubmit($action){
	$values="";
	$fields="";
	$d["champs"]=$this->objet->champs('exemple');
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
		$this->objet->modifObjet($id,"exemple",$fields);
	}
	else{
		$this->objet->ajoutObjet("exemple",$fields,$values);
	}
	foreach ($d["champs"] as $unChamps) {
		if ($unChamps->COLUMN_KEY=="MUL")
		{
			$table=substr($unChamps->COLUMN_NAME,2);
			$d[$unChamps->COLUMN_NAME]=$this->objet->getAllTable($table,"1=1");
		}
	}
	$d["Exem"]=$this->objet->getAllTable('exemple',"1=1");
	$this->set($d);
	$this->render('tableau');
	}
}
?>
