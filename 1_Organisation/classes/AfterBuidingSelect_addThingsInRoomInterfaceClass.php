<?php
$root = $_SERVER['DOCUMENT_ROOT'] . '/school_soft/';
require_once $root.'config/ClassConnectDB.php';

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
		$sql = " SELECT rooms.idrooms,rooms.name from rooms where building_idbuilding= '$idbuilding'";
			
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