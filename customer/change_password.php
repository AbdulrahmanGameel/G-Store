
<?php 
       
       $customer_session = $_SESSION['customer_email'];

       $get_customer = "select * from customers where customer_email = '$customer_session'";
       
       $run_customer = mysqli_query($con, $get_customer);

       $customer_id = $customer['customer_id'];

       $customer = mysqli_fetch_array($run_customer);

       $orig_password = $customer['customer_password'];
       
?>


<center>
        <h1>Change Password</h1>
</center>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Old Password</label>
        <input type="password" class="form-control" name="old_password">
    </div>
    <div class="form-group">
        <label>New Password</label>
        <input type="password" class="form-control" name="new_password">
    </div>

    <div class="form-group">
        <label>Confirm New Password</label>
        <input type="password" class="form-control" name="confirm_passowrd">
    </div>

    <div class="text-center">
        <button type="submit" name="change_password" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Change Password
        </button>
    </div>
</form>

<?php 

if(isset($_POST['change_password'])){
    
    $old_password = $_POST['old_password'];
    
    $new_password = $_POST['new_password'];
    
    $confirm_passowrd = $_POST['confirm_passowrd'];

    if($old_password == $orig_password ){

        if($confirm_passowrd == $new_password)
        {
            $update = "UPDATE `customers` SET `customer_password`='$new_password' WHERE `customer_id`='$customer_id' ";

            $query = mysqli_query($con,$update);

            if($query){
                echo "<script>alert( 'User password has been updated!' )</script>";
                echo "<script> window.open( 'my_account.php?my_orders','_self' )</script>";
        
            }
        }
        else{
            echo "<script>alert( 'passwords dont match' )</script>";
        }

    }
    else{
        echo "<script>alert( 'wrong password' )</script>";
    }
}

?>