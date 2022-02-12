 <form action="checkout.php" method="post" enctype="multipart/form-data" class="login-form">

     <h4 class="card-title text-center">Login</h4>

     <div class="col-12 sm-6 form-group input-group">
         <input name="c_email" class="form-control-sm" placeholder="Email address" type="text" required>
     </div>


     <div class="col-12 sm-6 form-group input-group">
         <input name="c_pass" type="password" class="form-control-sm" placeholder="Password" required>
     </div>

     <div class="col-12 sm-6">
         <input type="checkbox"><small>Remember me</small>
         <p class="text-right"><a href="#">Forget Password</a></p>
     </div>

     <div class=" col-md-12" style="text-align:center">
         <div class="createAccount-btn">
             <button type="submit" name="login" class="btn btn-warning "><i class="fa fa-sign-in"></i> Login </button>
         </div>

         <article class="card-body mx-auto" style="">
             <p class="divider-text">
                 <span class="bg-light">OR</span>
             </p>

             <p>
                 <a href="" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i> Login with facebook</a>
             </p>
         </article>

         <p class="text-center mt-0 ">Don't have an Acount..<a href="register.php" style="color:orange">Register</a> </p>
     </div>

 </form>


 <?php 

if(isset($_POST['login'])){
    
    $customer_email = $_POST['c_email'];
    
    $customer_pass = $_POST['c_pass'];
    
    $select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    
    $run_customer = mysqli_query($db,$select_customer);
    
    $get_ip = getRealIpUser();
    
    $check_customer = mysqli_num_rows($run_customer);
    
    $select_cart = "select * from cart where ip_add='$get_ip'";
    
    $run_cart = mysqli_query($db,$select_cart);
    
    $check_cart = mysqli_num_rows($run_cart);
    
    if($check_customer==0){
        
        echo "<script>alert('Your email or password is wrong')</script>";
        
        exit();
        
    }
    
    if($check_customer==1 ){
        
        $_SESSION['customer_email']=$customer_email;
        
       echo "
       
       <div class='alert alert-success' role='alert'>
          <strong>Welcome!</strong>
      </div>
       
       ";
        
        
       echo "<script> window.open('home.php', '_self')</script>";
        
    }
    
}

?>
