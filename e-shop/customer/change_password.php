<div class="change_password">
    <h6 class="text-uppercase">change your password</h6>
    <hr>

    <div class="account-form">

        <form action="" method="post">

            <div class="form-group row ">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Current password: </label>
                <div class="col-sm-6">
                    <input type="password" class="form-control shadow-none" name="old_pass" required>
                </div>
            </div>

            <div class="form-group row ">
                <label for="inputPassword3" class="col-sm-3 col-form-label">New password: </label>
                <div class="col-sm-6">
                    <input type="password" class="form-control shadow-none" name="new_pass" required>
                </div>
            </div>

            <div class="form-group row ">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Confirm password: </label>
                <div class="col-sm-6">
                    <input type="password" class="form-control shadow-none" name="new_pass_again" required>
                </div>
            </div>


            <div class="submit-btn mt-5 text-center">
                <button name="submit" type="submit" class="btn btn-warning "> submit </button>
            </div>

        </form>

    </div>
</div>


<?php 

if(isset($_POST['submit'])){
    
    $c_email = $_SESSION['customer_email'];
    
    $c_old_pass = $_POST['old_pass'];
    
    $c_new_pass = $_POST['new_pass'];
    
    //$c_new_pass = md5($password); //this will encrypt the password
    
    $c_new_pass_again = $_POST['new_pass_again'];
    
    $sel_c_old_pass = "select * from customers where customer_pass='$c_old_pass'";
    
    $run_c_old_pass = mysqli_query($db,$sel_c_old_pass);
    
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    
    if($check_c_old_pass==0){
        
        echo "<script>alert('Sorry, your current password did not valid. Please try again')</script>";
        
        exit();
        
    }
    
    if($c_new_pass!=$c_new_pass_again){
        
        echo "<script>alert('Sorry, your new password did not match')</script>";
        
        exit();
        
    }
    
    $update_c_pass = "update customers set customer_pass='$c_new_pass' where customer_email='$c_email'";
    
    $run_c_pass = mysqli_query($db,$update_c_pass);
    
    if($run_c_pass){
        
        echo "<script>alert('Your password has been updated')</script>";
        
        echo "<script>window.open('customer_account.php?customer_profile','_self')</script>";
        
    }
    
}

?>
