
<?php
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';

$session 					= new SessionManager();

class BuildingData
{
	var $ID, $NAME, $STATUS;
	
	private function __construct($obj)
	{
		$this->ID	 = $obj->idbuilding; 
		$this->NAME = $obj->name;
		$this->STATUS	 = $obj->r_status;
	}

	public static function getAllBuildingData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM building";
		$result = $DB_CONN->query($sql);
		$array_BuildingData = array();	
		while($obj = $result->fetch_object())
		{
			$array_BuildingData[] = new BuildingData($obj);
		}
		return $array_BuildingData;
	}	

	public static function getBuildingData($idbuilding)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM building where idbuilding = $idbuilding";
		$result = $DB_CONN->query($sql);
		if($obj = $result->fetch_object())
		{
			return new BuildingData($obj);
		}
		return null;
	}	
}

?>