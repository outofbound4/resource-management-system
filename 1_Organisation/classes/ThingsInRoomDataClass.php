<?php
require_once root . '1_Organisation/classes/RoomDataClass.php';
require_once root . '1_Organisation/classes/ThingDataClass.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();

class ThingsInRoomData
{
	var $RoomData_object;
	var $ThingData_object;
	
	public function __construct($row) 
	{
		$this->RoomData_object =  RoomData::getRoomData($row->Rooms_idRooms);
		$this->ThingData_object = ThingData::getThingData($row->Things_idthings);
	}
	
	public static function getAllThingsInRoomData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM r_distribution";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new ThingsInRoomData($row);
		}	
		return $data_array;
	}

	public static function ThingsInRoomDataCount()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT COUNT(Things_idthings) AS noOfThings FROM r_distribution";
		$result = $DB_CONN->query($sql);
		return $result->fetch_object();
	}
}

?>