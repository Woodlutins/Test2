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
	$d["action"]="ajout";
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
function tableauformSubmit(){

	
	$d["champs"]=$this->objet->champs('exemple');
	$d["Exem"]=$this->objet->getAllTable('exemple',"1=1");
	$this->set($d);
	$this->render('tableau');
}
}
?>
