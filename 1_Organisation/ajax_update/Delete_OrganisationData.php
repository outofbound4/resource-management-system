<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/OrganisationDataClass.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$idOrganisation 		= $data['idorganisation'];
$sql = "DELETE FROM organisation WHERE idorganisation = $idOrganisation";
if($DB_CONN->query($sql) == true)
{
	$OrganisationData_object_array = OrganisationData::getAllOrganisationData();
	HTML_table($OrganisationData_object_array,'organisationDataEdit','organisationDataDelete');
}
else
	echo $DB_CONN->error();
?>