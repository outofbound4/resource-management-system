<?php
require_once root . '1_Organisation/classes/DepartmentDataClass.php';
require_once root . '1_Organisation/classes/RoomDataClass.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();

class MappedDepartmentRoomData
{
	var $DepartmentData_object;
	var $RoomData_object;
	
	public function __construct($row) 
	{
		$this->DepartmentData_object = DepartmentData::getDepartmentData($row->Department_iddepartment);
		$this->RoomData_object = RoomData::getRoomData($row->Rooms_idRooms);

	}
	
	public static function getAllMappedDepartmentRoomData()
	{
		GLOBAL $DB_CONN;
		$sql = "SELECT * FROM link_dep_room";

		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new MappedDepartmentRoomData($row);
		}	
		return $data_array;
	}
}

?>