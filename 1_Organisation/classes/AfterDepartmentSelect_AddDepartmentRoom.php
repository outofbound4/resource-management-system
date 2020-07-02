<?php
require_once '../../config/ClassConnectDB.php';

class RoomDataAfterDepartmentSelect
{
	var $ID;
	var $NAME;
	
	public function __construct($row) 
	{
		$this->ID = $row->idrooms;
		$this->NAME =  $row->name;
	}
	
	public static function getRoomDataAfterDepartmentSelect($idDept)
	{
		GLOBAL $DB_CONN;
		$sql = " SELECT idrooms,name from rooms where building_idbuilding = (select building_idbuilding from department where iddepartment='$idDept') AND (idrooms) NOT IN (SELECT rooms_idrooms FROM link_dep_room)";
			
		$result = $DB_CONN->query($sql);
		$data_array = array();
		while($row = $result->fetch_object())
		{
			$data_array[] = new RoomDataAfterDepartmentSelect($row);
		}
		return $data_array;
	}
}
?>