<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/MappedRoomClassClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$idclass_sec 		= $data['idclass_sec'];
$Rooms_idRooms 		= $data['Rooms_idRooms'];
$sql = "DELETE FROM map_room_class WHERE idclass_sec = $idclass_sec AND idclass_sec = $idclass_sec";
if($DB_CONN->query($sql) == true)
{
	$MappedRoomClassData_object_array = MappedRoomClassData::getAllMappedRoomClassData();
	HTML_MappedClassRoomInterface_Table($MappedRoomClassData_object_array);
}
else
	echo $DB_CONN->error();
?>