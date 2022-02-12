<?php 

session_start();

$active='Cart';
include("includes/db.php");
include("functions/functions.php");

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

    <!--bootstrap-->

    <link rel="stylesheet" href="styles/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">


</head>

<body>
    <!----------- head------------->

    <?php 

      include('includes/header.php')
    ?>

    <div class="container-fuid">
        <ul class="sub_header">

            <li><a href="home.php">Home</a></li>

            <li class="active">Cart</li>

        </ul>
    </div>

    <div class="container-fuid">
        <div class="cart">

            <?php 
                       
                $ip_add = getRealIpUser();
                       
                $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                $run_cart = mysqli_query($db,$select_cart);
                       
                $count = mysqli_num_rows($run_cart);
    
    
                if($count==0){
                        
                echo "
                    
                <div class='emptyCart'>
                    <div class='col-md-12 content'>
                        <img src='images/logo_images/shopping-cart.jpg'>
                        <h4 class='text-muted'>There Is No Item In Your Cart</h4>
                        <span><a href='products.php'>Start Shopping Now<a/></span>
                    </div>
                </div>

                ";
                        
               }else{            
                    
            ?>

            <div class="row">
                <div class="col-md-9">
                    <div class="cart-box">
                        <div class="cart-title">
                            <span class="pull-right">(<strong><?php items(); ?></strong>) items</span>
                            <h5 class="text-muted">Items in your cart</h5>
                        </div>

                        <div class="cart-content">
                            <div class="table-responsive">
                                <table class="table shoping-cart-table">
                                    <tbody>

                                        <?php 
                                   
                                            $total = 0;
                                   
                                            while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                            $pro_id = $row_cart['p_id'];
                                        
                                            $pro_size = $row_cart['size'];
                                       
                                            $pro_qty = $row_cart['qty_sold'];
                                       
                                            $get_products = "select * from products where product_id='$pro_id'";
                                       
                                            $run_products = mysqli_query($db,$get_products);
                                       
                                            while($row_products = mysqli_fetch_array($run_products)){
                                           
                                            $product_title = $row_products['product_title'];
                                           
                                            $product_img1 = $row_products['product_img1'];
                                           
                                            $product_price = $row_products['product_price'];
                                                
                                            $sale_price = $row_products['sale_price'];
                                           
                                            $sub_total = $row_products['sale_price']*$pro_qty;
                                           
                                            $total += $sub_total;
                                           
                                        ?>

                                        <tr>
                                            <td>
                                                <div>
                                                    <img class="img-responsive" src="images/product_images/<?php echo $product_img1; ?>" alt="Product 3a">
                                                </div>
                                            </td>

                                            <td class="desc">
                                                <h6>
                                                    <a href="detail.php?pro_id=<?php echo $pro_id; ?>">
                                                        <?php echo $product_title; ?>
                                                    </a>
                                                </h6>
                                                <h6 class="price">Ksh <?php echo $sale_price; ?> <span class="text-muted">Ksh<?php echo $product_price; ?></span></h6>

                                                <div class="m-t-sm">
                                                    <a href="#" class="text-muted"><i class="fa fa-gift"></i> Add gift package</a>
                                                    |
                                                    <a href="cart.php?delete_cart=<?php echo $pro_id; ?>" class="text-muted"><i class="fa fa-trash"></i> Remove item</a>

                                                </div>
                                            </td>

                                            <td>
                                                <div class="qty">
                                                    <input type="text" class="form-control-sm shadow-none" placeholder="<?php echo $pro_qty; ?>">
                                                </div>
                                            </td>

                                            <td>
                                                <div class="t-price">
                                                    <h6>Ksh <?php echo $sub_total; ?></h6>
                                                </div>
                                            </td>
                                        </tr>


                                        <?php } } ?>

                                    </tbody>
                                </table>
                            </div>

                        </div>


                        <div class="cart-btn">
                            <a href="products.php" class="continuebtn "><i class="fa fa-arrow-left"></i> Continue shopping</a>

                            <a href="checkout.php" class="checkoutbtn"><i class="fa fa fa-shopping-cart"></i> Proceed to chechout</a>

                        </div>
                    </div>

                </div>

                <div class="col-md-3">
                    <div class="cart-box">
                        <div class="cart-title">
                            <h5>Cart Summary</h5>
                        </div>
                        <div class="cart-Summary">
                            <span>
                                Total
                            </span>
                            <h4 class="font-bold">
                                <?php total_price(); ?>
                            </h4>

                            <hr>
                            <div class="table-responsive">
                                <table class="s-table">
                                    <tbody class="text-muted">
                                        <tr>
                                            <td>Shipping: </td>
                                            <th>ksh 0 </th>

                                        </tr>
                                        <tr>
                                            <td>Tax: </td>
                                            <th>ksh 0</th>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <br>


                            <div class="">
                                <a href="checkout.php" class="checkoutbtn"><i class="fa fa-shopping-cart"></i> Checkout</a>
                                <a href="products.php" class="cancelbtn"> Cancel</a>
                            </div>
                        </div>
                    </div>

                    <div class="cart-box">
                        <div class="cart-title">
                            <h5>Support</h5>
                        </div>
                        <div class="cart-content text-center">
                            <h6><i class="fa fa-phone"></i> +254 100 783 001</h6>
                            <span class="small">
                                Please contact with us if you have any questions. We are avalible 24h.
                            </span>
                        </div>
                    </div>


                </div>
            </div>

            <?php }; ?>
        </div>
    </div>

    <?php 

      include('includes/footer.php')
    ?>


    <script src="js/jquery-331.min.js"></script>

    <script src="js/popper.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

</body>

</html>


<?php
          
   if(isset($_GET['delete_cart'])){
            
   $ip_add = getRealIpUser();
        
   $delete_id = $_GET['delete_cart'];
        
   $delete_cart = "delete from cart where p_id='$delete_id'";
       
   $run_delete = mysqli_query($db,$delete_cart);
    
        if($run_delete){
            
            echo "<script>alert('One of your costumer order has been Deleted')</script>";
            
            echo "<script>window.open('cart.php','_self')</script>";
            
        }
        
    }
             
?>
