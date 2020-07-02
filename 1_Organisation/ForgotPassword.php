<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    
    <title>FORGOT PASSWORD</title>
    <link rel="shortcut icon" href="../assets/img/calculator.png">
    <!--  Bootstrap Style -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <!--  Custom Style -->
    <link href="../assets/css/style.css" rel="stylesheet" />
    <!--Ajax loader -->
    <link href="../assets/css/ajax.css" rel="stylesheet" />

    <script type="text/javascript">

        function validateEmail(userid) {

            var inputtxt = document.getElementById(userid).value;
            var email = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
            if (!inputtxt.match(email)) {
                document.getElementById('validation').innerHTML = "Enter correct Email id.";
                return false;
            }
            else {
                return true;
            }
        }
        function validate(form_id, userid)
        {
            document.getElementById('validation').innerHTML = "";
            if(validateEmail(userid)) {
                var ajax_obj = new Ajax();
                var url = ajax_obj.create_url_data(form_id);
                ajax_obj.processPOST("ajax_server/ForgotPassword.php", POST_AJAX_validate, url);
            }
        }

        function POST_AJAX_validate(response_text)
        {
            document.getElementById('validation').innerHTML = response_text;
        }
    </script>
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
                                <br>
                                <br>
                                <h5></h5>
                            <form class="form-signin" method="post" role="form" id='formid'>
                                <div class="form-group">
                                    <input type="text" class="form-control input-md" name="userid" id="userid" placeholder="Enter registered Email" required autofocus>
                                </div>
                                <br>
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary btn-block" onclick="validate('formid', 'userid');">SUBMIT</button>
                                </div>
                            </form>
                            <h5 id="validation"></h5>
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
