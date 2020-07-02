<?php
/*************************************
* For Edit Department Name			 *
*                                    *
**************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . 'config/ClassConnectDB.php';


$session 		= new SessionManager();
$formData 		= new Forms();
$data 			= $formData->getFormData();
$iddepartment 	= $data['iddepartment'];
$name 			= $data['name'];

$sql = "UPDATE department SET name = '$name' WHERE iddepartment = $iddepartment";
if($DB_CONN->query($sql) == true)
{
	echo '1';
}
else
	echo $DB_CONN->error();
?>