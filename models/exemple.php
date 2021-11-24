<?php
class exemple extends Model {
	var $Table="Exemple";
	function RangPlus($id)
	{
		return $this->transform(array(
		'fields'=>"rang = rang + 1",
		'condition'=>'idLexique='.$id,
		'table'=>"Lexique")
		);
	}


}
?>
