<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';
require_once root . '1_Organisation/classes/MappedRoomClassClass.php';

$session = new SessionManager();
$BuildingData_object_array = BuildingData::getAllBuildingData();
$MappedRoomClassData_object_array = MappedRoomClassData::getAllMappedRoomClassData();

HTML_select($BuildingData_object_array,'building_idbuilding','building_idbuilding', 'AfterBuildingSelect_mapClassRoomInterfaceClass()');
echo ",,";
HTML_MappedClassRoomInterface_Table($MappedRoomClassData_object_array);
?>