<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/MappedDepartmentRoomDataClass.php';


$session 		= new SessionManager();
$formData 		= new Forms();
$data 			= $formData->getFormData();
$iddepartment 	= $data['Department_iddepartment'];
$idroom  		= $data['Rooms_idRooms'];

$sql = "DELETE FROM link_dep_room WHERE Department_iddepartment = $iddepartment AND Rooms_idRooms = $idroom";
if($DB_CONN->query($sql) == true)
{
	$MappedDepartmentRoomData_object_array = MappedDepartmentRoomData::getAllMappedDepartmentRoomData();
	HTML_Mapped_Table($MappedDepartmentRoomData_object_array);
}
else
	echo $DB_CONN->error();
?>