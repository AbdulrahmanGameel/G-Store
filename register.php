<?php
$active='Register';
include("includes/header.php");
?>


    <div id="content">
        <div class="container">
            
            <div class="col-md-12">
                
                    <ul class="breadcrumb">
                        <li><a href="home.php">Home</a></li>
                        <li>Contact Us</li>

                    </ul>

            </div>



            
                <div class="col-md-3">
                    <div class="box">
                        <center>
                            <div class="box-header center-align">
                                <h2>customer Register</h2>
                            </div>
                            <p class="text-muted">Join our selected clientel and enjoy premium products!</p>
                        </center>

                        <form action="register.php" method="post" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control"required name="name">
                            </div>

                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="email"class="form-control"required name="email">
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control"required name="password">
                            </div>

                            <div class="form-group">
                                <label>Confirm password</label>
                                <input type="password" class="form-control"required name="confirmPassowrd">
                            </div>

                    

                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control"required name="country">
                            </div>


                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control"required name="city">
                            </div>


                            <div class="form-group">
                                <label>Contact</label>
                                <input type="text" class="form-control"required name="contact">
                            </div>


                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control"required name="address">
                            </div>

                            <div class="form-group">
                                <label>Profile Picture</label>
                                <input type="file" class="form-control"required name="pPic">
                            </div>

                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i> Register
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-9">
                    <img src="images\wallpaper.png" alt="bg" class="img-responsive" id="bg-img">
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

<?php 
if(isset($_POST['register'])){
    $name = $_POST['name'];
    
    $email = $_POST['email'];
    
    $password = $_POST['password'];
    
    $confirmPassowrd = $_POST['confirmPassowrd'];
    
    $country = $_POST['country'];
    
    $city = $_POST['city'];
    
    $contact = $_POST['contact'];
    
    $address = $_POST['address'];
    
    $pPic = $_POST['pPic'];
    
    $pPic_tmp = $_FILES['pPic']['tmp_name'];

    $ip = getRealIpUser();

    move_uploaded_file($pPic_tmp,"customer/customer_image/$pPic");

    $insert_customer = "INSERT INTO `customers`(`customer_name`, `customer_email`, `customer_password`, `customer_country`, `customer_city`, `customer_contact`, `customer_adress`, `customer_picture`, `costuemer_ip`)
    values                                   ('$name','$email','$password','$country','$city','$contact','$address','$pPic','$ip')";    
    $run_customer = mysqli_query($con,$insert_customer);

    $select_cart = "select * from cart where ip_add='$ip'";

    $run_cart = mysqli_query($con,$select_cart);

    $check_cart = mysqli_num_rows($run_cart);

    //if you have items in cart
    if($check_cart>0){
        $_SESSION['customer_email']=$email;

        echo "<script>alert('You have been registered successfully!')</script>";
        echo "<script>window.open('cart.php ','self')</script>";

    }else{
        $_SESSION['customer_email']=$email;

        echo "<script>alert('You have been registered successfully!')</script>";
        echo "<script>window.open('home.php ','self')</script>";

    }
}

?>