<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/ThingsInRoomDataClass.php';
require_once root . '1_Organisation/classes/UndistributedThingDataClass.php';


$session 			= new SessionManager();
$formData 			= new Forms();
$data 				= $formData->getFormData();
$Things_idthings 	= $data['Things_idthings'];
$Rooms_idRooms 		= $data['Rooms_idRooms'];

$sql = "DELETE FROM r_distribution WHERE Things_idthings = $Things_idthings AND Rooms_idRooms = $Rooms_idRooms";
if($DB_CONN->query($sql) == true)
{
	$UndistributedThingData_object_array = UndistributedThingData::getUndistributedThingData();
	$ThingsInRoomData_object_array = ThingsInRoomData::getAllThingsInRoomData();
	HTML_select($UndistributedThingData_object_array,'Things_idthings','Things_idthings');
	echo ",,";
	ThingInRoom_Table($ThingsInRoomData_object_array);
}
else
	echo $DB_CONN->error();
?>