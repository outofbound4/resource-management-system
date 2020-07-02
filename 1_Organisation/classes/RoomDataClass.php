
<?php
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . '1_Organisation/package/Session.php';
$session 	= new SessionManager();
class RoomData
{
	var $ID;
	var $NAME;
	var $STATUS;
	var $BuildingData_object;
	
	public function __construct($row) 
	{
		$this->ID = $row->idRooms;
		$this->NAME =  $row->name;
		$this->STATUS =  $row->r_status;
		$this->BuildingData_object = BuildingData::getBuildingData($row->Building_idbuilding);
	}
	
	public static function getAllRoomData()
	{
		GLOBAL $DB_CONN;
		$sql = "select * from rooms";
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new RoomData($row);
		}	
		return $data_array;
	}

	public static function getRoomData($idrooms)
	{
		GLOBAL $DB_CONN;
		$sql = "select * from rooms where idRooms = $idrooms";
		//exit($sql);
		$result = $DB_CONN->query($sql);
		if($row = $result->fetch_object())
		{
			return new RoomData($row);
		}
		return null;
	}

	public static function getRoomByBuildingId($idbuilding)
	{
		GLOBAL $DB_CONN;
		$sql = " SELECT * from rooms where building_idbuilding = $idbuilding";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new RoomData($row);
		}
		return $data_array;
	}

	public static function getRoomCountByBuildingId($idbuilding)
	{
		GLOBAL $DB_CONN;
		$sql = "select count(idrooms) AS noOfRooms from rooms where Building_idbuilding=$idbuilding";
		$result = $DB_CONN->query($sql);
		if($row = $result->fetch_object())
		{
			return $row;
		}
		return null;
	}
}
?>