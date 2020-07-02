
<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/classes/RoomDataClass.php';
$session 	= new SessionManager();
class RoomCapacityData
{
	var $CAPACITY;
	var $ALLOTMENT;
	var $RoomData_object;

	private function __construct($obj)
	{
		$this->CAPACITY	 = $obj->capacity; 
		$this->ALLOTMENT = $obj->allotment;
		$this->RoomData_object	 = RoomData::getRoomData($obj->Rooms_idRooms);
	}
	
	public static function getAllRoomCapacityData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM room_capacity";	
		$result = $DB_CONN->query($sql);
		$data_array = array();	
		while($obj = $result->fetch_object())
		{
			$data_array[] = new RoomCapacityData($obj);
		}
		return $data_array;
	}

	public static function getRoomCapacityData($Rooms_idRooms)
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM room_capacity where Rooms_idRooms=$Rooms_idRooms";	
		$result = $DB_CONN->query($sql);
		$data_array = array();	
		if($obj = $result->fetch_object())
		{
			return new RoomCapacityData($obj);
		}
		return null;
	}
}

?>