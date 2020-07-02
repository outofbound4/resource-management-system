
<?php
/*******************************************************************************
* This page is redirected by the email or message link                         *
*                                                                              *
*******************************************************************************/
require_once('../config/FolderPath.php');
require_once root . 'config/ClassConnectDB.php';
require_once root . '1_Organisation/package/forms.php';
$formData       = new Forms();
$data           = $formData->getFormData();
$userid         = $data["userid"];
$token          = $data["token"];
$sql            = "select *from token where userid = '$userid' AND token = '$token' AND tokenExpire > NOW();";
$result         = $DB_CONN->query($sql);
if(!$result->fetch_object()) {
    echo "session Expire.";
}
else {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <title>Login</title>
    <link rel="shortcut icon" href="../assets/img/calculator.png">
    <!--  Bootstrap Style -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!--  Custom Style -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!--Ajax loader -->
    <link href="../assets/css/ajax.css" rel="stylesheet" />

    
</head>
<body style="background:url('../assets/img/head1.jpg') no-repeat center center fixed;
        -webkit-background-size: cover !important;
        -moz-background-size: cover !important;
        -o-background-size: cover !important;
        background-size: cover !important;
    ">

    <div id="ajax-loader" class="ajax-loader"><img src="../assets/img/loading_apple.gif" class="img-responsive" /></div>

    <div id="home" >
        <div class="overlay">
            <div class="container">
                <div class="row col-md-offset-3">
                    <div class="col-lg-6 col-md-6">
                        <div class="div-trans text-center">
                            <br>
                            <br>
                            <div class="col-lg-12 col-md-12 col-sm-12" >

                            <form class="form-signin" method="post" role="form" id='formId'>
                                <div class="form-group">
                                    <input type="password" class="form-control input-md" name="password" id="password" 
                                        placeholder="Password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="confirm_password" 
                                        placeholder="confirm password" required>
                                </div>
                                <input type="hidden" id="userid" name="userid" value= <?php echo $userid; ?> >
                                <input type="hidden" id="token" name="token" value= <?php echo $token; ?> >
                                <br>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" onclick="validate('formId', 'password')">SUBMIT</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5 col-md-offset-1">
                    <h4><span id=tick2>
                    </span>&nbsp;| 
    <script>
                    function show2(){
                    if (!document.all&&!document.getElementById)
                    return
                    thelement=document.getElementById? document.getElementById("tick2"): document.all.tick2
                    var Digital=new Date()
                    var hours=Digital.getHours()
                    var minutes=Digital.getMinutes()
                    var seconds=Digital.getSeconds()
                    var dn="PM"
                    if (hours<12)
                    dn="AM"
                    if (hours>12)
                    hours=hours-12
                    if (hours==0)
                    hours=12
                    if (minutes<=9)
                    minutes="0"+minutes
                    if (seconds<=9)
                    seconds="0"+seconds
                    var ctime=hours+":"+minutes+":"+seconds+" "+dn
                    thelement.innerHTML=ctime
                    setTimeout("show2()",1000)
                    }
                    window.onload=show2
                    //-->
    </script>
    <script type="text/javascript">
        function passwordValidity(passwordId) {
            var paswd       = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
            var inputtxt    = document.getElementById(passwordId).value;
            if (!inputtxt.match(paswd)) {
                alert('Password must contain at least one lowercase letter, one uppercase letter, one numeric digit,'+ 
                    'and one special character.');
                return false;
            }
            else
                return true;
        }

        function passwordMatch() {
            var password            = document.getElementById("password").value;
            var confirm_password    = document.getElementById("confirm_password").value;
            var result              = password.localeCompare(confirm_password);
            if(result == 0)
                return true;
            else {
                alert("Password miss match.");
                return false;
            }
        }

        function validate(form_id, passwordId) {
            if(passwordValidity(passwordId) && passwordMatch()) {
                var ajax_obj = new Ajax();
                var url = ajax_obj.create_url_data(form_id);
                ajax_obj.processPOST("ajax_server/NewPassword.php", POST_AJAX_validate, url);
            }
        }

        function POST_AJAX_validate(response_text)
        {
            alert(response_text);
        }
    </script>

              <?php
                $date = new DateTime();
                echo $date->format('l, F jS, Y');
              ?><h4>
                </div>
            </div>
            
            </div>
            </div>
            
        </div>


    </div>
   <div id="footser-end">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                   <center>Alrights Reserved 2018 ! Designed By : GAURAV SHARMA</center>
                </div>
            </div>

        </div>
    </div>
    <!--./ FOOTER SECTION END -->
    <!--  Jquery Core Script -->
    <script src="../assets/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="../assets/js/bootstrap.js"></script>
    <!--  Custom Scripts -->
    <script src="../assets/js/custom.js"></script>
    <!--ajax script-->
    <script src="../lib_js/ajax.js"></script>
   
</body>
</html>

<?php
}

?>   