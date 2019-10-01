<center>
    <h1>My Orders</h1>
    <p class="lead">Your orders in one place</p>
    <p class="text-muted">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque natus nesciunt omnis porro tempora ex cumque quisquam, eaque doloribus nulla impedit inventore dolores commodi? Reprehenderit corporis reiciendis at ab maxime!
    </p>
    
</center>
<hr>

<div class="table-responsive">
    <table class="table table-bordered table-hover">
        <thead>
            <th> ON: </th>
            <th> Due Amount: </th>
            <th> Invoice No: </th>
            <th> Qty: </th>
            <th> Size: </th>
            <th> Order Date: </th>
            <th> Paid / Unpaid: </th>
            <th> Status: </th>
        </thead>
        <tbody>
        <?php 
             
        $customer_session = $_SESSION['customer_email'];

        $get_customer = "select * from customers where customer_email = '$customer_session'";
        
        $run_customer = mysqli_query($con, $get_customer);

        $customer = mysqli_fetch_array($run_customer);

        $customer_id = $customer['customer_id'];

        
        $get_orders = "select * from customer_orders where customer_id = '$customer_id'";
        
        $run_orders = mysqli_query($con, $get_orders);

        $i=0;
        while($orders = mysqli_fetch_array($run_orders)){
            
            $order_id = $orders['order_id'];

            $order_amount = $orders['due_amount'];

            $invoice_no = $orders['invoice_no'];

            $qty = $orders['qty'];

            $size = $orders['size'];

            $order_date = substr($orders['order_date'],0,11);

            $order_status = $orders['order_status'];

            $i++;

             if(strtolower($order_status)=="pending"){
                $order_status = "Unpaid";
            }else{
                $order_status = "Paid";
            }
            
        ?>
        <tr>
            <th><?php echo $i; ?></th>


            <td><?php echo $order_amount; ?></td>
            <td><?php echo $invoice_no; ?></td>
            <td><?php echo $qty; ?></td>
            <td><?php echo $size; ?></td>
            <td><?php echo $order_date; ?></td>
            <td><?php echo $order_status; ?></td>
            
            <td> <a href="confirm.php?order_id=<?php echo $order_id; ?>" class="btn btn-primary" target="_blank"> Confirm Payment</a></td>
        </tr>




        </tbody>
        <?php
}    
?>
    </table>
</div>

