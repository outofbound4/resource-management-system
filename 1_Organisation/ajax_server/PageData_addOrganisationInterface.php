<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/OrganisationDataClass.php';

$session = new SessionManager();
$OrganisationData_object_array = OrganisationData::getAllOrganisationData();
HTML_table($OrganisationData_object_array, 'organisationDataDelete', 'organisationDataEdit');
?>