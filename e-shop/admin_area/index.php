<?php 

    session_start();
    include("includes/db.php");
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{
        
        $admin_session = $_SESSION['admin_email'];
        
        $get_admin = "select * from admins where admin_email='$admin_session'";
        
        $run_admin = mysqli_query($db,$get_admin);
        
        $row_admin = mysqli_fetch_array($run_admin);
        
        $admin_id = $row_admin['admin_id'];
        
        $admin_name = $row_admin['admin_name'];
        
        $admin_email = $row_admin['admin_email'];
        
        $admin_image = $row_admin['admin_image'];
        
        $admin_country = $row_admin['admin_country'];
        
        $admin_about = $row_admin['admin_about'];
        
        $admin_contact = $row_admin['admin_contact'];
        
        $admin_job = $row_admin['admin_job'];
        
        $get_products = "select * from products";
        
        $run_products = mysqli_query($db,$get_products);
        
        $count_products = mysqli_num_rows($run_products);
        
        $get_customers = "select * from customers";
        
        $run_customers = mysqli_query($db,$get_customers);
        
        $count_customers = mysqli_num_rows($run_customers);
        
        $get_p_categories = "select * from product_categories";
        
        $run_p_categories = mysqli_query($db,$get_p_categories);
        
        $count_p_categories = mysqli_num_rows($run_p_categories);
        
        $get_pending_orders = "select * from customer_orders where order_status = 'pending order'";
        
        $run_pending_orders = mysqli_query($db,$get_pending_orders);
        
        $count_pending_orders = mysqli_num_rows($run_pending_orders);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M-Dev Store Admin Area</title>
    <link rel="stylesheet" href="css/bootstrap-337.min.css">
    <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/script.js"></script>
</head>

<body>

    <div id="wrapper">
        <!-- #wrapper begin -->

        <?php include("includes/sidebar.php"); ?>

        <div id="page-wrapper">
            <!-- #page-wrapper begin -->
            <div class="container-fluid">
                <!-- container-fluid begin -->

                <?php
                
                    if(isset($_GET['dashboard'])){
                        
                        include("dashboard.php");
                        
                }   if(isset($_GET['insert_product'])){
                        
                        include("product/insert_product.php");
                        
                }   if(isset($_GET['view_products'])){
                        
                        include("product/view_products.php");
                        
                }   if(isset($_GET['delete_product'])){
                        
                        include("product/delete_product.php");
                        
                }   if(isset($_GET['edit_product'])){
                        
                        include("product/edit_product.php");
                        
                }   if(isset($_GET['insert_p_cat'])){
                        
                        include("p_category/insert_p_cat.php");
                        
                }   if(isset($_GET['view_p_cats'])){
                        
                        include("p_category/view_p_cats.php");
                        
                }   if(isset($_GET['delete_p_cat'])){
                        
                        include("p_category/delete_p_cat.php");
                        
                }   if(isset($_GET['edit_p_cat'])){
                        
                        include("p_category/edit_p_cat.php");
                        
                }   if(isset($_GET['insert_cat'])){
                        
                        include("category/insert_cat.php");
                        
                }   if(isset($_GET['view_cats'])){
                        
                        include("category/view_cats.php");
                        
                }   if(isset($_GET['edit_cat'])){
                        
                        include("category/edit_cat.php");
                        
                }   if(isset($_GET['delete_cat'])){
                        
                        include("category/delete_cat.php");
                        
                }   if(isset($_GET['insert_slide'])){
                        
                        include("slide/insert_slide.php");
                        
                }   if(isset($_GET['view_slides'])){
                        
                        include("slide/view_slides.php");
                        
                }   if(isset($_GET['delete_slide'])){
                        
                        include("slide/delete_slide.php");
                        
                }   if(isset($_GET['edit_slide'])){
                        
                        include("slide/edit_slide.php");
                        
                }   if(isset($_GET['insert_box'])){
                        
                        include("box/insert_box.php");
                        
                }   if(isset($_GET['view_boxes'])){
                        
                        include("box/view_boxes.php");
                        
                }   if(isset($_GET['delete_box'])){
                        
                        include("box/delete_box.php");
                        
                }   if(isset($_GET['edit_box'])){
                        
                        include("box/edit_box.php");
                        
                }   if(isset($_GET['view_customers'])){
                        
                        include("customer/view_customers.php");
                        
                }   if(isset($_GET['delete_customer'])){
                        
                        include("customer/delete_customer.php");
                        
                }   if(isset($_GET['view_orders'])){
                        
                        include("order/view_orders.php");
                        
                }   if(isset($_GET['delete_order'])){
                        
                        include("order/delete_order.php");
                        
                }   if(isset($_GET['order_details'])){
                        
                        include("order/order_details.php");
                        
                }   if(isset($_GET['ready_to_ship'])){
                        
                        include("order/ready_to_ship.php");
                        
                }   if(isset($_GET['complited'])){
                        
                        include("order/complited.php");        
                        
                }   if(isset($_GET['view_payments'])){
                        
                        include("view_payments.php");
                        
                }   if(isset($_GET['delete_payment'])){
                        
                        include("delete_payment.php");
                        
                }   if(isset($_GET['view_users'])){
                        
                        include("user/view_users.php");
                        
                }   if(isset($_GET['delete_user'])){
                        
                        include("user/delete_user.php");
                        
                }   if(isset($_GET['insert_user'])){
                        
                        include("user/insert_user.php");
                        
                }   if(isset($_GET['user_profile'])){
                        
                        include("user/user_profile.php");
                        
                }   if(isset($_GET['insert_terms'])){
                        
                        include("term/insert_terms.php");
                        
                }   if(isset($_GET['view_terms'])){
                        
                        include("term/view_terms.php");
                        
                }   if(isset($_GET['delete_term'])){
                        
                        include("term/delete_term.php");
                        
                }   if(isset($_GET['edit_term'])){
                        
                        include("term/edit_term.php");
                        
                }   if(isset($_GET['edit_css'])){
                        
                        include("edit_css.php");
                        
                }   if(isset($_GET['insert_manufacturer'])){
                        
                        include("manufacturer/insert_manufacturer.php");
                        
                }   if(isset($_GET['view_manufacturers'])){
                        
                        include("manufacturer/view_manufacturers.php");
                        
                }   if(isset($_GET['delete_manufacturer'])){
                        
                        include("manufacturer/delete_manufacturer.php");
                        
                }   if(isset($_GET['edit_manufacturer'])){
                        
                        include("manufacturer/edit_manufacturer.php");
                        
                }
        
                ?>

            </div>
        </div>
    </div>


    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
</body>

</html>


<?php } ?>
