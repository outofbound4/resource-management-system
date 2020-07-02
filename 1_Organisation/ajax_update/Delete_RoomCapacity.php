<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . '1_Organisation/classes/RoomCapacityDataClass.php';

$session 		= new SessionManager();
$formData 		= new Forms();
$data 			= $formData->getFormData();
$Rooms_idRooms 	= $data['Rooms_idRooms'];
$sql 			= "DELETE FROM room_capacity WHERE Rooms_idRooms = $Rooms_idRooms";
if($DB_CONN->query($sql) == true)
{
	$BuildingData_object_array = BuildingData::getAllBuildingData();
	$RoomCapacityData_object_array = RoomCapacityData::getAllRoomCapacityData();
	HTML_select($BuildingData_object_array,'Building_idbuilding','Building_idbuilding','afterBuildingSelect_addRoomCapacityInterface()');
	echo ",,";
	RoomCapacityData_Table($RoomCapacityData_object_array);
}
else
	echo $DB_CONN->error();
?>