<?php 

$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($db,$get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];


?>


<div class="edit_account">
    <h6 class="text-uppercase">Edit account</h6>
    <hr>

    <div class="account-form">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group row ">
                <label for="inputFistname" class="col-sm-2 col-form-label"> Name: </label>
                <div class="col-sm-9">
                    <input type="text" name="c_name" class="form-control shadow-none" value="<?php echo $customer_name; ?>" required>
                </div>
            </div>

            <div class="form-group row ">
                <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                <div class="col-sm-9">
                    <input type="text" name="c_email" class="form-control shadow-none" value="<?php echo $customer_email; ?>" required>
                </div>
            </div>

            <div class="form-group row ">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Phone: </label>
                <div class="col-sm-9">
                    <input type="text" name="c_contact" class="form-control" value="<?php echo $customer_contact; ?>" required>
                </div>
            </div>

            <div class="form-group row ">
                <label for="inputLastname" class="col-sm-2 col-form-label">Address: </label>
                <div class="col-sm-9">
                    <input type="text" name="c_address" class="form-control" value="<?php echo $customer_address; ?>" required>
                </div>
            </div>

            <div class="submit-btn mt-5 text-center">
                <button name="update" class="btn btn-warning "> submit </button>
            </div>

        </form>

    </div>
</div>

<?php 

if(isset($_POST['update'])){
    
    $update_id = $customer_id;
    
    $c_name = $_POST['c_name'];
    
    $c_email = $_POST['c_email'];
    
    $c_address = $_POST['c_address'];
    
    $c_contact = $_POST['c_contact'];
    
    $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_address='$c_address',customer_contact='$c_contact' where customer_id='$update_id' ";
    
    $run_customer = mysqli_query($db,$update_customer);
    
    if($run_customer){
        
        echo "<script>alert('Your account has been edited, to complete the process, please Relogin')</script>";
        
        echo "<script>window.open('logout.php','_self')</script>";
        
    }
    
}
