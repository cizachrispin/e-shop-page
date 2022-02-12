<?php

    session_start();

    $active='Account';
    include("functions/functions.php");

?>


<!DOCTYPE html>
<html>

<head>
    <title>Eco_shop</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!--bootstrap-->
    <link rel="stylesheet" href="styles/bootstrap.min.css">

    <!---style css-->
    <link rel="stylesheet" href="styles/style.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


</head>

<body>

    <div class="container-fluid">
        <form action="register.php" method="post" enctype="multipart/form-data" class="register-form">
            <h4 class="card-title text-center">Create Account</h4>
            <div class="row">

                <div class=" col-md-6 col-12 sm-6 form-group input-group">

                    <input name="customer_name" class="form-control-sm" placeholder="Your Name" type="text" required>
                </div>


                <div class="col-md-6 col-12 sm-6 form-group input-group">

                    <input name="customer_email" class="form-control-sm" placeholder="Email address" type="text" required>
                </div>


                <div class="col-md-6 col-12 sm-6 form-group input-group">

                    <input name="customer_pass" type="password" class="form-control-sm" id="inputPassword" placeholder="Create Password" required>
                </div>

                <div class="col-md-6 col-12 sm-6 form-group input-group">

                    <input name="customer_contact" class="form-control-sm" placeholder="Phone number" type="text" required>
                </div>

                <div class="col-md-6 col-12 sm-6 form-group input-group">

                    <input name="customer_address" class="form-control-sm" placeholder="Your Address" type="text" required>
                </div>


                <div class=" col-md-12" style="text-align:center">
                    <div class="createAccount-btn">
                        <button type="submit" name="register" class="btn btn-warning "><i class="fa fa-user-md"></i> Register </button>
                    </div>

                    <article class="card-body mx-auto" style="">
                        <p class="divider-text">
                            <span class="bg-light">OR</span>
                        </p>

                        <p>
                            <a href="" class="btn btn-block btn-facebook"> <i class="fa fa-facebook-f"></i>  Register with facebook</a>
                        </p>
                    </article>

                    <p class="text-center ">Have an account? <a href="checkout.php" style="color:orange">LOGIN</a> </p>
                </div>

            </div>
        </form>

    </div>



    <script src="js/jquery-331.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

</body>

</html>




<?php



if(isset($_POST['register'])){
    
    $customer_name = $_POST['customer_name'];
    
    $customer_email = $_POST['customer_email'];
    
    $customer_pass = $_POST['customer_pass'];
    
    $customer_contact = $_POST['customer_contact'];
    
    $customer_address = $_POST['customer_address'];
    
    $customer_ip = getRealIpUser();
    
    

    
    //check db for existing user same email
   
    
  
     
    //register the user if no error
    
  
        
    $password = md5($password); //this will encrypt the password
        
    $insert_customer = "insert into customers(customer_name,customer_email,customer_pass,customer_contact,customer_address,customer_ip) values ('$customer_name','$customer_email','$customer_pass','$customer_contact','$customer_address','$customer_ip')";
    
    $run_customer = mysqli_query($db,$insert_customer);
    
    
    $sel_cart = "select * from cart where ip_add='$customer_ip'";
    
    $run_cart = mysqli_query($db,$sel_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_cart>0){
        
        $_SESSION['customer_email']=$customer_email;
        
        echo " <script>alert('you have been registed sucessfully')</script> ";
        
        echo " <script>window.open('checkout.php','_self')</script> ";
        
    }else{
         
        
        $_SESSION['customer_email']=$customer_email;
        
        echo " <script>alert('you have been registed sucessfully')</script> ";
        
        echo " <script>window.open('home.php','_self')</script> ";
    }
    
}
?>
