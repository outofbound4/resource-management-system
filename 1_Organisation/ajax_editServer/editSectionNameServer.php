<?php
/*******************************************************************************
* For Edit Section Name				                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . 'config/ClassConnectDB.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();

$Section_id = $data['Section_id'];
$name 		= $data['name'];

$sql = "UPDATE section SET name = '$name' WHERE Section_id = $Section_id";
if($DB_CONN->query($sql) == true)
{
	echo '1';
}
else
	echo $DB_CONN->error();
?>