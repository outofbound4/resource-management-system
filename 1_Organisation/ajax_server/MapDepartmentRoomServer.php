<?php
/*******************************************************************************
* Map Department Room 				                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/AfterDepartmentSelect_AddDepartmentRoom.php';
require_once root . '1_Organisation/classes/MappedDepartmentRoomDataClass.php';


$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$iddepartment = $data['Department_iddepartment'];
$sql=$DB_CONN->get_insert_sql("link_dep_room");
$DB_CONN->query($sql);
	
$MappedDepartmentRoomData_object_array = MappedDepartmentRoomData::getAllMappedDepartmentRoomData();
$RoomDataAfterDepartmentSelect_object_array = RoomDataAfterDepartmentSelect::getRoomDataAfterDepartmentSelect($iddepartment);
HTML_select($RoomDataAfterDepartmentSelect_object_array,'Rooms_idRooms','Rooms_idRooms');
echo ",,";
HTML_Mapped_Table($MappedDepartmentRoomData_object_array,'deleteMappedDepartmentRoomData');
?>