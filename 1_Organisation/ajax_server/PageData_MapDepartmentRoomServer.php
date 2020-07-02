<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/DepartmentDataClass.php';
require_once root . '1_Organisation/classes/MappedDepartmentRoomDataClass.php';

$session 	= new SessionManager();

$DepartmentData_object_array = DepartmentData::getAllDepartmentData();
$MappedDepartmentRoomData_object_array = MappedDepartmentRoomData::getAllMappedDepartmentRoomData();
HTML_select($DepartmentData_object_array,'Department_iddepartment','Department_iddepartment','afterDepartmentSelect_mapDepartmentRoomInterface()');
echo ",,";
HTML_Mapped_Table($MappedDepartmentRoomData_object_array,'deleteMappedDepartmentRoomData');
?>