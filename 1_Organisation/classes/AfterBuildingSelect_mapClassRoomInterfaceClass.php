<?php
require_once '../../config/ClassConnectDB.php';

class RoomData
{
	var $ID;
	var $NAME;
	
	public function __construct($row) 
	{
		$this->ID = $row->idrooms;
		$this->NAME =  $row->name;
	}
	
	public static function getRoomData($idbuilding)
	{
		GLOBAL $DB_CONN;
		$sql = " SELECT rooms.idrooms,rooms.name from rooms where building_idbuilding= '$idbuilding' AND (idrooms) NOT IN (SELECT rooms_idrooms FROM map_room_class)";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new RoomData($row);
		}
		return $data_array;
	}
}
?>