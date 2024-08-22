<?php
include 'header.php';
?>
    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="font-secondary text-primary mb-4">Super Sweet</h1>
                    <h1 class="display-1 text-uppercase text-white mb-4">Dessert Lounge</h1>
                    <h1 class="text-uppercase text-white">The Best Desserts Ever!</h1>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="products.php" class="btn btn-primary border-inner py-3 px-5 me-5">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->

    <!-- Products Start -->
    <div class="container-fluid about py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Delighted With Sweetness!</h2>
                <h1 class="display-4 text-uppercase">Explore Our Categories</h1>
            </div>
            <div class="tab-class text-center">
                <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase border-inner p-4 mb-5"style="size:fit-content";>
                    <?php $sql = "SELECT * FROM category WHERE status='Active' ORDER BY `categorytype` ASC";
                            $qsql = mysqli_query($con,$sql);
                            while($rs = mysqli_fetch_array($qsql))
                            {
                                echo "<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
                                <a class='btn btn-primary' href='products.php?categoryid=$rs[categoryid]'>$rs[categorytype]</a>
                    </div>";
                }
                ?>
                </ul>
            </div>
            </div>
            </div>
    <!-- Products End -->
     <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="row">
                <?php $sql = "SELECT * FROM category WHERE status='Active' ORDER BY `categorytype` ASC";
                            $qsql = mysqli_query($con,$sql);
                            while($rs = mysqli_fetch_array($qsql))
                            {
                echo "<div class='col-lg-4 col-md-4 col-sm-12 col-xs-12'>
                    <div class='shop-cat-box'>
                        <img class='img-fluid' src='imgcategory/$rs[categoryimg]' alt='$rs[description]' style='height:300px;object-fit: cover;'/>
                        <a class='btn btn-hover' style='color:black'; href='products.php?categoryid=$rs[categoryid]'>$rs[categorytype]</a>
                    </div>
                </div>";
                }
                ?>
                
            </div>
        </div>
    </div>
    <!-- End Categories -->

<?php

include 'footer.php';
?>

<style>
    .categories-shop{
     padding: 70px 0px;
}
 .shop-cat-box{
     margin-bottom: 30px;
     position: relative;
     padding: 3px;
     overflow: hidden;
     border: 0px solid #000000;
	 box-shadow: 9px 9px 30px 0px rgba(0, 0, 0, 0.3);
	-webkit-transition: all 0.3s ease;
	transition: all 0.3s ease-in-out 0s;
}
 .shop-cat-box img{
     margin: -10px 0 0 -10px;
     max-width: none;
     width: -webkit-calc(100% + 10px);
     width: calc(100% + 10px);
     opacity: 0.9;
     -webkit-transition: opacity 0.35s, -webkit-transform 0.35s;
     transition: opacity 0.35s, transform 0.35s;
     -webkit-transform: translate3d(10px,10px,0);
     transform: translate3d(10px,10px,0);
     -webkit-backface-visibility: hidden;
     backface-visibility: hidden;
}
 .shop-cat-box:hover img{
     opacity: 0.6;
     -webkit-transform: translate3d(0,0,0);
     transform: translate3d(0,0,0);
}
 .shop-cat-box a{
     position: absolute;
     z-index: 2;
     bottom: 0px;
     left: 0px;
     right: 0;
     margin: 0 auto;
     text-align: center;
     border: none;
     color: #ffffff;
     font-size: 18px;
     font-weight: 700;
     padding: 12px 0px;
}

.box-add-products{
	padding: 70px 0px;
	background-color: #f4f4f4;
}

.offer-box{
	position: relative;
	overflow: hidden;
}

.offer-box-products{
	box-shadow: 0px 0px 15px 0px rgba(0, 0, 0, 0.1);
	-webkit-transition: all 0.3s ease;
	transition: all 0.3s ease-in-out 0s;
}

.offer-box-products:hover{
	-webkit-transform: translateY(6px);
	transform: translateY(6px);
	box-shadow: 0px 9px 15px 0px rgba(0, 0, 0, 0.1);
}

</style>
    