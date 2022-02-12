<div class="delete-account">

    <h2 class="mb-5"> Do You Realy Want To Delete Your Account ? </h2>

    <form action="" method="post">

        <input type="submit" name="Yes" value="Yes, I Want To Delete" class="btn btn-danger">

        <input type="submit" name="No" value="No, I Dont Want To Delete" class="btn btn-primary">

    </form>

</div>


<?php 

$c_email = $_SESSION['customer_email'];

if(isset($_POST['Yes'])){
    
    $delete_customer = "delete from customers where customer_email='$c_email'";
    
    $run_delete_customer = mysqli_query($db,$delete_customer);
    
    if($run_delete_customer){
        
        session_destroy();
        
        echo "<script>alert('Successfully delete your account')</script>";
        
        echo "<script>window.open('home.php','_self')</script>";
        
    }
    
}

if(isset($_POST['No'])){
    
    echo "<script>window.open('customer_account.php?my_orders','_self')</script>";
    
}

?>
