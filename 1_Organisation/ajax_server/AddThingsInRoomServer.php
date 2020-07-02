<?php
/*******************************************************************************
* For adding Thing in Room			                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/UndistributedThingDataClass.php';
require_once root . '1_Organisation/classes/ThingsInRoomDataClass.php';


$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$roomId = $data['Rooms_idRooms'];
$idthings = $data['Things_idthings'];
$sql = "INSERT INTO r_distribution (Rooms_idRooms,Things_idthings) VALUES ('$roomId','$idthings')";
$DB_CONN->query($sql);

$UndistributedThingData_object_array = UndistributedThingData::getUndistributedThingData();
$ThingsInRoomData_object_array = ThingsInRoomData::getAllThingsInRoomData();
HTML_select($UndistributedThingData_object_array,'Things_idthings','Things_idthings');
echo ",,";
ThingInRoom_Table($ThingsInRoomData_object_array);
?>