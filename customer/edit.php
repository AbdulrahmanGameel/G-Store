
<?php 
       
       $customer_session = $_SESSION['customer_email'];

       $get_customer = "select * from customers where customer_email = '$customer_session'";
       
       $run_customer = mysqli_query($con, $get_customer);

       $customer = mysqli_fetch_array($run_customer);

       $name = $customer['customer_name'];
       
       $image = $customer['customer_image'];
       
       $customer_id = $customer['customer_id'];

       $email = $customer['customer_email'];
       
       $password = $customer['customer_password'];
       
       $country = $customer['customer_country'];
       
       $city = $customer['customer_city'];
       
       $contact = $customer['customer_contact'];
       
       $address = $customer['customer_adress'];

?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label>Name</label>
        <input type="text" class="form-control" value="<?php echo $name; ?>" name="name" required >
    </div>

    <div class="form-group">
        <label>E-Mail</label>
        <input type="email"class="form-control" value="<?php echo $email; ?>" name="email" required >
    </div>

    <div class="form-group">
        <label>Country</label>
        <input type="text" class="form-control" value="<?php echo $country; ?>" name="country" required  >
    </div>


    <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" value="<?php echo $city; ?>" name="city" required >
    </div>


    <div class="form-group">
        <label>Contact</label>
        <input type="text" class="form-control" value="<?php echo $contact; ?>" name="contact" required >
    </div>


    <div class="form-group">
        <label>Adress</label>
        <input type="text" class="form-control" value="<?php echo $address; ?>" name="address" required >
    </div>

    <div class="form-group">
        <label>Profile  Picture</label>
        <input type="file" class="form-control" value="<?php echo 'customer_images/$image'; ?>" name="image" required >        
    </div>
            <div class="img-responsive img-thumbnail">
                <img src="customer_images/<?php echo $image;?>" alt="<?php $image?>">
            </div>

    <div class="text-center">
        <button type="submit" name="update" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Update
        </button>
    </div>
</form>


<?php 

if(isset($_POST['update'])){

    $name = $_POST['name'];

    $email = $_POST['email'];

    $country = $_POST['country'];

    $city = $_POST['city'];

    $contact = $_POST['contact'];

    $address = $_POST['address'];

    $image = $_FILES['image']['name'];

    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp, "customer_images/$image");

    $update = "UPDATE `customers` SET
    `customer_name`='$name',`customer_email`='$email',`customer_country`='$country',`customer_city`='$city',`customer_contact`='$contact',
    `customer_adress`='$address',`customer_image`='$image' WHERE `customer_id`='$customer_id'";

    $query = mysqli_query($con,$update);

    if($query){
        echo "<script>alert( 'User data have been updated!' )</script>";
        echo "<script> window.open( 'my_account.php?my_orders','_self' )</script>";

    }

}

?>