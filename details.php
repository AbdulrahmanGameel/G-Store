<?php
$active='Details';
include("includes/header.php");
?>


        <div id="content">
            <div class="container">
                
                <div class="col-md-12">
                    
                        <ul class="breadcrumb">
                            
                            <li><a href="home.php">Home</a></li>
                            <li><a href="shop.php">Shop</a></li>
                            <li>
                                <a href="shop.php?p_cat=<?php echo $p_cat_id; ?> " >  
                                    <?php echo $p_cat_title; ?>
                                </a>
                            </li>
                            <li>
                                <a href="details.php?pro_id=<?php echo $product_id; ?> " >  
                                    <?php echo $product_title; ?>
                                </a>
                            </li>
                        </ul>

                </div>
                
                <div class="col-md-3">

                    <?php
                        include"includes/sidebar.php"
                    ?>

                </div>

                <div class="col-md-9">
                    <div id="productMain" class="row">
                        <div class="col-sm-6">
                            <div id="mainImage">
                                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                        <li data-target="#myCarousel" data-slide-to="1"></li>
                                        <li data-target="#myCarousel" data-slide-to="2"></li>
                                    </ol>

                                    <div class="carousel-inner">

                                    <?php 
                                    echo " <div class='item active'>
                                                <center><img src='admin_area/product_images/$product_img1' alt='3a' class='img-responsive'></center>
                                            </div>
                                            <div class='item'>
                                                <center><img src='admin_area/product_images/$product_img2' alt='3a' class='img-responsive'></center>
                                            </div>
                                            <div class='item'>
                                                <center><img src='admin_area/product_images/$product_img3' alt='3a' class='img-responsive'></center>
                                            </div>
                                
                                
                                
                                ";

                                    ?>

                               
                                    </div>

                                    <a href="#myCarousel"  class="left carousel-control" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" ></span>
                                        <span class="sr-only">Previous</span>
                                    </a>

                                    <a href="#myCarousel" class="right carousel-control" data-slide="next" >
                                        <span class="glyphicon glyphicon-chevron-right" ></span>
                                        <span class="sr-only">Next</span>
                                    </a>

                                </div>
                            </div>
                        </div> 

                        <div class="col-sm-6">
                            <div class="box">
                                <h1 class="text-center"><?php echo $product_title ;?></h1>
                                <?php 
                                    addCart();
                                ?>
                                                           
                                    <form action="details.php?add_cart=<?php echo $product_id; ?>" class="form-horizontal" method="post"><!-- form-horizontal Begin -->

                                    <div class="form-group">
                                        <label for="" class="col-md-5 control-label">Products Quantity</label>
                                        <div class="col-md-7">
                                            <select name="product_qty" id="" class="form-control">
                                                <option >1</option>
                                                <option >2</option>
                                                <option >3</option>
                                                <option >4</option>
                                                <option >5</option>
                                            </select>
                                        </div>                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="col-md-5 control-label">Product Size</label>
                                        <div class="col-md-7"><!-- col-md-7 Begin -->
                                       
                                       <select name="product_size" class="form-control" required ><!-- form-control Begin -->
                                          
                                           <option value="" hidden selected>Select a Size</option>
                                           <option>Small</option>
                                           <option>Medium</option>
                                           <option>Large</option>
                                           
                                       </select><!-- form-control Finish -->
                                       
                                   </div><!-- col-md-7 Finish -->
                                    </div>
                                    <p class="price">$<?php echo $product_price ;?></p>
                                    
                                    <p class="text-center buttons"><button class="btn btn-primary i fa fa-shopping-cart"> Add to cart</button></p>
                                </form>
                            </div>
                        
                            <div class="row" id="thumbs">

                                <?php 

                                    echo " 
                                    <div class='col-xs-4'>
                                        <a data-target='#myCarousel' data-slide-to='0' href='#' class='thumb'><img src='admin_area/product_images/$product_img1' alt='Product 2' class='img-responsive'></a>
                                    </div>
                                    <div class='col-xs-4'>
                                        <a data-target='#myCarousel' data-slide-to='1' href='#' class='thumb'><img src='admin_area/product_images/$product_img2' alt='Product 2' class='img-responsive'></a>
                                    </div>
                                    <div class='col-xs-4'>
                                        <a data-target='#myCarousel' data-slide-to='2' href='#' class='thumb'><img src='admin_area/product_images/$product_img3' alt='Product 2' class='img-responsive'></a>
                                    </div>
                                    
                                    ";
                                ?>
                            </div>

                        </div>

                    </div>

                    <div class="box" id="details">
                        <h4>Product Details</h4>
                        <p>
                            <?php echo $product_desc; ?>
                        </p>
                        
                        <h4>Size</h4>
                        <ul>
                            <li>Small</li>
                            <li>Medium</li>
                            <li>Large</li>
                        </ul>
                        <hr>
                    </div>

                    <div id="same-height-row">
                        <div class="col-md-3 col-sm-6">
                            <div class="box same-height headline">
                                <h3 class="text-center">Products You Might Like</h3>
                            </div>
                        </div>

                        <?php 
                        $get_products = "select * from products order by rand() desc limit 0,3";
                        $run_products = mysqli_query($con, $get_products);
                        while($row_products = mysqli_fetch_array($run_products)){
                            $product_id = $row_products['product_id'];
                            $product_title = $row_products['product_title'];
                            $product_price = $row_products['product_price'];
                            $product_img1 = $row_products['product_img1'];
                            echo "
                        
                            <div class='col-md-3 col-md-6 center-responsive'>
                                <div class='product same-height'>
                                    <a href='details.php?pro_id=$product_id'>
                                        <img class='img-responsive' src='admin_area/product_images/$product_img1' alt='$product_title'>
                                    </a>
                                    <div class='text'>
                                        <h3>
                                            <a href='details.php?pro_id=$product_id'> $product_title</a>
                                            <p class='price'>$$product_price</p>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            
                            
                            ";
                            
                        }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
        
        <?php
            include"includes/footer.php"
        ?>
        <script src="js/jquery-331.min.js"></script>
        <script src="js/bootstrap-337.min.js"></script>

    </body>

</html>
