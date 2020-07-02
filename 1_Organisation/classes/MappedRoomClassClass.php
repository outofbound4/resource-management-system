<?php
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/classes/MappedClassSectionDataClass.php';
require_once root . '1_Organisation/classes/RoomDataClass.php';
require_once root . '1_Organisation/package/Session.php';

$session = new SessionManager();
class MappedRoomClassData
{
	var $MappedClassSectionData_object;
	var $RoomData_object;
	
	public function __construct($row) 
	{
		$this->MappedClassSectionData_object = MappedClassSectionData::getMappedClassSectionData($row->idclass_sec);
		$this->RoomData_object = RoomData::getRoomData($row->Rooms_idRooms);
	}
	
	public static function getAllMappedRoomClassData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM map_room_class group by idclass_sec, Rooms_idRooms";

		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new MappedRoomClassData($row);
		}	
		return $data_array;
	}
}

?>