<?php
/*******************************************************************************
* For adding oranisation Phone no.	                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root .'1_Organisation/classes/OrganisationPhoneDataClass.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$phone 		= $data["phone"];
	
$sql = "select * from phoneno where phone='$phone'";
$result = $DB_CONN->query($sql);
	
if(!$result->fetch_object())
{
	unset($sql);
	$sql=$DB_CONN->get_insert_sql("phoneno");
	$DB_CONN->query($sql);
		
	$OrganisationPhoneData_object_array = OrganisationPhoneData::getOrganisationPhoneData();
		
	HTML_table_OrganisationPhone($OrganisationPhoneData_object_array);
}
else
	echo "exist";
?>