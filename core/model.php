<?php
class Model
{
	public $id;
	public $Table;
	public $conf='default';
	public $db;
	public $dbName="test";

	function __construct()
	{
		//$conf=conf::databases[$this];
		try
		{
			$user='root';
			$pass='';
			$this->db=new PDO('mysql:host=localhost;dbname='.$this->dbName, $user, $pass);
		}
		catch (PDOException $e)
		{
			print "Erreur !: " . $e->getMessage() . "<br/>";
			die();
		}
		//require "models/model.php";
	}

	function read($fields=null)
	{
		if ($fields==null)
		{
			$fields="*";
		}
		$sql = "select ".$fields." from ".$this->Table." where id=:id";
		//echo $sql;
		$stmt=$this->db->prepare($sql);
		if ($stmt->execute(array(":id"=>$this->id)))
		{
			$data=$stmt->fetch(PDO::FETCH_OBJ);
			/*echo "<PRE>";
			print_r($data);
			echo "</PRE>";*/
			foreach($data as $key=>$value)
			{
				$this->$key=$value;
			}
			//return $data;
		}
		else
		{
			echo "Erreur SQL";
		}
	}
	function find($data)
	{
		$table=$this->Table;
		$fields="*";
		$condition="1=1";
		//$order="Id";
		$limit=" ";
		$inner=" ";
		$group=" ";
		if (isset($data["table"]))
		{
			$table=$data["table"];
		}
		if (isset($data["fields"]))
		{
			$fields=$data["fields"];
		}
		if (isset($data["inner"]))
		{
			$inner=$data["inner"];
		}
		if (isset($data["condition"]))
		{
			$condition=$data["condition"];
		}
		/*if (isset($data["order"]))
		{
			$order=$data["order"];
		}*/
		if (isset($data["limit"]))
		{
			$limit=$data["limit"];
		}
		if (isset($data["group"]))
		{
			$group=$data["group"];
		}
		$sql="SELECT ".$fields." FROM ".$table." ".$inner." where ".$condition." ".$group." ".$limit;
		//echo $sql;
		$stmt=$this->db->prepare($sql);
		if ($stmt->execute())
		{
			//echo "<br>Réussite";
			$data=$stmt->fetchall(PDO::FETCH_OBJ);
			return $data;
		}
		else
		{
			echo "<br>Erreur SQL";
			echo "<br>".$sql;
		}
	}
	function findFirst($data)
	{
		return current($this->find($data));
	}
	function tableName($data)
	{
		$table=$this->Table;
		if (isset($data["table"]))
		{
			$table=$data["table"];
		}

		$sql="select DISTINCT COLUMN_NAME ,DATA_TYPE, IS_NULLABLE,COLUMN_KEY, EXTRA, ORDINAL_POSITION from INFORMATION_SCHEMA.COLUMNS where table_name ='".$table."' and table_schema='".$this->dbName."'";
		//echo $sql;
		$stmt=$this->db->prepare($sql);
		if ($stmt->execute())
		{
			//echo "<br>Réussite";
			$data=$stmt->fetchall(PDO::FETCH_OBJ);
			return $data;
		}
		else
		{
			echo "<br>Erreur SQL";
		}
	}

	function create($data)
	{
		$fields="*";
		$values="*";
		$table=$this->Table;
		if (isset($data["table"]))
		{
			$table=$data["table"];
		}
		if (isset($data["fields"]))
		{
			$fields=$data['fields'];
		}
		if (isset($data["values"]))
		{
			$values=$data['values'];
		}
		$sql="insert into ".$table."(".$fields.") Values(".$values.")";
		//echo $sql;
		$stmt=$this->db->prepare($sql);
		if ($stmt->execute(array(":Value"=>$fields)))
		{
			return true;
			//echo "<br>Réussite";
		}
		else
		{
			return false;
			echo "<br>Erreur SQL";
		}
	}
	function transform($data)
	{
		$condition="1=1";
		$fields="*";
		$table=$this->Table;
		if (isset($data["table"]))
		{
			$table=$data["table"];
		}
		if (isset($data["condition"]))
		{
			$condition=$data["condition"];
		}
		if (isset($data["fields"]))
		{
			$fields=$data['fields'];
		}
		$sql="Update ".$table." Set ".$fields." Where ".$condition;
		//echo $sql;
		$stmt=$this->db->prepare($sql);
		if ($stmt->execute())
		{
			//echo "<br>Réussite";
			return true;
		}
		else
		{
			echo "<br>Erreur SQL";
			return false;
		}
	}
	function del($data)
	{
		$condition="1=1";
		$table=$this->Table;
		if (isset($data["table"]))
		{
			$table=$data["table"];
		}
		if (isset($data["condition"]))
		{
			$condition=$data["condition"];
		}
		$sql="Delete from ".$table." where ".$condition;
		//echo $sql;
		$stmt=$this->db->prepare($sql);
		if ($stmt->execute())
		{
			//echo "<br>Réussite";
			return true;
		}
		else
		{
			echo "<br>Erreur SQL";
			return false;
		}
	}
}
?>
