<?php
require_once('../config/FolderPath.php');
require_once root.'1_Organisation/package/Session.php';

$session = new SessionManager();
if(!$session->checkVariable('userid'))
{
    echo "Unauthorised used.....Login first..!!11111111";
    exit();
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Resource Management System</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!--data Table-->
    <link rel="stylesheet" href="../assets/datatable/DataTables-1.10.16/css/dataTables.bootstrap.min.css">
	<!--Ajax loader -->
	<link href="../assets/css/ajax.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <!--css for page-->
    <link href="css/myCustomPage.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   
    <script type="text/javascript">
       function sessionDestroy()
       {
            var ajax_obj = new Ajax();
            ajax_obj.processPOST("ajax_server/logout.php", POST_AJAX_logout);
       }

       function POST_AJAX_logout(response_text)
       {
            alert(response_text);
            window.location = '../index.php';
       }
    </script>
</head>
<body>
	<div id="ajax-loader" class="ajax-loader"><img src="../assets/img/loading_apple.gif" class="img-responsive" /></div>
    <div id="wrapper">
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="home.php">
                        <img src="../assets/img/home.png" />
                    </a>
                </div>   
                 <span class="logout-spn" >
					<a href="javascript:sessionDestroy();" style="color:#fff; "><span class='glyphicon glyphicon-off'></span>&nbsp &nbsp<?php echo $session->getValue('username'); ?></a>
                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
    <!--ajax script-->
    <script src="../lib_js/ajax.js"></script>