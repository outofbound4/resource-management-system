<?php
require_once root.'config/ClassConnectDB.php';

class ClassData
{
	var $ID;
	var $NAME;
	
	public function __construct($row) 
	{
		$this->ID = $row->ID;
		$this->NAME =  $row->NAME;
	}
	
	public static function getAllClassData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT class_id AS ID, name AS NAME FROM class";
			
		$result = $DB_CONN->query($sql);
		$ClassData_array = array();
		while($row = $result->fetch_object())
		{
			$ClassData_array[] = new ClassData($row);
		}	
		return $ClassData_array;
	}

	public static function getClassData($idClass)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT class_id AS ID, name AS NAME FROM class where class_id= $idClass";

		$result = $DB_CONN->query($sql);
		$ClassData_array = array();
		if($row = $result->fetch_object())
		{
			return new ClassData($row);
		}	
		return null;
	}
}
?>