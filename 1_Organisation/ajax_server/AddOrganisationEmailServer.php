<?php
/*******************************************************************************
* For adding Organisation Email		                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . "config/ClassConnectDB.php";
require_once root . '1_Organisation/classes/OrganisationEmailDataClass.php';


$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$email = $data["emailId"];
	
$sql = "select * from email where emailId='$email'";
$result = $DB_CONN->query($sql);
	
if(!$result->fetch_object())
{
	unset($sql);
	$sql=$DB_CONN->get_insert_sql("email");
	$DB_CONN->query($sql);
		
	$OrganisationEmailData_object_array = OrganisationEmailData::getOrganisationEmailData();
		
	HTML_table_OrganisationEmail($OrganisationEmailData_object_array);
}
else
	echo "exist";
?>