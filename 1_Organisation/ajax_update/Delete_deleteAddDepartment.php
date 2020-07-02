<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/DepartmentDataClass.php';

$session 		= new SessionManager();
$formData 		= new Forms();
$data 			= $formData->getFormData();
$iddepartment 	= $data['iddepartment'];

$sql = "DELETE FROM department WHERE iddepartment = $iddepartment";
if($DB_CONN->query($sql) == true)
{
	$DepartmentData_object_array = DepartmentData::getAllDepartmentData();
	HTML_table_addDepartment($DepartmentData_object_array);
}
else
	echo $DB_CONN->error();
?>