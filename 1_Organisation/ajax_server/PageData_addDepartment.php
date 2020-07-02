<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/DepartmentDataClass.php';
require_once root . '1_Organisation/classes/BuildingDataClass.php';

$session 	= new SessionManager();
$BuildingData_object_array = BuildingData::getAllBuildingData();
$DepartmentData_object_array = DepartmentData::getAllDepartmentData();

HTML_select($BuildingData_object_array,'Building_idbuilding','Building_idbuilding');
echo ',';
HTML_table_addDepartment($DepartmentData_object_array);

?>