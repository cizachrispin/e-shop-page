<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("../functions/functions.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eco_shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-UA-compatible" content="IE=edge">

    <title>Eco_shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-UA-compatible" content="IE=edge">


    <!---style css-->
    <link rel="stylesheet" href="../styles/style.css">

    <!--bootstrap-->

    <link rel="stylesheet" href="../styles/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

</head>

<body>
    <!--------------------------head----------------------->
    <?php
		include('includes/header.php')
	?>

    <br>

    <div class="container-fluid">
        <div class="col-md-12 sm-12">
            <div class="customer_account">
                <div class="row">
                    <div class="col-md-3">
                        <?php
						include('includes/customer_sidebar.php')
						?>
                    </div>

                    <div class="col-md-9">
                        <!-----------------------------my order------------->
                        <div class="order">
                            <?php
                            
							if (isset($_GET['my_orders'])){
								include("my_orders.php");
							}
                    
							?>

                        </div>

                        <!---------------------- order detail ------------->
                        <div class="order_detail">

                            <?php
                            
							if (isset($_GET['order_details'])){
                                include("order_details.php");
								
							}
                    
							?>
                        </div>

                        <!---------------------- order detail ------------->
                        <div class="cancel_order">

                            <?php
                            
							if (isset($_GET['cancel_order'])){
                                include("cancel_order.php");
								
							}
                    
							?>
                        </div>

                        <!------------------------ edit account ------------->
                        <div class="editAccount">

                            <?php
                        
                            
							if (isset($_GET['edit_account'])){
                                include("edit_account.php");
								
							}
                    
							?>
                        </div>

                        <!--------------------- customer_profile ------------->
                        <div class="account">

                            <?php
                            
							if (isset($_GET['customer_profile'])){
                                include("customer_profile.php");
								
							}
                    
							?>
                        </div>

                        <!-------------------- Massages ------------->
                        <div class="massage">

                            <?php
                            
							if (isset($_GET['message'])){
                                include("massage.php");
								
							}
                    
							?>
                        </div>

                        <!------------------- chang password ------------->
                        <div class="massage">

                            <?php
                            
							if (isset($_GET['change_password'])){
                                include("change_password.php");
								
							}
                    
							?>
                        </div>

                        <!---------------------- Delete account ------------->
                        <div class="massage">

                            <?php
                            
							if (isset($_GET['delete_account'])){
                                include("delete_account.php");
								
							}
                    
							?>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-------------------------------footer-------------------------->


    <?php
		include('includes/footer.php')
	?>




    <script src="../js/jquery-331.min.js"></script>

    <script src="../js/popper.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>

</body>

</html>
<?php } ?>
