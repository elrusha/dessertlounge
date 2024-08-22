<?php 
include 'header.php';
if(isset($_SESSION[customerid]))
{
    echo "<script>window.location='index.php';</script>";
}
if($_POST[btnsubmit])
{
    $sql ="SELECT * FROM customer WHERE (emailid='$_POST[loginusername]' OR contactno='$_POST[loginusername]') AND password='$_POST[loginpassword]' AND status='Active'";
    $qsql = mysqli_query($con,$sql);
    if(mysqli_num_rows($qsql) == 1)
    {
        $rs = mysqli_fetch_array($qsql);
        $_SESSION[customerid] = $rs[customerid];
        echo "<script>alert('Logged in successfully.');</script>";
        if(isset($_GET[productid]))
        {
        echo "<script>window.location='product-detail.php?productid=$_GET[productid]';</script>";
        }
        else
        {
        echo "<script>window.location='index.php';</script>";
        }
    }
    else
    {
        echo "<script>alert('You have entered invalid login credentials.');</script>";
    }
}
?>
<!-- ANWAR CSS starts-->
<style type="text/css">
#registerbox{
    height: 400px;
    width: 500px;
    background-color:none;
    background-image:url("images/honeydew.jpg");
    text-align:center;
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
                    <h2>Login</h2>
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
                        <p>please enter your Email ID / Phone Number and password to Login</p>
                        <!--<form id="contactForm">-->
                        <form action="" method="post"  name="frmform1" onsubmit="return validateform1()">    
                            <div class="row">
                              
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Email ID / Phone Number <span class="errmsg" id="idloginusername"></span></label>
                                        <input type="text" placeholder="Enter your Email/Phone No" class="form-control" name="loginusername" >
                                    </div>
                                </div>
                              
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Password <span class="errmsg" id="idloginpassword"></span></label>
                                        <input type="password" placeholder="Enter your password" class="form-control" name="loginpassword">
                                    </div>
                                    <div class="submit-button text-center"><br>                                        
                                        <input class="btn btn-primary" type="submit" value="Sign in" name="btnsubmit">
                                        <a class="btn hvr-hover" href="recoverpassword.php" style="color:red;">forgot password?</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
				<div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2 style="color:black";>Don't have an account&#63;</h2>
                        <a class="btn btn-primary" data-fancybox-close="" href="register.php">Register Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->

<?php
include 'ourpartners.php';
include 'footer.php';
?>
<script type="text/javascript">
    function validateform1()
{ 
    /*Regular Expressions starts*/
    var numericExpression = /^[0-9]+$/;
    var alphaExp = /^[a-zA-Z]+$/;
    var alphaspaceExp = /^[a-zA-Z\s]+$/;
    var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,8}$/;
    /*Regular Expressions ends*/
    
    $(".errmsg").html('');
    //alert("test test");
    var errcondition = "true";
    if(document.frmform1.loginusername.value=="")
    {
        document.getElementById("idloginusername").innerHTML="Email ID or Password should be entered...";
        errcondition ="false";
    }
    if(document.frmform1.loginpassword.value=="")
    {
        document.getElementById("idloginpassword").innerHTML = "Password should not be empty...";
        errcondition ="false";      
    }
    if(errcondition == "true")
    {
        return true;
    }
    else
    {
        return false;
    }
}
</script>