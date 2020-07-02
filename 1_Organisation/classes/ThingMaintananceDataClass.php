<?php
require_once root . '1_Organisation/classes/ThingDataClass.php';
require_once root . '1_Organisation/package/Session.php';
new SessionManager();

class ThingMaintananceData
{
	var $ID;
	var $NAME;
	var $COST;
	var $ThingData_object;
	
	private function __construct($obj)
	{
		$this->ID	 = $obj->idrepair;
		$this->NAME	 = $obj->name;
		$this->COST = $obj->cost;
		$this->ThingData_object = ThingData::getThingData($obj->Things_idthings);
	}

	public static function getAllThingMaintananceData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM repair";
		$result = $DB_CONN->query($sql);
		$data_array = array();	
		while($obj = $result->fetch_object())
		{
			$data_array[] = new ThingMaintananceData($obj);
		}
		return $data_array;
	}	
}

?>