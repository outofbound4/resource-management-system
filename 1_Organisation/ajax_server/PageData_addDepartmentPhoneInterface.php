<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/DepartmentDataClass.php';
require_once root . '1_Organisation/classes/DepartmentPhoneDataClass.php';

$session 	= new SessionManager();
$DepartmentPhoneData_object_array = DepartmentPhoneData::getAllDepartmentPhoneData();
$DepartmentData_object_array = DepartmentData::getAllDepartmentData();
HTML_select($DepartmentData_object_array,'Department_iddepartment','Department_iddepartment');
echo ",";
HTML_table_DepartmentPhone($DepartmentPhoneData_object_array);
?>