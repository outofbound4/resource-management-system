<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . '1_Organisation/table_function_php/tableFunction.php';
require_once root . '1_Organisation/classes/OrganisationEmailDataClass.php';
$session 	= new SessionManager();
$OrganisationEmailData_object_array = OrganisationEmailData::getOrganisationEmailData();
HTML_table_OrganisationEmail($OrganisationEmailData_object_array);
?>