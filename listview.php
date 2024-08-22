<?php 
include("dbconnection.php");
?>
<?php
if(isset($_POST["action"]))
{
 $query = "
  SELECT product.*,category.categorytype,sub_category.subcategorytype,seller.compname FROM product LEFT JOIN category ON product.categoryid=category.categoryid LEFT JOIN sub_category ON product.subcategoryid=sub_category.subcategoryid LEFT JOIN seller ON seller.comp_id=product.comp_id WHERE product.status='Active'";
if(isset($_POST["minimum_range"], $_POST["maximum_range"]) && !empty($_POST["minimum_range"]) && !empty($_POST["maximum_range"]))
 {
  $query .= "
   AND costad BETWEEN '".$_POST["minimum_range"]."' AND '".$_POST["maximum_range"]."'";
 }
 
if(isset($_POST["cat"]))
 {
  if ($_POST["cat"] !='allcat') {
    $cat_filter = $_POST["cat"];
    $query .= " AND category.categoryid = $cat_filter";
  }
 }
 if(isset($_POST["subcat"]))
 {
 if ($_POST["subcat"] !='allsubcat') 
    {
    $subcat_filter = $_POST["subcat"];
    $query .= " AND sub_category.subcategoryid = $subcat_filter";
    }
 }

if(isset($_POST["squery"]))
{
 $search = mysqli_real_escape_string($con, $_POST["squery"]);
 $query .= " AND (category.categorytype LIKE '%".$search."%'
  OR product.title LIKE '%".$search."%' 
  OR product.description LIKE '%".$search."%')";
}

if(isset($_POST["sorder"]))
{
  $sortingorder = $_POST["sorder"];
  if($sortingorder=='htl')
     {$query .= " ORDER BY product.costad DESC";}
   else if($sortingorder=='lth') {$query .= " ORDER BY product.costad ASC";}  
}

 $qsql = mysqli_query($con,$query);
while($rs = mysqli_fetch_array($qsql))
{
        $sqledit = "SELECT * FROM product_image WHERE productid='$rs[0]'";
        $qsqledit = mysqli_query($con,$sqledit);
        if(mysqli_num_rows($qsqledit)>=1)
        {
            $rsedit = mysqli_fetch_array($qsqledit);
            if(file_exists('imgproduct/'.$rsedit['imgpath']))
            {
                $imgproduct = 'imgproduct/'.$rsedit['imgpath'];
            }
            else
            {               
                $imgproduct = 'themes/images/No-image-found.jpg';
            }

        }   
         
        else
        {               
            $imgproduct = 'themes/images/No-image-found.jpg';
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

         
}
}
?>
<style>
    .products-single {
     overflow: hidden;
     position: relative;
     margin-bottom: 30px;
}
 .products-single .box-img-hover{
     overflow: hidden;
     position: relative;
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
    </style>
