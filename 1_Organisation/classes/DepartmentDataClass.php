
<?php
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();

class DepartmentData
{
	var $ID;
	var $NAME;
	var $BUILDING;

	private function __construct($obj)
	{
		$this->ID	 = $obj->iddepartment;
		$this->NAME = $obj->name;
		$this->BUILDING = BuildingData::getBuildingData($obj->Building_idbuilding);
	}
	
	public static function getAllDepartmentData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM department";
		$result = $DB_CONN->query($sql);
		$object_array = array();	
		while($obj = $result->fetch_object())
		{
			$object_array[] = new DepartmentData($obj);
		}
		return $object_array;
	}	
	
	public static function getDepartmentData($iddepartment)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM department where iddepartment=$iddepartment";
		//exit($sql);
		
		$result = $DB_CONN->query($sql);
		$object_array = array();	
		if($obj = $result->fetch_object())
		{
			return new DepartmentData($obj);
		}
		return null;
	}
}

?>