<?php
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . 'config/ClassConnectDB.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();
$Class_idClass 		= $data['Class_idClass'];
$Section_Section_id  	= $data['Section_Section_id'];

$sql = "DELETE FROM map_class_section WHERE Class_idClass = $Class_idClass AND Section_Section_id = $Section_Section_id";
if($DB_CONN->query($sql) == true)
{
	echo "Deleteed Successfully.....";
}
else
	echo $DB_CONN->error();

?>