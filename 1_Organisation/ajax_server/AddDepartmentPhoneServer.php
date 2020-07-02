<?php
/*******************************************************************************
* For adding Department Phone No.	                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/DepartmentPhoneDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$phone = $data["phone"];
	
$sql = "select * from dpt_phoneno where phone='$phone'";
$result = $DB_CONN->query($sql);
	
if(!$result->fetch_object())
{
	unset($sql);
	$sql=$DB_CONN->get_insert_sql("dpt_phoneno");
	$DB_CONN->query($sql);

	$DepartmentPhoneData_object_array = DepartmentPhoneData::getAllDepartmentPhoneData();
	HTML_table_DepartmentPhone($DepartmentPhoneData_object_array);
}
else
	echo "exist";
?>