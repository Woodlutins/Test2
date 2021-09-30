<?php
class objet extends Model
{
	var $Table="Objet";
	function getAll(){
		return $this->find(
		array
			(
				'condition'=>'1=1',
			)
		);
	}
	function getAllTable($table,$condition="1=1"){
		return $this->find(
		array
			(
				'condition'=>$condition,
				'table'=>$table,
			)
		);
	}
	function getOneTable($id,$table){
		$idCo="Id".$table;
		return $this->findfirst(
		array
			(
				'condition'=>$idCo.'='.$id,
				'table'=>$table,
			)
		);
	}
	function getCount($id,$table,$condition="1=1"){
		return $this->find(array(
		'table'=>$table,
		'fields'=>'count(*) as NbEl',
		'condition'=>$condition,)
		);
	}
	function view($id,$table){
		$idCo="Id".$table;
		return $this->findFirst(array(
		'condition'=>$idCo.'='.$id,
		'table'=>$table)
		);
	}
	function champs($table){
		return $this->tableName(array(
		'table'=>$table)
		);
	}
	function getLibCE($id,$table){
		$idCo="Id".$table;
		return $this->findFirst(array(
		'condition'=>$idCo.'='.$id,
		'table'=>$table,
		'fields'=>'Libelle')
		);
	}
	function getLibsCE($table){
		return $this->find(array(
		'table'=>$table)
		);
	}
	function delObjet($id,$table){
		$idCo="Id".$table;
		return $this->del(array(
		'condition'=>$idCo.'='.$id,
		'table'=>$table)
		);
	}
	function modifObjet($id,$table,$fields){
		$idCo="Id".$table;
		return $this->transform(array(
		'fields'=>$fields,
		'condition'=>$idCo.'='.$id,
		'table'=>$table)
		);
	}
	function ajoutObjet($table,$fields,$values){
		return $this->create(array(
		'fields'=>$fields,
		'values'=>$values,
		'table'=>$table)
		);
	}
}
?>
