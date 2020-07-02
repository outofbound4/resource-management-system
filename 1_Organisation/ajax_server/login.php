<?php
require_once('../../config/FolderPath.php');
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';
require_once root . '1_Organisation/package/forms.php';

$session 	= new SessionManager();
$formData 	= new Forms();
$data 		= $formData->getFormData();
$password 	= $data["password"];
$userid		= $data["userid"];
$qry 		= "SELECT * FROM user WHERE userid='".$data['userid']."'";
$result		= $DB_CONN->query($qry);
$row 		= $result->fetch_object();

if(!password_verify($password, $row->password)) {
	echo "Wrong password";
	echo $DB_CONN->error();
} else {
	$session->setValue('userid', $row->userid);
	$session->setValue('password', $row->password);
	$session->setValue('username', $row->username);
	//header("Location:../home.php", TRUE, 301);
	//exit();
	echo 'TRUE';
}
//echo "from server login,php".$qry;
?>