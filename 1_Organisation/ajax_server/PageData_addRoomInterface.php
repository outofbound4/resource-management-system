<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/RoomDataClass.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';

$session 					= new SessionManager();
$RoomData_object_array 		= RoomData::getAllRoomData();
$BuildingData_object_array 	= BuildingData::getAllBuildingData();
HTML_select($BuildingData_object_array,'Building_idbuilding','Building_idbuilding');
echo ',';
HTML_table_AddRoomData($RoomData_object_array);
?>