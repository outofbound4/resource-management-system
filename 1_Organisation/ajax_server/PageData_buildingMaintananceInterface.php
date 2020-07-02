<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/BuildingMaintananceDataClass.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';

new SessionManager();

$BuildingData_object_array = BuildingData::getAllBuildingData();
$BuildingMaintananceData_object_array = BuildingMaintananceData::getAllBuildingMaintananceData();
HTML_select($BuildingData_object_array,'Building_idbuilding','Building_idbuilding');
echo ",";
HTML_table_BuildingMaintanance($BuildingMaintananceData_object_array);

?>