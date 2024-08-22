<?php
include 'header.php';
?>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css1/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css1/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css1/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css1/custom.css">
<!--Anwar code starts-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<!-- ANWAR CSS starts-->
<style type="text/css">
    .active2{
        font-weight: bold;
        border-style: solid none solid solid;
}
    a:hover {
 cursor:pointer;
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
<!-- ANWAR CSS ends-->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Shop</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <div class="toolbar-sorter-right">
                                    <span>Sort by </span>
                                   <select id="basic" class="selectpicker show-tick form-control sortbyselect" data-placeholder="$ USD">
                                    <option data-display="Select">Nothing</option>
                                    <option value="htl">High Price → Low Price</option>
                                    <option value="lth">Low Price → High Price</option>
                                </select>
                                </div>
                                <p>Buy, What you need!</p>
                            </div>
                            <div class="col-12 col-sm-4 text-center text-sm-right">
                                <ul class="nav nav-tabs ml-auto">
                                    <li>
                                        <a class="nav-link active" href="#grid-view" data-toggle="tab"> <i class="fa fa-th"></i> </a>
                                    </li>
                                    <li>
                                        <a class="nav-link" href="#list-view" data-toggle="tab"> <i class="fa fa-list-ul"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row" id="gridview">
                                       
                                  
                                        
                                      <?php
$sql = "SELECT product.*,category.categorytype,seller.compname FROM product LEFT JOIN category ON product.categoryid=category.categoryid LEFT JOIN seller ON seller.comp_id=product.comp_id WHERE product.status='Active'";
if($_GET[categoryid] != "")
{
    $sql = $sql . " AND product.categoryid='$_GET[categoryid]'";
}
if($_GET[searchquerywrong] != "")
{
    $sql = $sql ." AND product.title LIKE '%$_GET[searchquerywrong]%'";
}
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
        $sqledit = "SELECT * FROM product_image WHERE productid='$rs[0]'";
        $qsqledit = mysqli_query($con,$sqledit);
        $rsedit = mysqli_fetch_array($qsqledit);
        if($rsedit[imgpath] == "")
        {
            $imgproduct = "themes/images/No-image-found.jpg";
        }
        else if(file_exists("imgproduct/".$rsedit[imgpath]))
        {
            $imgproduct = "imgproduct/".$rsedit[imgpath];
        }
        else
        {
            $imgproduct = "themes/images/No-image-found.jpg";
        }

                                    echo "<div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'>
                                            <div class='products-single fix'>
                                                <div class='box-img-hover'>
                                                    <div class='type-lb'>
                                                    </div>
                                                    <img src='$imgproduct' style='height:300px;object-fit:contain;' class='img-fluid' alt='Image'>
                                                    <div class='mask-icon'>
                                                        <ul>
                                                            <li><a href='product-detail.php?productid=$rs[productid]' data-toggle='tooltip' data-placement='right' title='View'><i class='fas fa-eye'></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class='why-text' style='overflow-wrap: break-word;'>
                                                     <h4>$rs[title]</h4>
                                                     <h3>$rs[compname]</h3>
                                                     <h5>₹<del>$rs[costbd]</del>₹$rs[costad]</h5>
                                                </div>
                                            </div>
                                        </div>";
                                    } ?>
                                      
                                    
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    
                                  
                                    <?php
$sql = "SELECT product.*,category.categorytype,seller.compname FROM product LEFT JOIN category ON product.categoryid=category.categoryid LEFT JOIN seller ON seller.comp_id=product.comp_id WHERE product.status='Active'";
if($_GET[categoryid] != "")
{
    $sql = $sql . " AND product.categoryid='$_GET[categoryid]'";
}
if($_GET[searchquerywrong] != "")
{
    $sql = $sql ." AND product.title LIKE '%$_GET[searchquery]%'";
}
$qsql = mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
        $sqledit = "SELECT * FROM product_image WHERE productid='$rs[0]'";
        $qsqledit = mysqli_query($con,$sqledit);
        $rsedit = mysqli_fetch_array($qsqledit);
        if($rsedit[imgpath] == "")
        {
            $imgproduct = "themes/images/No-image-found.jpg";
        }
        else if(file_exists("imgproduct/".$rsedit[imgpath]))
        {
            $imgproduct = "imgproduct/".$rsedit[imgpath];
        }
        else
        {
            $imgproduct = "themes/images/No-image-found.jpg";
        }

                                   echo "<div class='list-view-box'>
                                        <div class='row' style='border:1px solid rgba(0,0,0,0.5);'>
                                            <div class='col-sm-6 col-md-6 col-lg-4 col-xl-4'>
                                                <div class='products-single fix'>
                                                    <div class='box-img-hover'>
                                                        <div class='type-lb'>
                                                        </div>
                                                        <img src='$imgproduct' class='img-fluid' alt='Image' style='height:270px;'>
                                                        <div class='mask-icon'>
                                                            <ul>
                                                                <li><a href='product-detail.php?productid=$rs[productid]' data-toggle='tooltip' data-placement='right' title='View'><i class='fas fa-eye'></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class='col-sm-6 col-md-6 col-lg-8 col-xl-8'>
                                                <div class='why-text full-width' style='overflow-wrap: break-word;'>
                                                   <h4>$rs[title]</h4>
                                                    <h5> ₹<del>$rs[costbd]</del>₹$rs[costad]</h5>
                                                    <h3>Seller-<b>$rs[compname]</b></h3>
                                                    <p>$rs[description]</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>";
                                   } ?> 
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                    <div class="product-categori">
                       <div class="search-product">
                                <input class="form-control" placeholder="Search here..." value="" type="text" id="searchquery">
                                <button type="submit" id="sbutton"> <i class="fa fa-search"></i> </button>
                        </div>

                   <!-- <div class="row">
                <div class="col-md-2">
                    <input type="text" name="minimum_range" id="minimum_range" class="form-control" value="<?php echo $minimum_range; ?>" />
                </div>
                <div class="col-md-8" style="padding-top:12px">
                    <div id="price_range"></div>
                </div>
                <div class="col-md-2">
                    <input type="text" name="maximum_range" id="maximum_range" class="form-control" value="<?php echo $maximum_range; ?>" />
                </div>
            </div>-->

            <div class="filter-price-left2">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider2">
                                <div id="price_range"></div>
                                <input type="hidden" name="minimum_range" id="minimum_range" class="form-control" value="0" readonly style="border:0; color:#fbb714; font-weight:bold;background-color:white;"/>
                                <input type="hidden" name="maximum_range" id="maximum_range" class="form-control" value="5000" readonly style="border:0; color:#fbb714; font-weight:bold;background-color:white;"/>
                                <p id="amount2" readonly style="border:0; color:#fbb714; font-weight:bold;background-color:white;width: auto;">&#8377;0 - &#8377;5000</p>
                            </div>
                           
</div>


              


 <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a id="allcat" class="list-group-item list-group-item-action catmenu<?php if($_GET[categoryid] == ""){echo" active2";}?>" data-toggle="collapse" aria-expanded="<?php if($_GET[categoryid] == ""){echo"true";} else{echo"false";}?>">ALL <small class="text-muted"></small>
                                </a>
                                </div>
                                 <?php
                                $result1 = mysqli_query($con, "SELECT * FROM category WHERE status = 'Active'");
                                $c = 0;
                                while($row1=mysqli_fetch_array($result1))
                                { $c++;
                                ?>
                                <div class="list-group-collapse sub-men">
                                    <a id="<?php echo $row1[categoryid];?>" class="list-group-item list-group-item-action catmenu<?php if($_GET[categoryid] == $row1[categoryid]){echo" active2";}?>" href="#sub-men1" data-toggle="collapse" aria-expanded="<?php if($_GET[categoryid] == $row1[categoryid]){echo"true";} else{echo"false";}?>" aria-controls="sub-men<?php echo $c;?>"><?php echo $row1[categorytype];?>
                                </a>
                                    <div class="collapse subcatmenus<?php if($_GET[categoryid] == $row1[categoryid]){echo" show";}?>" id="sub-menu<?php echo $row1[categoryid];?>" data-parent="#list-group-men">
                                        <div class="list-group">
                                             <a id="a<?php echo $row1[categoryid];?>" class="list-group-item list-group-item-action subcatmenu<?php if($_GET[categoryid] == $row1[categoryid]){echo" active";}?>">All <input type="hidden" name="subcategoryid" value="allsubcat"> </a>
                                               <?php
                                            $result2 = mysqli_query($con, "SELECT * FROM sub_category WHERE status = 'Active' AND categoryid=$row1[categoryid]");
                                            $listcount = 0;
                                            while($row2=mysqli_fetch_array($result2))
                                            { 
                                            ?>
                                            <a id="a<?php echo $row1[categoryid];?>" class="list-group-item list-group-item-action subcatmenu" ><?php echo $row2[subcategorytype];?> <input type="hidden" name="subcategoryid" value="<?php echo $row2[subcategoryid];?>"> </a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                               <?php } ?>
                              
                            </div>
                        </div>





















                         <?php /* <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men" data-children=".sub-men">
                                <?php
                                $result1 = mysqli_query($con, "SELECT * FROM category WHERE status = 'Active'");
                                $c = 0;
                                while($row1=mysqli_fetch_array($result1))
                                { $c++;
                                ?>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1" data-toggle="collapse" <?php if($_GET[categoryid]==$row1[categoryid]){echo"aria-expanded='true'";} else{echo "aria-expanded='false'";}?> aria-controls="<?php echo "sub-men$c"; ?>"><?php echo $row1[categorytype];?> <small class="text-muted">(100)</small>
                                </a>
                                    <div <?php if($_GET[categoryid]==$row1[categoryid]){echo"class='collapse show'";} else{echo"class='collapse'";} ?> id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active"> <small class="text-muted">All </small></a>
                                            <?php
                                            $result2 = mysqli_query($con, "SELECT * FROM sub_category WHERE status = 'Active' AND categoryid=$row1[categoryid]");
                                            $listcount = 0;
                                            while($row2=mysqli_fetch_array($result2))
                                            { 
                                            ?>
                                            <a href="#" class="list-group-item list-group-item-action"> <small class="text-muted"><?php echo $row2[subcategorytype]; ?> (50)</small></a>
                                            <?php } ?>
                                            <!--<a href="#" class="list-group-item list-group-item-action">Fruits 2 <small class="text-muted">(10)</small></a>-->
                                           
                                        </div>
                                    </div>
                                </div>
                                <!--<div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2" data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">Vegetables 
                                <small class="text-muted">(50)</small>
                                </a>
                                    <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 1 <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 2 <small class="text-muted">(20)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 3 <small class="text-muted">(20)</small></a>
                                        </div>
                                    </div>
                                </div>-->
                                <?php } ?>
                            </div>
                        </div> <?php */ ?>

                       <?php /* <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                           <div class="list-group">
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                    <?php
                    $query = "SELECT * FROM category WHERE status = 'Active'";
                    $qsql = mysqli_query($con,$query);
                            while($rs = mysqli_fetch_array($qsql))
                    
                    {
                    echo "<div class='list-group-item checkbo'>";
                    if($_GET[categoryid] != "")
                    {    
                    if($_GET[categoryid] != $rs[categoryid])
                        { echo "<label><input type='checkbox' class='common_selector maincat' value='$rs[categorytype]'> 
                            $rs[categorytype]</label>"; 
                        }
                        else
                        {
                            echo "<label><input type='checkbox' class='common_selector maincat' value='$rs[categorytype]' checked> 
                $rs[categorytype]</label>";
                        }
                    } 
                else{
                echo "<label><input type='checkbox' class='common_selector maincat' value='$rs[categorytype]' checked> 
                $rs[categorytype]</label>";
                     }
                    echo "</div>";
                     }
                    ?>
                    </div>
                </div>
                        </div>

                        <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Sub Categories</h3>
                            </div>
                           <div class="list-group">
                    <div style="height: 180px; overflow-y: auto; overflow-x: hidden;" id="subcatlist">
                    <?php
                    $subcatquery = "SELECT * FROM sub_category WHERE status = 'Active'";
                    if($_GET[categoryid] != "")
                    {
                        $subcatquery = $subcatquery . " AND categoryid = $_GET[categoryid]";
                    }
                    $qsubcatquery = mysqli_query($con,$subcatquery);
                            while($rs2 = mysqli_fetch_array($qsubcatquery))
                    
                    {
                    echo "<div class='list-group-item checkbox'>";
                    echo "<label><input type='checkbox' class='subcat_selector subcat' value='$rs2[subcategorytype]' checked>$rs2[subcategorytype]</label>";
                    echo "</div>";
                     }
                    ?>
                    </div>
                </div>  
                        </div> */?>

                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
    
<?php
include 'footer.php';
?>
<style>
    /*------------------------------------------------------------------
    IMPORT FONTS
-------------------------------------------------------------------*/

@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800');
@import url('https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700');


/*

    font-family: 'Poppins', sans-serif;

    font-family: 'Dosis', sans-serif;

*/

/*------------------------------------------------------------------
    IMPORT FILES
-------------------------------------------------------------------*/

@import url(all.css);
@import url(superslides.css);
@import url(bootstrap-select.css);
@import url(carousel-ticker.css);
@import url(code_animate.css);
@import url(bootsnav.css);
@import url(owl.carousel.min.css);
@import url(jquery-ui.css);
@import url(nice-select.css);
@import url(baguetteBox.min.css);

/*------------------------------------------------------------------ Products -------------------------------------------------------------------*/
 .title-all{
     margin-bottom: 30px;
}
 .title-all h1{
     font-size: 32px;
     font-weight: 700;
     color: #000000;
}
 .title-all p{
     color: #999999;
     font-size: 16px;
}
 .products-box{
     padding: 70px 0px;
}
 .special-menu{
     margin-bottom: 40px;
}
 .filter-button-group{
     display: inline-block;
}
 .filter-button-group button{
     background: #b0b435;
     color: #ffffff;
     border: none;
     cursor: pointer;
     padding: 5px 30px;
     font-size: 18px;
}
 .filter-button-group button.active{
     background: #000000;
}
 .filter-button-group button{
}
 .products-single {
     overflow: hidden;
     position: relative;
     margin-bottom: 30px;
}
 .products-single .box-img-hover{
     overflow: hidden;
     position: relative;
}
 .box-img-hover img{
     margin: 0 auto;
     text-align: center;
     display: block;
}
 .type-lb{
     position: absolute;
     top: 0px;
     right: 0px;
     z-index:8;
}
 .type-lb .sale{
     background: #b0b435;
     color: #ffffff;
     padding: 2px 10px;
     font-weight: 700;
     text-transform: uppercase;
}
 .type-lb .new{
     background: #000000;
     color: #ffffff;
     padding: 2px 10px;
     font-weight: 700;
     text-transform: uppercase;
}
 .why-text{
     background: #f5f5f5;
     padding: 15px;
}
 .why-text h4{
     font-size: 16px;
     font-weight: 700;
     padding-bottom: 15px;
}
 .why-text h5{
     font-size: 18px;
     font-family: 'Poppins', sans-serif;
     padding: 4px;
	 display: inline-block;
	 background: #b4354e;
	 color: #ffffff;
     font-weight: 600;
}
 .mask-icon{
     width: 100%;
     height: 100%;
     position: absolute;
     overflow: hidden;
     top: 0;
     left: 0;
}

 .products-single .mask-icon{
     background: rgba(1,1,1, 0.5);
     top: -100%;
     -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=0)";
     filter: alpha(opacity=0);
     opacity: 0;
     -webkit-transition: all 0.3s ease-out 0.5s;
     -moz-transition: all 0.3s ease-out 0.5s;
     -o-transition: all 0.3s ease-out 0.5s;
     -ms-transition: all 0.3s ease-out 0.5s;
     transition: all 0.3s ease-out 0.5s;
}
 .products-single:hover .mask-icon{
     -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
     filter: alpha(opacity=100);
     opacity: 1;
     top: 0px;
     -webkit-transition-delay: 0s;
     -moz-transition-delay: 0s;
     -o-transition-delay: 0s;
     -ms-transition-delay: 0s;
     transition-delay: 0s;
     -webkit-animation: bounceY 0.9s linear;
     -moz-animation: bounceY 0.9s linear;
     -ms-animation: bounceY 0.9s linear;
     animation: bounceY 0.9s linear;
}
 @keyframes bounceY {
     0% {
         transform: translateY(-205px);
    }
     40% {
         transform: translateY(-100px);
    }
     65% {
         transform: translateY(-52px);
    }
     82% {
         transform: translateY(-25px);
    }
     92% {
         transform: translateY(-12px);
    }
     55%, 75%, 87%, 97%, 100% {
         transform: translateY(0px);
    }
}
 @-moz-keyframes bounceY {
     0% {
         -moz-transform: translateY(-205px);
    }
     40% {
         -moz-transform: translateY(-100px);
    }
     65% {
         -moz-transform: translateY(-52px);
    }
     82% {
         -moz-transform: translateY(-25px);
    }
     92% {
         -moz-transform: translateY(-12px);
    }
     55%, 75%, 87%, 97%, 100% {
         -moz-transform: translateY(0px);
    }
}
 @-webkit-keyframes bounceY {
     0% {
         -webkit-transform: translateY(-205px);
    }
     40% {
         -webkit-transform: translateY(-100px);
    }
     65% {
         -webkit-transform: translateY(-52px);
    }
     82% {
         -webkit-transform: translateY(-25px);
    }
     92% {
         -webkit-transform: translateY(-12px);
    }
     55%, 75%, 87%, 97%, 100% {
         -webkit-transform: translateY(0px);
    }
}
 .our-team .icon{
     width: 35px;
     height: 35px;
     line-height: 35px;
     background: #b4354e;
     text-align: center;
     color: #fff;
     position: absolute;
     bottom: 0;
}
 .team-description{
     padding: 20px 0px;
}
 .team-description p{
     font-size: 14px;
     margin: 0px;
}
 .hover-team:hover .social{
     opacity: 1;
}
 .hover-team:hover .social li:nth-child(1) a{
     transition-delay: 0.3s;
}
 .hover-team:hover .social li:nth-child(2) a{
     transition-delay: 0.2s;
}
 .hover-team:hover .social li:nth-child(3) a{
     transition-delay: 0.1s;
}
 .hover-team:hover .social li:nth-child(4) a{
     transition-delay: 0.0s;
}
 .hover-team:hover .social li a{
     transform: translate(0, 0) 
}
 .hover-team:hover img{
     opacity: 0.5;
}
 .hover-team .team-content .title{
     border-bottom: 2px solid #b4354e;
}
 .shop-box-inner{
     padding: 70px 0px;
}
 .search-product {
     position: relative;
}
 .search-product input[type="text"] {
     background: #333333;
     border: 0;
     box-shadow: none;
     border-radius: 0;
     color: #ffffff;
     height: 55px;
     font-weight: 300;
     font-size: 16px;
     margin-bottom: 15px;
     padding: 0 20px;
     -webkit-transition: all .5s ease;
     -moz-transition: all .5s ease;
     transition: all .5s ease;
     width: 100%;
     outline: 0;
}
 .search-product .form-control::-moz-placeholder {
     color: #ffffff;
     opacity: 1;
}
 .search-product button {
     background: #000000;
     color: #ffffff;
     font-size: 18px;
     position: absolute;
     right: 0px;
     padding: 12px 15px;
     top: 0;
     line-height: 27px;
     border: none;
     cursor: pointer;
     height: 100%;
}
 .search-product button:hover{
     background: #b4354e;
}
 .filter-sidebar-left{
     margin-bottom: 20px;
}
 .title-left{
     font-size: 16px;
     border-bottom: 3px solid #000000;
     margin-bottom: 20px;
}
 .title-left h3{
     font-weight: 700;
}
 .list-group-item {
     border: none;
     padding: 5px 20px;
     font-size: 14px;
}
 .text-muted {
     padding: 10px 0px;
}
 .list-group-item[data-toggle="collapse"]::after {
     width: 0;
     height: 0;
     position: absolute;
     top: calc(50% - 12px);
     right: 10px;
     content: '';
     -webkit-transition: top .2s,-webkit-transform .2s;
     transition: top .2s,-webkit-transform .2s;
     transition: transform .2s,top .2s;
     transition: transform .2s,top .2s,-webkit-transform .2s;
     font-family: FontAwesome;
     content: "\f105";
}
 .list-group-tree .list-group-collapse .list-group {
     margin-left: 25px;
     border-left: 1px solid #ced4da;
}
 .list-group-tree .list-group-item.active {
     color: #b4354e;
     background-color: #fff;
     font-weight: 700;
}
 .list-group-tree .list-group-collapse .list-group > .list-group-item::before {
     position: absolute;
     top: 14px;
     left: 0;
     content: '';
     width: 8px;
     height: 1px;
     background-color: #ced4da;
}
 .list-group-tree .list-group-item:hover {
     color: #b4354e;
     background-color: #fff;
     outline: 0;
     font-weight: 700;
}
 .filter-price-left{
     margin-bottom: 20px;
}
 #slider-range .ui-slider-handle {
     background-color: #b4354e;
     border: 2px solid #fff;
     border-radius: 50%;
     cursor: pointer;
     height: 21px;
     top: -6px;
     transition: none 0s ease 0s;
     width: 21px;
     box-shadow: 0px 0px 6.65px 0.35px rgba(0,0,0,0.15);
}
 #slider-range .ui-slider-range {
     background-color: #b4354e;
     border-radius: 0;
}
 #slider-range {
     background: #000000;
     border: medium none;
     border-radius: 50px;
     float: left;
     height: 10px;
     margin-top: 14px;
     width: 100%;
}
 .price-box-slider p{
     clear: both;
     margin-top: 20px;
     display: inline-block;
     width: 100%;
}
 .price-box-slider p input{
     margin-top: 5px;
}
 .price-box-slider p button{
     border: none;
     color: #ffffff;
     float: right;
}
 .brand-box {
     display: inline-block;
     width: 100%;
     height: 259px;
     position: relative;
}
 .product-item-filter{
     border-bottom: 1px solid #000000;
     border-top: 1px solid #000000;
     display: -webkit-box;
     display: -ms-flexbox;
     display: -webkit-flex;
     display: flex;
     -webkit-box-pack: justify;
     -ms-flex-pack: justify;
     -webkit-justify-content: space-between;
     justify-content: space-between;
     padding: 5px 0;
}
 .nice-select.wide{
     width: 75%;
}
 .product-item-filter .toolbar-sorter-right span{
     line-height: 42px;
     padding-right: 15px;
     float: left;
}
 .product-item-filter .toolbar-sorter-right{
     width: 65%;
}
 .toolbar-sorter-right{
     float: left;
}
 .toolbar-sorter-right .bootstrap-select.form-control:not([class*="col-"]){
     width: 77%;
     float: right;
}
 .toolbar-sorter-right .bootstrap-select.btn-group > .dropdown-toggle{
     padding: 0px;
     border-radius: 0px;
     border: none;
}
 .toolbar-sorter-right .bootstrap-select.btn-group .dropdown-toggle .filter-option{
     padding-left: 15px;
}
 .toolbar-sorter-right .btn-light{
     background: #000000;
     color: #ffffff;
}
 .toolbar-sorter-right .btn-light:hover{
     background: #b4354e;
     border-radius: 0px;
     border: none;
}
 .toolbar-sorter-right .show > .btn-light.dropdown-toggle{
     background-color: #b4354e;
}
 .toolbar-sorter-right .bootstrap-select .dropdown-toggle:focus{
     background: #b4354e;
}
 .toolbar-sorter-right .dropup .dropdown-toggle::after{
     position: absolute;
     right: 15px;
     top: 18px;
}
 .product-item-filter p{
     float: right;
     line-height: 42px;
}
 .product-item-filter .nav-tabs{
     border: none;
     float: right;
}
 .nav > li {
     position: relative;
     display: inline-block;
     vertical-align: middle;
}
 .product-item-filter li .nav-link {
     border: none;
     border-radius: 0px;
     color: #111111;
     font-size: 18px;
     padding: 4px 12px;
}
 .product-item-filter li .nav-link.active {
     background: #b4354e;
     border: none;
     color: #ffffff;
}
 .product-item-filter li .nav-link:hover {
     background: #000000;
     border: none;
     color: #ffffff;
}
 .product-categori{
     margin-bottom: 30px;
}
 .product-categorie-box{
     margin-top: 20px;
}
 .tab-content, .tab-pane{
     width: 100%;
}
 .why-text.full-width h4 {
     font-size: 24px;
     font-weight: 700;
     padding-bottom: 15px;
}
 .why-text.full-width h5 del{
     font-size: 13px;
     color: #666;
}
 .why-text.full-width h5{
     color: #000000;
     font-weight: 700;
}
 .why-text.full-width p{
     padding-bottom: 20px;
}
 .why-text.full-width a{
     padding: 10px 20px;
     font-weight: 700;
     color: #ffffff;
     border: none;
}
 .list-view-box{
     margin-bottom: 30px;
}
 .list-view-box:hover .mask-icon{
     -ms-filter: "progid: DXImageTransform.Microsoft.Alpha(Opacity=100)";
     filter: alpha(opacity=100);
     opacity: 1;
     top: 0px;
     -webkit-transition-delay: 0s;
     -moz-transition-delay: 0s;
     -o-transition-delay: 0s;
     -ms-transition-delay: 0s;
     transition-delay: 0s;
     -webkit-animation: bounceY 0.9s linear;
     -moz-animation: bounceY 0.9s linear;
     -ms-animation: bounceY 0.9s linear;
     animation: bounceY 0.9s linear;
}
 .cart-box-main{
     padding: 70px 0px;
}
 .table-main table thead{
     background: #b4354e;
     color: #ffffff;
}
 .table-main .table thead th{
     font-size: 18px;
}
 .table-main table td.thumbnail-img{
     width: 120px;
}
 .table-main table td{
     vertical-align: middle;
     font-size: 16px;
}
 .quantity-box input{
     width: 60px;
     border: 2px solid #000000;
     text-align: center;
}
 .quantity-box input:focus{
     border-color: #b4354e;
}
 .name-pr a{
     font-weight: 700;
     font-size: 18px;
     color: #000000;
}
 .remove-pr{
     text-align: center;
}
 .coupon-box .input-group .form-control {
     min-height: 50px;
     border-radius: 0px;
     font-weight: 400;
     border: 1px solid #e8e8e8;
     box-shadow: none !important;
}
 .coupon-box .input-group .form-control::-moz-placeholder{
     color: #000000;
}
 .coupon-box .input-group .input-group-append .btn-theme {
     background: #000000;
     color: #ffffff;
     border: none;
     border-radius: 0px;
     font-size: 16px;
     padding: 0px 20px;
}
 .coupon-box .input-group .input-group-append .btn-theme:hover {
     background: #b4354e;
}
 .update-box input[type="submit"]{
     background: #000000;
     border: medium none;
     border-radius: 0;
     -webkit-box-shadow: none;
     box-shadow: none;
     color: #fff;
     display: inline-block;
     float: right;
     cursor: pointer;
     font-size: 16px;
     font-weight: 500;
     height: 50px;
     line-height: 40px;
     margin-right: 15px;
     padding: 0 20px;
     text-shadow: none;
     text-transform: uppercase;
     -webkit-transition: all 0.3s ease 0s;
     transition: all 0.3s ease 0s;
     white-space: nowrap;
     width: inherit;
}
 .update-box input[type="submit"]:hover{
     background: #b4354e;
}
 .order-box h3{
     font-size: 16px;
     color: #222222;
     font-weight: 700;
}
 .order-box h4 {
     font-size: 16px;
     padding: 0px;
     line-height: 35px !important;
}
 .order-box .font-weight-bold{
     font-size: 18px;
}
 .gr-total h5 {
     font-weight: 700;
     color: #b4354e;
     font-size: 18px;
     margin: 0px;
     padding: 0px;
     line-height: 35px !important;
}
 .gr-total .h5{
     margin: 0px;
     font-weight: 700;
     line-height: 35px;
}
 .my-account-box-main{
     padding: 70px 0px;
}
 .shopping-box a{
     font-size: 18px;
     color: #ffffff;
     border: none;
     padding: 10px 20px;
}
 .payment-icon {
     display: inline-block;
     padding: 10px 0px;
}
 .payment-icon ul li {
     width: 20%;
     float: left;
}
 .needs-validation label {
     font-size: 16px;
     margin-bottom: 0px;
     line-height: 24px;
}
 .needs-validation .form-control {
     min-height: 40px;
     border-radius: 0px;
     border: 1px solid #e8e8e8;
     box-shadow: none !important;
     font-size: 14px;
}
 .needs-validation .form-control:focus {
     border: 1px solid #b4354e !important;
}
 .review-form-box .form-control{
     min-height: 40px;
     border-radius: 0px;
     border: 1px solid #e8e8e8;
     box-shadow: none !important;
     font-size: 14px;
}
 .custom-checkbox .custom-control-input:checked ~ .custom-control-label::before {
     background-color: #b4354e;
     box-shadow: none;
}
 .custom-radio .custom-control-input:checked ~ .custom-control-label::before {
     background-color: #b4354e;
     box-shadow: none;
}
 .new-account-login h5 {
     font-size: 18px;
     color: #1111111;
     font-weight: 600;
}
 .new-account-login h5 a:hover{
     color: #b4354e;
}
 .review-form-box button{
     padding: 10px 20px;
     color: #ffffff;
     font-size: 18px;
     border: none;
}
 .wide.w-100{
     min-height: 40px;
     border: 1px solid #e8e8e8;
}
 .wide.w-100 option{
     min-height: 40px;
}
 .custom-control-input:focus ~ .custom-control-label::before{
     box-shadow: none;
}
 .odr-box a {
     font-size: 18px;
     color: #111111;
     font-weight: 700;
}
 .account-box{
     text-align: center;
     background: #ffffff;
     padding: 30px;
     border: 1px solid #000000;
}
 .bottom-box {
     border-top: 1px solid #eee;
     margin-bottom: 30px;
     margin-top: 30px;
     padding-top: 15px;
}
 .bottom-box .account-box {
     min-height: 205px;
}
 .account-box {
     border: 2px solid #000000;
     margin-top: 15px;
}
 .my-account-page a{
     color: #000000;
}
 .my-account-page a:hover{
     color: #b4354e;
}
 .service-icon i{
     font-size: 34px;
}
 .my-account-page a:hover i{
}
 .service-desc p{
     font-size: 16px;
}
 .service-desc h4{
     text-decoration: underline;
     font-size: 18px;
     font-weight: 700;
}
 .service-icon a{
     background: rgba(0, 0, 0, 0.9);
     -webkit-transition: -webkit-transform ease-out 0.1s, background 0.2s;
     -moz-transition: -moz-transform ease-out 0.1s, background 0.2s;
     transition: transform ease-out 0.1s, background 0.2s;
}
 .service-icon a{
     display: inline-block;
     font-size: 0px;
     cursor: pointer;
     margin: 15px 0px;
     width: 90px;
     height: 90px;
     line-height: 110px;
     border-radius: 50%;
     text-align: center;
     position: relative;
     z-index: 1;
     color: #ffffff;
}
 .service-icon a::after {
     pointer-events: none;
     position: absolute;
     width: 100%;
     height: 100%;
     border-radius: 50%;
     content: '';
     -webkit-box-sizing: content-box;
     -moz-box-sizing: content-box;
     box-sizing: content-box;
     content: "";
     top: 0;
     left: 0;
     padding: 0;
     z-index: -1;
     box-shadow: 0 0 0 2px rgba(255,255,255,0.1);
     opacity: 0;
     -webkit-transform: scale(0.9);
     -moz-transform: scale(0.9);
     -ms-transform: scale(0.9);
     transform: scale(0.9);
}
 .service-icon a:hover::after{
     -webkit-animation: sonarEffect 1.3s ease-out 75ms;
     -moz-animation: sonarEffect 1.3s ease-out 75ms;
     animation: sonarEffect 1.3s ease-out 75ms;
}
 .service-icon a:hover{
     background: rgba(251, 183, 20, 1);
     -webkit-transform: scale(0.93);
     -moz-transform: scale(0.93);
     -ms-transform: scale(0.93);
     transform: scale(0.93);
     color: #fff;
}
 @-webkit-keyframes sonarEffect {
     0% {
         opacity: 0.3;
    }
     40% {
         opacity: 0.5;
         box-shadow: 0 0 0 2px rgba(0, 53, 68, 0.1), 0 0 10px 10px #b4354e, 0 0 0 10px rgba(0, 53, 68, 0.5);
    }
     100% {
         box-shadow: 0 0 0 2px rgba(0, 53, 68, 0.1), 0 0 10px 10px #b4354e, 0 0 0 10px rgba(0, 53, 68, 0.5);
         -webkit-transform: scale(1.5);
         opacity: 0;
    }
}
 @-moz-keyframes sonarEffect {
     0% {
         opacity: 0.3;
    }
     40% {
         opacity: 0.5;
         box-shadow: 0 0 0 2px rgba(0, 53, 68, 0.1), 0 0 10px 10px #b4354e, 0 0 0 10px rgba(0, 53, 68, 0.5);
    }
     100% {
         box-shadow: 0 0 0 2px rgba(0, 53, 68, 0.1), 0 0 10px 10px #b4354e, 0 0 0 10px rgba(0, 53, 68, 0.5);
         -moz-transform: scale(1.5);
         opacity: 0;
    }
}
 @keyframes sonarEffect {
     0% {
         opacity: 0.3;
    }
     40% {
         opacity: 0.5;
         box-shadow: 0 0 0 2px rgba(0, 53, 68, 0.1), 0 0 10px 10px #b4354e, 0 0 0 10px rgba(0, 53, 68, 0.5);
    }
     100% {
         box-shadow: 0 0 0 2px rgba(0, 53, 68, 0.1), 0 0 10px 10px #3851bc, 0 0 0 10px rgba(0, 53, 68, 0.5);
         transform: scale(1.5);
         opacity: 0;
    }
}

</style>