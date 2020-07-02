<?php
/*********************************************
* For adding Organisation Name				 *
*                                            *
**********************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/OrganisationDataClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$name = $data["name"];
$address = $data["address"];
$land = $data["land"];
$sessionmanager = new SessionManager();
$sql = "select * from organisation where name='$name' and address='$address'";
$result = $DB_CONN->query($sql);
	
if(!$result->fetch_object())
{
	unset($sql);
	$sql=$DB_CONN->get_insert_sql("organisation");
	exit($sql);
	$DB_CONN->query($sql);
	
	$OrganisationData_object_array = OrganisationData::getAllOrganisationData();
	HTML_table($OrganisationData_object_array,'organisationDataDelete', 'organisationDataEdit');
}
else
	echo "exist";

?>