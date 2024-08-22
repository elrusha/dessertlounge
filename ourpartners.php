    <!-- Start Instagram Feed  -->
    <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
<?php               
                            $sql = "SELECT * FROM seller WHERE status='Active'";
                            $qsql = mysqli_query($con,$sql);
                            while($rs = mysqli_fetch_array($qsql))
                            { 
                            if(file_exists("imgcompany/".$rs[companylogo]))
            {              
?>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="imgcompany/<?php echo $rs['companylogo']; ?>" alt="" style="height:10em;object-fit: contain;" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
<?php
                            }}
?>           
        </div>
    </div>
    <!-- End Instagram Feed  -->