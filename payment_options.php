<div class="box"><!-- box Begin -->
    <?php

    $customer_email = $_SESSION['customer_email'];

    $select_customer= "select * from customers where customer_email='$customer_email'";

    $run_customer = mysqli_query($con,$select_customer);
    
    $customer = mysqli_fetch_array($run_customer);

    $customer_id = $customer['customer_id'];
    ?>
    <h1 class="text-center">Payment Options For You</h1>  
    
     <p class="lead text-center"><!-- lead text-center Begin -->
         
         <a class="btn btn-primary" href="order.php?customer_id=<?php echo $customer_id ?>">  Offline Payment </a>
         
     </p><!-- lead text-center Finish -->
     
     <center><!-- center Begin -->
         
        <p class="lead"><!-- lead Begin -->
            
            <a href="#" class="btn" disabled title="not implemented">
                
                Paypal Payment
                
                <img class="img-responsive" src="images/paypal.png" alt="img-paypal">
                
            </a>
            
        </p> <!-- lead Finish -->
         
     </center><!-- center Finish -->
    
</div><!-- box Finish -->