<?php
/*******************************************************************************
* For Edit Room Name				                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . 'config/ClassConnectDB.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$idRooms 	= $data['idRooms'];
$name 		= $data['name'];

$sql = "UPDATE rooms SET name = '$name' WHERE idRooms = $idRooms";
if($DB_CONN->query($sql) == true)
{
	echo '1';
}
else
	echo $DB_CONN->error();
?>