<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/OrganisationPhoneDataClass.php';
$session 	= new SessionManager();
$OrganisationPhoneData_object_array = OrganisationPhoneData::getOrganisationPhoneData();
HTML_table_OrganisationPhone($OrganisationPhoneData_object_array);
?>