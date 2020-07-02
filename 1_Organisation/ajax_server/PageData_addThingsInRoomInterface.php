<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . '1_Organisation/classes/UndistributedThingDataClass.php';
require_once root . '1_Organisation/classes/ThingsInRoomDataClass.php';

$session 	= new SessionManager();
$BuildingData_object_array = BuildingData::getAllBuildingData();
$UndistributedThingData_object_array = UndistributedThingData::getUndistributedThingData();
$ThingsInRoomData_object_array = ThingsInRoomData::getAllThingsInRoomData();
HTML_select($BuildingData_object_array,'Building_idbuilding','Building_idbuilding','afterBuildingSelect_addThingsInRoomInterface()');
echo ",,";
HTML_select($UndistributedThingData_object_array,'Things_idthings','Things_idthings');
echo ",,";

ThingInRoom_Table($ThingsInRoomData_object_array);

?>