<?php 


session_start();


if(!isset($_SESSION['customer_email'])){
    echo " <script> window.open( '..checkout.php' , '_self' ) </script> ";
}else {    include("includes/db.php");
    include("functions/functions.php");


?>
  <!DOCTYPE html>

<html lang="en">

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>G-Store</title>

        <link rel="stylesheet" href= "../styles/bootstrap-337.min.css">

        <link rel="stylesheet" href="../font-awsome/css/font-awesome.min.css">

        <link rel="stylesheet" href= "../styles/style.css">
    </head>

    <body>

        <div id="top"> <!-- top BEGIN --> 

            <div class="container"><!-- container BEGIN-->

                <div class="col-md-6 offer"><!-- col-md-6 offer BEGIN-->
                <a href="#" class="btn btn-sm">
                   
                   <?php 
                   
                   if(!isset($_SESSION['customer_email'])){
                       
                       echo "Welcome: Guest";
                       
                   }else{
                       
                       echo "Welcome: " . $_SESSION['customer_email'] . "";
                       
                   }
                   
                   ?>
                   
               </a>
                    <a href="checkout.php"> <?php itemCount();?> items in your cart | Making a total of <?php itemTotalValue();?></a>
                </div><!-- col-md-6 offer END -->

                <div class="col-md-6"> <!-- col-md-6 BEGIN -->

                    <ul class="menu"><!-- MENU START -->
                        <li><a href="../register.php">Register </a></li>
                        <li><a href="../customer\my_account.php"> My Account </a></li>
                        <li><a href="../cart.php"> Go To Cart</a></li>
                        <li><?php 
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='../checkout.php'> Login </a>";
                        }else {
                            echo "<a href='../logout.php'> Log Out </a>";
                        }
                        ?></li>
                    </ul><!-- MENU END -->

                </div> <!-- col-md-6 END -->

            </div><!-- container END -->

        </div><!-- top END -->

        <div id="navbar" class="navbar navbar-default"><!-- navbar navbar-default BEGIN -->

            <div class="container"><!-- container BEGIN-->

                <div class="navbar-header"><!-- navbar-header BEGIN-->

                    <a href="../home.php" class="navbar-brand home"><!-- navbar-brand home BEGIN-->

                        <img src="../images/ecom-store-logo.png" alt="G-Store Logo" class="hidden-xs">
                        <img src="../images/ecom-store-logo-mobile.png" alt="G-Store Logo Mobile" class="visible-xs">

                    </a><!-- navbar-brand home END -->

                    <button class="navbar-toggle" data-toggle="collapse" data-target="#navigation">

                        <span class="sr-only">Toggle Navigation</span>

                        <i class="fa fa-align-justify"></i>

                    </button>

                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#search">

                        <span class="sr-only">Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button>
                </div><!-- navbar-header END -->

                <div class="navbar-collapse collapse" id="navigation">    <!-- navbar-collapse collapse BEGIN -->

                    <div class="padding-nav">     <!--padding-nav BEGIN -->

                        <ul class="nav navbar-nav left">     <!--nav navbar-nav left BEGIN -->

                            <li>
                                <a href="../home.php">Home</a>
                            </li>
                            <li>
                                <a href="../shop.php">Shop</a>
                            </li>
                            <li class="active">
                                <a href="my_account.php">My Account</a>
                            </li>
                            <li>
                                <a href="../cart.php">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="../contact.php">Contact Us</a>
                            </li>

                        </ul>    <!-- nav navbar-nav left END -->

                    </div>    <!-- padding-nav END -->

                    <a href="../cart.php" class="btn navbar-btn btn-primary right">    <!-- btn navbar-btn btn-primary right BEGIN -->

                        <i class="fa fa-shopping-cart"></i>

                        <span><?php itemCount(); ?> Items In Your Cart </span>

                    </a>    <!-- btn navbar-btn btn-primary right END -->

                    <div class="navbar-collapse collapse right"> <!--navbar-collapse collapse right BEGIN-->

                        <button class="btn btn-primary navbar-btn" type="button" data-toggle="collapse" data-target="#search">    <!-- btn btn-primary navbar-btn BEGIN -->

                            <span class="sr-only"> Toggle Search</span>

                            <i class="fa fa-search"></i>

                        </button>    <!-- btn btn-primary navbar-btn END -->

                    </div>    <!--navbar-collapse collapse right END -->

                    <div class="collapse clearfix" id="search">    <!-- collapse clearfix BEGING -->

                        <form  method="get" action="results.php" class="navbar-form">    <!-- navbar-form BEGIN -->

                            <div class="input-group">    <!-- input-group BEGIN -->

                                <input type="text" placeholder="Search" name="user_query" required class="form-control">


                                <span class="input-group-btn">
                                <button type="submit" name="search"  value="Search" class="btn btn-primary">    <!-- btn btn-primary BEGIN -->

                                    <i class="fa fa-search"></i>

                                </button>    <!-- btn btn-primary END -->
                                </span>
                            </div>    <!-- input-group END -->

                        </form>    <!-- navbar-form END --> 

                    </div>    <!-- collapse clearfix END -->

                </div>    <!-- navbar-collapse collapse END -->

                

            </div>    <!-- container END -->

        </div>    <!-- navbar navbar-default END -->
     
        <div id="content">
            <div class="container">
                
                <div class="col-md-12">
                    
                        <ul class="breadcrumb">
                            <!-- <li><a href="../home.php">Home</a></li> -->
                            <li>My Account</li>

                        </ul>

                </div>
          
                <div class="col-md-3">
        
                    <?php
                        include("includes/sidebar.php");

                    ?>
                </div>

                <div class="col-md-9">
                    <div class="box">
                        <?php 
                        if (isset($_GET['my_orders'])) {
                            include("my_orders.php");
                        }
                        if (isset($_GET['pay_offline'])) {
                            include("pay_offline.php");
                        }
                            
                        if (isset($_GET['edit'])) {
                            include("edit.php");
                        }
                            
                        if (isset($_GET['change_password'])) {
                            include("change_password.php");
                        }
                        
                        if (isset($_GET['delete'])) {
                            include("delete.php");
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
<?php } ?>