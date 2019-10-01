<?php
$active='Shop';
include("includes/header.php");
?>

<div id="content">
    <div class="container">
        
        <div class="col-md-12">
            
                <ul class="breadcrumb">
                    
                    <li><a href="home.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    
                </ul>

        </div>
        
        <div class="col-md-3">

            <?php
                include"includes/sidebar.php"
            ?>

        </div>

        <!-- shop title div -->
        <div class="col-md-9">
            <?php 
            if (!isset($_GET['p_cat'])) {
                # code...
                if (!isset($_GET['cat'])) {
                    # code...
                    echo "
                    <div class='box'>
                        <h1>Shop</h1>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                            Eligendi, quae pariatur facere aliquam obcaecati corrupti 
                        </p>
                    </div>
                    ";
                }
            }
            ?>
            
            <!-- products div -->
            <div class="row">                        

            <?php 
                if (!isset($_GET['p_cat'])) {
                    # code...
                    if (!isset($_GET['cat'])) {
                        $per_page=6;
                        if(isset($_GET['page'])){
                            $page=$_GET['page'];
                        }
                        else{
                            $page=1;
                        }
                            $start_from = ($page-1) * $per_page;
                            
                                                    
                            getProducts($start_from,$per_page);
                            
        
                       
                     
                   
                
            ?>
        
                

            </div>

            <center>
                   <ul class="pagination"><!-- pagination Begin -->
					 <?php
                             
                    $query = "select * from products";
                             
                    $result = mysqli_query($con,$query);
                             
                    $total_records = mysqli_num_rows($result);
                             
                    $total_pages = ceil($total_records / $per_page);
                             
                        echo "
                        
                            <li>
                            
                                <a href='shop.php?page=1'> ".'First Page'." </a>
                            
                            </li>
                        
                        ";
                             
                        for($i=1; $i<=$total_pages; $i++){
                            
                              echo "
                        
                            <li>
                            
                                <a href='shop.php?page=".$i."'> ".$i." </a>
                            
                            </li>
                        
                        ";  
                            
                        };
                             
                        echo "
                        
                            <li>
                            
                                <a href='shop.php?page=$total_pages'> ".'Last Page'." </a>
                            
                            </li>
                        
                        ";
                             
					    	}
							
						}
					 
					 ?> 
                       
                   </ul><!-- pagination Finish -->
               </center>
                
                <?php getpcatpro();
                    getCatsPro();
                ?>  
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
