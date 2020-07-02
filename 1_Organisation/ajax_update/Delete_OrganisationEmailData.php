<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/OrganisationEmailDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$email = $data['emailId'];

$sql = "DELETE FROM email WHERE emailid = '$email'";

if($DB_CONN->query($sql) == true)
{
	$OrganisationEmailData_object_array = OrganisationEmailData::getOrganisationEmailData();
	HTML_table_OrganisationEmail($OrganisationEmailData_object_array);
}
else
	echo $DB_CONN->error();
?>