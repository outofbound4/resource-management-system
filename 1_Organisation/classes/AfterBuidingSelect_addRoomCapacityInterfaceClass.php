<?php
require_once root.'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';
$session 				= new SessionManager();

class RoomDataAfterBuildingSelect
{
	var $ID;
	var $NAME;
	
	public function __construct($row) 
	{
		$this->ID = $row->idrooms;
		$this->NAME =  $row->name;
	}
	
	public static function getRoomDataAfterBuildingSelect($idbuilding)
	{
		GLOBAL $DB_CONN;
		$sql = " SELECT rooms.idrooms,rooms.name from rooms where Building_idbuilding= $idbuilding AND (idRooms) NOT IN (SELECT Rooms_idRooms FROM room_capacity)";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new RoomDataAfterBuildingSelect($row);
		}
		return $data_array;
	}
}
?>