<?php
/*******************************************************************************
* For Edit Class Name			                                          	   *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();

$class_id 	= $data['class_id'];
$name 		= $data['name'];

$sql = "UPDATE class SET name = '$name' WHERE class_id = $class_id";
if($DB_CONN->query($sql) == true)
{
	echo '1';
}
else
	echo $DB_CONN->error();
?>