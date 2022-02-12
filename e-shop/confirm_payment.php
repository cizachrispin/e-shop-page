<?php 

session_start();

if(!isset($_SESSION['customer_email'])){
    
    echo "<script>window.open('checkout.php','_self')</script>";
    
}else{

include("includes/db.php");
include("functions/functions.php");
    
if(isset($_GET['order_id'])){
    
    $order_id = $_GET['order_id'];
    
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eco_shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-UA-compatible" content="IE=edge">


    <!---style css-->
    <link rel="stylesheet" href="styles/style.css">

    <!--bootstrap--

    <link rel="stylesheet" href="styles/bootstrap.min.css">-->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



</head>

<body>
    <br>
    <div class="container-fluid">
        <div class="customer_account">
            <div class="row">
                <div class="col-md-3">
                    <?php
						include('includes/sidebar.php')
						?>
                </div>

                <div class="col-md-9">
                    <div class="myaccount-box">
                        <h6 class="text-uppercase"> Please Confirm Your Payment</h6>
                        <hr>

                        <form action="confirm.php?update_id=<?php echo $order_id;  ?>" method="post" enctype="multipart/form-data">
                            <!-- form Begin -->

                            <div class="form-group">
                                <label> Invoice No:</label>

                                <input type="text" class="form-control" name="invoice_no" required>
                            </div>

                            <div class="form-group">
                                <label> Amount send:</label>

                                <input type="text" class="form-control" name="Amount send" required>
                            </div>

                            <div class="form-group">
                                <label>Select Payment Method:</label>

                                <select name="payment_mode" class="form-control">

                                    <option value=""> Select Payment Mode</option>
                                    <option value=""> Back code</option>
                                    <option value=""> Easy Paisa</option>
                                    <option value=""> Western Union</option>
                                    <option value="">M-pesa</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label> Transation / Reference ID:</label>

                                <input type="text" class="form-control" name="ref_no" required>
                            </div>

                            <div class="form-group">
                                <label> Omni Paisa / East Paisa:</label>

                                <input type="text" class="form-control" name="Code" required>
                            </div>

                            <div class="form-group">
                                <label> Payment Data:</label>

                                <input type="text" class="form-control" name="data" required>
                            </div>

                            <div class="text-center">
                                <span>Amount Paid: KSH 300</span>

                                <button class="btn btn-primary">
                                    <i class="fa fa-user-md"></i> Confirm Payment
                                </button>
                            </div>
                        </form>

                        <?php 
                   
                    if(isset($_POST['confirm_payment'])){
                        
                        $update_id = $_GET['update_id'];
                        
                        $invoice_no = $_POST['invoice_no'];
                        
                        $amount = $_POST['amount_sent'];
                        
                        $payment_mode = $_POST['payment_mode'];
                        
                        $ref_no = $_POST['ref_no'];
                        
                        $code = $_POST['code'];
                        
                        $payment_date = $_POST['date'];
                        
                        $complete = "Complete";
                        
                        $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";
                        
                        $run_payment = mysqli_query($db,$insert_payment);
                        
                        $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_customer_order = mysqli_query($db,$update_customer_order);
                        
                        $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";
                        
                        $run_pending_order = mysqli_query($db,$update_pending_order);
                        
                        if($run_pending_order){
                            
                            echo "<script>alert('Thank You for purchasing, your orders will be completed within 24 hours work')</script>";
                            
                            echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                            
                        }
                        
                    }
                   
                   ?>



                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php
		include('includes/footer.php')
	?>




    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>


    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384 J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>

</html>
<?php } ?>
