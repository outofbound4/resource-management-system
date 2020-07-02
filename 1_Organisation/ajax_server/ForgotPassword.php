<?php
/*******************************************************************************
* for storing the new user's data into database	                               *
*                                                                              *
*******************************************************************************/
require_once('../../config/FolderPath.php');
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/forms.php';
require_once root . 'PHPMailer/PHPMailer.php';
require_once root . 'PHPMailer/SMTP.php';
require_once root . 'PHPMailer/Exception.php';

$formData 		= new Forms();
$data 			= $formData->getFormData();
$userid 		= $data["userid"];
$sql			= "select * from user where userid = '$userid'";
$result 		= $DB_CONN->query($sql);

$token 			= 'dfstrytunbi0123456789gfmncbnzxcolkpioqazxcgytiuoikjwexxz';
$token			= str_shuffle($token);
$token			= substr($token, 0, 15);

if(!$result->fetch_object()) {
	echo "Enter valid Registered Email id.";
} else {
	$query			= "insert into token (userid, token, tokenExpire) values
						('$userid', '$token', DATE_ADD(NOW(), INTERVAL 10 MINUTE))";
						
	$result 		= $DB_CONN->query($query);
	$mail = new PHPMailer\PHPMailer\PHPMailer();
	// $mail->SMTPDebug = 4;                               // Enable verbose debug output
	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host 		= HOST;  // Specify main and backup SMTP servers
	$mail->SMTPAuth 	= true;                               // Enable SMTP authentication
	$mail->Username 	= EMAIL;                 // SMTP username
	$mail->Password 	= PASSWORD;                           // SMTP password
	$mail->SMTPSecure 	= 'tls';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port 		= PORT;                                 // TCP port to connect to
	$mail->setFrom(EMAIL, SENDER_NAME);
	$mail->addAddress($userid);     // Add a recipient
	$mail->addReplyTo(EMAIL);
	/*
	// print_r($_FILES['file']); exit;
	for ($i=0; $i < count($_FILES['file']['tmp_name']) ; $i++) { 
		$mail->addAttachment($_FILES['file']['tmp_name'][$i], $_FILES['file']['name'][$i]);    // Optional name
	}
	*/ 
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = "Forgot password";;
	$mail->Body    = '<div style="border:2px solid red;">This is the HTML message body <b>in bold!</b></div>';
	//$mail->AltBody = $_POST['message'];
	if(!$mail->send()) {
	    echo 'Message could not be sent.';
	    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
	    echo 'Mail has been sent';
	}
}
?>
