<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/DepartmentPhoneDataClass.php';


$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$phone 		= $data['phone'];

$sql = "DELETE FROM dpt_phoneno WHERE phone = '$phone'";
if($DB_CONN->query($sql) == true)
{
	$DepartmentPhoneData_object_array = DepartmentPhoneData::getAllDepartmentPhoneData();
	HTML_table_DepartmentPhone($DepartmentPhoneData_object_array);
}
else
	echo $DB_CONN->error();

?>