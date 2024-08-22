<?php 
include 'header.php';
if(isset($_SESSION['customerid']))
{
    echo "<script>window.location='index.php';</script>";
}
if(isset($_POST['button']))
{
    $sql ="SELECT * FROM customer WHERE (emailid='$_POST[email]')  and status='Active'";
    $qsql = mysqli_query($con,$sql);
    echo mysqli_error($con);
    if(mysqli_num_rows($qsql) == 1)
    {
        $rslogin = mysqli_fetch_array($qsql);
        $_SESSION['custnewpasswordid'] = $rslogin['customerid'];
        echo "<SCRIPT>alert('We have sent password recovery mail to your Registered Mail ID..')</SCRIPT>";
        $currenturl = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/newpassword.php";
        $to = $rslogin['emailid'];
        $subject = "Password Recovery Mail from Dessert Lounge";
        $txt = "<b>Hello $rslogin[customername],</b> <br><br> We recently received a request to recover the Dessert Lounge Account $rslogin[emailid]. If you sent request, please click on this <a href='$currenturl'><b>Reset Link</b></a> to Change password. This password reset link will expire in 24 hours.";
        // Always set content-type when sending HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Dessert Lounge.online";
        mail($to,$subject,$txt,$headers);
        echo "<script>window.location='index.php';</script>";
    }
    else
    {
        echo "<SCRIPT>alert('You have entered invalid login credentials...')</SCRIPT>";
    }
}
?>
<!-- ANWAR CSS starts-->
<style type="text/css">
  #registerbox{
    background-color: rgba(125,0,125,0);
    background-image:url("images/ins-bg.png");
  }
  .form-group label{
    font-weight: bold;
  }
  .errmsg{
    color: red;
  }
</style>
<!-- ANWAR CSS ends-->
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Password Recovery</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <p>Please provide accurate details</p>
                        <!--<form id="contactForm">-->
                      <form action="" method="post"  name="frmform1" onsubmit="return validateform()">
                <input type="hidden" name="text" value="/">
                <fieldset>
                    <div class="form-group">
                        <label class="control-label">Email ID  <span class="errmsg" id="idemail"></span></label>
                        <div class="controls">
                            <input type="email"  placeholder="Enter your Email ID or Phone Number" name="email" id="email" class="col-md-12">
                        </div>
                    </div>  
<hr>
<div class="col-md-6 mb-3">
<input type="submit" name="button" class="btn btn-primary" value="Click here to Recover Password" >
        </div> 
                </fieldset>
            </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                        <h2>Know a Password&#63;</h2>
                        <p>Then Login, using below button</p>
                        <a class="btn btn-primary" data-fancybox-close="" href="login.php">Login Now</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

<?php
include 'ourpartners.php';
include 'footer.php';
?>
<script>
function validateform()
{
    var numericExpression = /^[0-9]+$/;
    var alphaExp = /^[a-zA-Z]+$/;
    var alphaspaceExp = /^[a-zA-Z\s]+$/;
    var alphanumericExp = /^[0-9a-zA-Z]+$/;
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    
    var passwordExp = /^((?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%!^&*+-]).{6,25})/;

    var ivalidate = 0;
     $('span').text('');
     if(!document.frmform1.email.value.match(emailExp))
    {
        document.getElementById("idemail").innerHTML = "Entered Email ID is not in valid format..";
        ivalidate = 1;
    }
    if(document.frmform1.email.value == "")
    {
        document.getElementById("idemail").innerHTML = "Email ID should not be empty..";
        ivalidate = 1;
    }
    if(ivalidate == 0)
    {
        return true;
    }
    else
    {
        return false;
    }
    
}
</script>
