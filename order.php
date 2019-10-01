<?php 

include("includes/db.php");
include("functions/functions.php");

?>

<?php
if(isset($_GET['customer_id'])){
    $customer_id = $_GET['customer_id'];

}

$ip_add = getRealIpUser();

$status = "Pending";

$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add = '$ip_add'";

$run_cart = mysqli_query($con, $select_cart);

while($cart = mysqli_fetch_array($run_cart)){

    $product_id = $cart['p_id'];

    $product_qty = $cart['qty'];

    $product_size = $cart['size'];

    $get_product = "select * from products where product_id='$product_id'";

    $run_product = mysqli_query($con, $get_product);
    
    while($product = mysqli_fetch_array($run_product)){
        $product_price = $product['product_price'];

        $subtotal = $product_price * $product_qty;
    
        $insert_customer_order="INSERT INTO customer_orders (`customer_id`, `due_amount`, `invoice_no`, `qty`, `size`, `order_date`, `order_status`) 
        VALUES ('$customer_id', '$subtotal', $invoice_no, '$product_qty', '$product_size', NOW(), '$status')";
    
        $run_customer_order= mysqli_query($con,$insert_customer_order);
    
        $insert_pending_order= "INSERT INTO pending_orders ( `customer_id`, `invoice_no`, `product_id`, `qty`, `size`, `order_status`) 
        VALUES ('$customer_id', $invoice_no,'$product_id','$product_qty','$product_size','$status')";
    
        $run_pending_order= mysqli_query($con,$insert_pending_order);
    
        $delete_cart = "DELETE FROM `cart` WHERE ip_add ='$ip_add'";
    
        $run_delete = mysqli_query($con,$delete_cart);
    
            echo "<script>alert('Your orders has been submitted, Thanks')</script>";
            //echo $insert_customer_order;
            
            echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }

   
}





?>