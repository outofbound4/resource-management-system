<?php
require_once root . '1_Organisation/classes/ThingDataClass.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();

class ThingsInBuildingData
{
	var $BuildingData_object;
	var $ThingData_object;
	
	public function __construct($row) 
	{
		$this->BuildingData_object  =  BuildingData::getBuildingData($row->Building_idbuilding);
		$this->ThingData_object		= ThingData::getThingData($row->Things_idthings);
	}
	
	public static function getAllThingsInBuildingData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM b_distribution";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new ThingsInBuildingData($row);
		}	
		return $data_array;
	}

	public static function ThingsInBuildingDataCount()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT COUNT(Things_idthings) AS noOfThings FROM b_distribution";
		$result = $DB_CONN->query($sql);
		return $result->fetch_object();
	}
}

?>