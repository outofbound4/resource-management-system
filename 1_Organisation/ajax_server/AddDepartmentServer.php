<?php
/*******************************************************************************
* For adding Department Name		                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/DepartmentDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$name = $data["name"];
	
$sql = "select * from department where name='$name'";
$result = $DB_CONN->query($sql);
	
if(!$result->fetch_object())
{
	unset($sql);
	$sql=$DB_CONN->get_insert_sql("department");
	$DB_CONN->query($sql);
		
	$DepartmentData_object_array = DepartmentData::getAllDepartmentData();
	HTML_table_addDepartment($DepartmentData_object_array);
}
else
	echo "exist";	
?>