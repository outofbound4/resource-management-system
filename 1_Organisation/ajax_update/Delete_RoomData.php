<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/RoomDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$idRooms 	= $data['idRooms'];
$sql 		= "DELETE FROM rooms WHERE idRooms = $idRooms";
if($DB_CONN->query($sql) == true)
{
	$RoomData_object_array = RoomData::getAllRoomData();
	HTML_table_AddRoomData($RoomData_object_array, 'deleteRoomData', 'editRoomData');
}
else
	echo $DB_CONN->error();
?>