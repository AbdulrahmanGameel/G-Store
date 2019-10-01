<?php
$active='Contact Us';
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

                <div class="col-md-12">
                    <div class="box">
                        <center>
                            <div class="box-header center-align">
                                <h2>Feel Free to Contact us</h2>
                            </div>
                            <p class="text-muted">if you have any questions feel free to contact us anytime, <strong>our customer service is 24/7</strong></p>
                        </center>

                        <form action="contact.php" method="post">

                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control"required name="name">
                            </div>

                            <div class="form-group">
                                <label>E-Mail</label>
                                <input type="text" class="form-control"required name="email">
                            </div>

                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control"required name="subject">
                            </div>

                            <div class="form-group">
                                <label>Message</label>
                                <textarea type="text" class="form-control"required name="message"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" name="sendMessage" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i>           Send Message
                                </button>
                            </div>
                        </form>

                        <?php 
                        if(isset($_POST['sendMessage'])){
                            $sender_name = $_POST['name'];
                            
                            $sender_email = $_POST['email'];

                            $sender_subject = $_POST['subject'];

                            $sender_message = $_POST['message'];

                            $receiver_email = "A.RahmanGameel@gmail.com";

                            mail($receiver_email,$sender_name,$sender_subject,$sender_message,$sender_email);

                            $email = $_POST['email'];

                            $subject = "welcome to my website";

                            $msg = "Thanks for sending us a message, we will get back to you ASAP. Please be patient.";

                            $from = "A.RahmanGameel@gmail.com";

                            mail($email,$subject,$msg,$from);
                            echo "<h2> Your message was sent successfully</h2>";
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