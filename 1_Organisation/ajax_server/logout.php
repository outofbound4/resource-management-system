<?php
require_once('../../config/FolderPath.php');
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/Session.php';
$session = new SessionManager();
$session->destroySession();
echo "logout sucessfully........!!";
?>