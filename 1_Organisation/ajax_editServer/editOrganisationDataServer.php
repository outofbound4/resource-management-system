<?php
/*******************************************************************************
* For Edit Organisation Name		                                           *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . 'config/ClassConnectDB.php';

$session = new SessionManager();
$formData = new Forms();
$data = $formData->getFormData();

$idorganisation 		= $data['idorganisation'];
$name 					= $data['name'];
$address 				= $data['address'];
$land 					= $data['land'];

$sql = "UPDATE organisation SET name = '$name', address = '$address', land = '$land'  WHERE idorganisation = $idorganisation";
if($DB_CONN->query($sql) == true)
{
	echo '1';
}
else
	echo $DB_CONN->error();
?>