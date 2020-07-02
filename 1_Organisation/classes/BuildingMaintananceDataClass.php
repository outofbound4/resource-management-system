
<?php
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . '1_Organisation/package/Session.php';
new SessionManager();

class BuildingMaintananceData
{
	var $ID;
	var $NAME;
	var $COST;
	var $BuildingData_object;
	
	private function __construct($obj)
	{
		$this->ID	 = $obj->idmaintanance;
		$this->NAME	 = $obj->name;
		$this->COST = $obj->cost;
		$this->BuildingData_object = BuildingData::getBuildingData($obj->Building_idbuilding);
	}

	public static function getAllBuildingMaintananceData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * from maintanance";
		//exit($sql);
		
		$result = $DB_CONN->query($sql);
		$array_building_maintanance = array();
		while($obj = $result->fetch_object())
		{
			$array_building_maintanance[] = new BuildingMaintananceData($obj);
		}
		return $array_building_maintanance;
	}	
}

?>