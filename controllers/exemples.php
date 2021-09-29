<?php
class exemples extends controller
{
	var $models = array("exemple","objet");
	function tableau()
	{
		$d["champs"]=$this->objet->champs('exemple');
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
	$d["action"]="Ajout";
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

function tableauformSubmit(){
	$values="";
	$fields="";
	$d["champs"]=$this->objet->champs('exemple');
	foreach ($d["champs"] as $unChamps) {
		$Name=$unChamps->COLUMN_NAME;
		if ($unChamps->COLUMN_KEY!="PRI" and $unChamps->EXTRA!="auto_increment"){
			echo $_POST[$Name]."<br>";
			$values=$values."'".$_POST[$Name]."',";
			$fields=$fields.$Name.",";
		}
	}
	$fields=substr($fields,0,-1);
	$values=substr($values,0,-1);
	$this->objet->ajoutObjet("exemple",$fields,$values);
	$d["Exem"]=$this->objet->getAllTable('exemple',"1=1");
	$this->set($d);
	$this->render('tableau');
}
}
?>
