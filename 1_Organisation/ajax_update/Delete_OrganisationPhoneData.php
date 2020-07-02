<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/OrganisationPhoneDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$phone 		= $data['phone'];

$sql = "DELETE FROM phoneno WHERE phone = '$phone'";
if($DB_CONN->query($sql) == true)
{
	$OrganisationPhoneData_object_array = OrganisationPhoneData::getOrganisationPhoneData();
	HTML_table_OrganisationPhone($OrganisationPhoneData_object_array);
}
else
	echo $DB_CONN->error();
?>