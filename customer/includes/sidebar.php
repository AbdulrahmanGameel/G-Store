<div class="panel panel-default sidebar-menu"><!--  panel panel-default sidebar-menu Begin  -->
    
    <div class="panel-heading"><!--  panel-heading  Begin  -->

            
       <?php 
       
       $customer_session = $_SESSION['customer_email'];

       $get_customer = "select * from customers where customer_email = '$customer_session'";
       
       $run_customer = mysqli_query($con, $get_customer);

       $customer = mysqli_fetch_array($run_customer);

       $customer_name = $customer['customer_name'];
       
       $customer_image = $customer['customer_image'];

       if(!isset($_SESSION['customer_email'])){
          
       }else{
        echo 
        "
        <center> 
            <img class = 'img-responsive' src = 'customer_images/$customer_image' alt ='$customer_image'>
        </center>
        
        <br>

        <h3 class = 'panel-title' align='center' > 
             Name: $customer_name
        </h3>

        ";
       }

       ?>
    </div>
    <div class="panel-body"><!--  panel-body Begin  -->
        
        <ul class="nav-pills nav-stacked nav"><!--  nav-pills nav-stacked nav Begin  -->
            
            <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                
                <a href="my_account.php?my_orders">
                    
                    <i class="fa fa-list"></i> My Orders
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['pay_offline'])){ echo "active"; } ?>">
                
                <a href="my_account.php?pay_offline">
                    
                    <i class="fa fa-bolt"></i> Pay Offline
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['edit'])){ echo "active"; } ?>">
                
                <a href="my_account.php?edit">
                    
                    <i class="fa fa-pencil"></i> Edit Account
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['change_password'])){ echo "active"; } ?>">
                
                <a href="my_account.php?change_password">
                    
                    <i class="fa fa-user"></i> Change Password
                    
                </a>
                
            </li>
            
            <li class="<?php if(isset($_GET['delete'])){ echo "active"; } ?>">
                
                <a href="my_account.php?delete">
                    
                    <i class="fa fa-trash-o"></i> Delete Account
                    
                </a>
                
            </li>
            
            <li>
                
                <a href="logout.php">
                    
                    <i class="fa fa-sign-out"></i> Log Out
                    
                </a>
                
            </li>
            
        </ul><!--  nav-pills nav-stacked nav Begin  -->
        
    </div><!--  panel-body Finish  -->
    
</div><!--  panel panel-default sidebar-menu Finish  -->