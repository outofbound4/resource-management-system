<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . '1_Organisation/classes/RoomCapacityDataClass.php';

$session 	= new SessionManager();
$BuildingData_object_array = BuildingData::getAllBuildingData();
$RoomCapacityData_object_array = RoomCapacityData::getAllRoomCapacityData();
HTML_select($BuildingData_object_array,'Building_idbuilding','Building_idbuilding','afterBuildingSelect_addRoomCapacityInterface()');
echo ",,";
RoomCapacityData_Table($RoomCapacityData_object_array);

?>