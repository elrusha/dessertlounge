<?php
include 'header.php';
?>
<!-- ANWAR CSS starts-->
<style type="text/css">
    .active2{
        font-weight: bold;
        border-style: solid none solid solid;
}
    a:hover {
 cursor:pointer;
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
     height: 79%;
}
 .search-product button:hover{
     background: orange;
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
     color: orange;
     font-weight: 700;
}
 .why-text.full-width p{
     padding-bottom: 20px;
}
 .why-text.full-width a{
     padding: 10px 20px;
     font-weight: 700;
     color: orange;
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
.img-fluid
{
    width: 300px;
    height: 300px;
}
.products-single
{
    padding-top: 10px;
    padding-bottom: 20px;
}
</style>
<!-- ANWAR CSS ends-->


    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12"><br>
                    <h2>Order</h2>
                </div>
                <div class="search-product">
                                <input class="form-control" placeholder="Search for dessert" value="" type="text" id="searchquery">
                                <button type="submit" id="sbutton"> <i class="fa fa-search"></i> </button>
                        </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-item-filter row">
                            <div class="col-12 col-sm-8 text-center text-sm-left">
                                <p>Order, Delicious desserts!</p>
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
                                                    <a href='product-detail.php?productid=$rs[productid]'><img src='$imgproduct' style='height:300px;object-fit:contain;' class='img-fluid' alt='Image'>
                                                </div>
                                                <div class='why-text' style='overflow-wrap: break-word;'>
                                                     <h4>$rs[title]</h4>
                                                     <h3>$rs[compname]</h3>
                                                     <h5>₹$rs[costad]</h5>
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
                                                        <img src='$imgproduct' class='img-fluid' alt='Image' style='height:200px;'>
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
                       
           <!-- <div class="filter-price-left2">
                <div class="title-left">
                    <h3>Price</h3>
                 </div>
                 <div class="price-box-slider2">
                        <div id="price_range"></div>
                        <input type="hidden" name="minimum_range" id="minimum_range" class="form-control" value="0" readonly style="border:0; color:#fbb714; font-weight:bold;background-color:purple;"/>
                        <input type="hidden" name="maximum_range" id="maximum_range" class="form-control" value="10000000" readonly style="border:0; color:#fbb714; font-weight:bold;background-color:purple;"/>
                        <p id="amount2" readonly style="border:0; color:#fbb714; font-weight:bold;background-color:white;width: auto;">&#8377;0 - &#8377;10000000</p>
                 </div>          
            </div>-->


              


 <!--   <div class="filter-sidebar-left">
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
                              
                            </div>*/
                        </div>-->
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
    .img-fluid:hover{
        position:relative;
        top:10px;
        background:none;
    }
</style>