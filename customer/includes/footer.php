<div id="footer">

    <div class="container">
    
        <div class="row">
        
            <div class="col-sm-6 col-md-3">
                <h4>Pages</h4>
                <ul>
                
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                    <li><a href="../shop.php">Shop</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                
                </ul>

              
                

            
            
            </div>

            <div class="col-sm-6 col-md-3">
                <h4>Top Products Categories</h4>
                <ul>
                
                <?php

                    $get_p_cats ="select * from product_categories";
                    $run_p_cats = mysqli_query($con,$get_p_cats);

                    while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

                        # code...
                        $p_cat_id = $row_p_cats['p_cat_id'];
                        $p_cat_title = $row_p_cats['p_cat_title'];
                        echo"
                        <li>
                            <a href='shop.php?$p_cat_id'>
                            $p_cat_title
                            </a>
                        </li>
                        ";
                    }
                ?>
                </ul>
                
            </div>

            <div class="col-sm-6 col-md-3">
                <h4>Find Us</h4>
               
                <p>

                    <strong>G-DEV Media Inc.</strong>
                    <br>Egypt
                    <br>Cairo
                    <br>+20-010*****343
                    <br>A.RahmanGameel@gmail.com
                    <br><strong>Mr. G</strong>
                    <br><a href="contact.php">Checkout our contact page</a>
                        
                </p>
                
            </div>

            <div class="col-sm-6 col-md-3">
                
                <h4>Get The News</h4>
               
                <p class="text-muted">Don't miss our latest update</p>
                
                <form action="" method="post">

                    <div class="input-group">

                        <input type="text" class="form-control" name="email">

                        <span class="input-group-btn">

                            <input type="button" value="subscribe" class="btn btn-default">

                        </span>

                    </div>

                </form>

                
                <h4>Keep In Touch</h4>

                <p class="social">

                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-google-plus"></a>
                    <a href="#" class="fa fa-envelope"></a>
                    
                </p>

            </div>


        </div>

        
    </div>

</div>

<div id="copyright">

    <div class="container">

        <div class="col-md-6">

            <p class="pull-left">&copy; 2019 G-Dev Store All Rights Reserved</p>

        </div>

        <div class="col-md-6">

            <p class="pull-right">&copy;Theme by: <a href="#">Mr G.</a></p>

        </div>

    </div>
    
</div>