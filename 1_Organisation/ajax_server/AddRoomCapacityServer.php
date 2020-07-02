<?php
/*******************************************************************************
* For adding Room Capacity			                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/RoomCapacityDataClass.php';
require_once root . '1_Organisation/classes/AfterBuidingSelect_addRoomCapacityInterfaceClass.php';

$session 				= new SessionManager();
$formData 				= new Forms();
$data 					= $formData->getFormData();
$Rooms_idRooms 			= $data['Rooms_idRooms'];
$Building_idbuilding 	= $data['Building_idbuilding'];
$capacity 				= $data['capacity'];
$sql 					= "INSERT INTO room_capacity (Rooms_idRooms,capacity) VALUES ('$Rooms_idRooms','$capacity')";
$DB_CONN->query($sql);

$RoomData_object_array = RoomDataAfterBuildingSelect::getRoomDataAfterBuildingSelect($Building_idbuilding);
$RoomCapacityData_object_array = RoomCapacityData::getAllRoomCapacityData();
HTML_select($RoomData_object_array,'Rooms_idRooms','Rooms_idRooms');
echo ",,";
RoomCapacityData_Table($RoomCapacityData_object_array);
?>