<?php
/*******************************************************************************
* After department select in mapDepartmentRoomInterface.php                    *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/AfterDepartmentSelect_AddDepartmentRoom.php';


$session 		= new SessionManager();
$formData 		= new Forms();
$data 			= $formData->getFormData();
$iddepartment 	= $data['Department_iddepartment'];

$RoomDataAfterDepartmentSelect_object_array = RoomDataAfterDepartmentSelect::getRoomDataAfterDepartmentSelect($iddepartment);
HTML_select($RoomDataAfterDepartmentSelect_object_array,'Rooms_idRooms','Rooms_idRooms');
?>