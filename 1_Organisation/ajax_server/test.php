<?php
/*******************************************************************************
* for new storing the user data into database	                               *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/forms.php';

$formData 	= new Forms();
$data 		= $formData->getFormData();
$userid 	= $data["userid"];
$token 		= $data["token"];
$password 	= $data["password"];
echo "hello";
// $hashPassword =  password_hash($password, PASSWORD_DEFAULT);
echo "hello from NewPassword server";
/*
$sql			= "insert into user (username, userid, mobile, password, status) values('$username', '$userid', '$mobile', '$hashPassword', 1)";
$res 			= $DB_CONN->query($sql);
if(!$res)
	echo "unsuccessful query form ajax_server/CreateUser.php";
else
	echo "successful ajax_server/CreateUser.php";
	*/
?>