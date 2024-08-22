<?php
session_start();
error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");

  $sqlcustomer = "SELECT * FROM customer WHERE customerid='$_SESSION[customerid]'";
  $qsqlcustomer= mysqli_query($con,$sqlcustomer);
  $rscustomer = mysqli_fetch_array($qsqlcustomer);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>DESSERT LOUNGE</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicon -->
    <link href="favicon.svg" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

     <!-- Responsive CSS -->
     <link rel="stylesheet" href="css1/responsive.css">

     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    
    <style>
#load{
    width:100%;
    height:100%;
    position:fixed;
    top:0px;
    left:0px;
    z-index:9999;
    background:url("loader.png") no-repeat 50% 50% rgba(255,255,255,0.9);
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

document.onreadystatechange = function() { 
    if (document.readyState !== "complete") { 
        document.querySelector("body").style.visibility = "hidden"; 
        document.querySelector("#load").style.visibility = "visible"; 
    } else { 
        document.querySelector("#load").style.display = "none"; 
        document.querySelector("body").style.visibility = "visible"; 
    } 
};</script>
</head>

<body>
<div id="load"></div>
<style type="text/css">
       .cststl a:hover{color: white;}
</style>
    <!-- Topbar Start -->
    <div class="container-fluid px-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email Us</h6>
                        <span>dsrtlounge@gmail.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-primary border-inner py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-dark me-3"></i>DESSERT LOUNGE</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>+91 8971210413</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>Dessert Lounge</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php if(isset($_SESSION[customerid]))
        {
        ?>
                <div class="attr-nav">
							<a href="#">
								<i class="fas fa-user s_color fa-lg"></i>
								<?php echo $rscustomer['customername']; ?>
                </div>
        <?php } ?>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto mx-lg-auto py-0">
                <a href="index.php" class="nav-item nav-link active">Home</a>
                <a href="about.php" class="nav-item nav-link">About Us</a>
                <?php if(!isset($_SESSION[customerid]) and ($_SESSION[emptype]!='Seller'))
                            {
                        ?>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="sellerlogin.php">Seller</a></li>
                        
                        <?php } ?>
                <a href="contact-us.php" class="nav-item nav-link">Contact Us</a>
               
            </div>
        </div>

<?php if(isset($_SESSION[customerid]))
        {
        ?>
                <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><b>MENU</b></a>
                        <div class="dropdown-menu m-0">
                        <div class="side">
                <li class="cart-box">
                    <ul class="cart-list">
                        
                            <h6><a href="customerprofile.php">Update Profile</a></h6>
                        
                        
                            <h6><a href="changepassword.php">Change Password</a></h6>
                        
                        
                            <?php $qsqlmo = mysqli_query($con, "SELECT * FROM purchase WHERE customerid='$_SESSION[customerid]' AND status!='Pending' AND deliverystatus!='Delivered' AND deliverystatus!='Cancelled'");
                            ?>
                            <h6><a href="viewcustpurchase.php">My order( <?php echo mysqli_num_rows($qsqlmo); ?> )</a></h6>
                        
                        
                            <?php $qsqlwl = mysqli_query($con, "SELECT * FROM wishlist WHERE wishlist.custid='$_SESSION[customerid]'");
                            ?>
                            <h6><a href="wishlist.php">Wishlist( <?php echo mysqli_num_rows($qsqlwl); ?> )</a></h6>
                        
                        
                            <h6><a href="viewbilling.php">My Bills</a></h6>
                                          
                    </ul>
                </li>
            </div>
                    </div>
                </div>
<?php } ?>
        <?php if(isset($_SESSION[customerid]))
        {
        ?>
        <div class="total">
                <?php $qsqlc = mysqli_query($con, "SELECT * FROM purchase WHERE customerid='$_SESSION[customerid]' AND status='Pending'");
                 ?>
                <a href="cart.php" class="btn btn-default hvr-hover btn-cart"><i class="fas fa-cart-plus"></i> Cart( <?php echo mysqli_num_rows($qsqlc); ?> )</a>
                <a href="logout.php" class="btn btn-outline-warning"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div> 
        <?php
        }
        ?>
    </nav>
<style>
.attr-nav > ul > li > a{
     padding: 28px 15px;
}
 ul.cart-list > li.total > .btn{
     border-bottom: solid 1px #cfcfcf !important;
     color: black ;
     padding: 10px 15px;
     border: none;
     font-weight: 700;
     color: #ffffff;
}
</style>