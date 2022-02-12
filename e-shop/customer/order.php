<?php 

include("includes/db.php");
include("../functions/functions.php");

?>
<?php 

if(isset($_GET['c_id'])){
    
    $customer_id = $_GET['c_id'];
    
}

$payment = $_POST['payment_method'];
    
$delivery = $_POST['delivery_method'];

$ip_add = getRealIpUser();

$status = "pending order";

$invoice_no = mt_rand();

$select_cart = "select * from cart where ip_add='$ip_add'";

$run_cart = mysqli_query($db,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    
    $pro_id = $row_cart['p_id'];
    
    $qty_sold = $row_cart['qty_sold'];
    
    $pro_size = $row_cart['size'];
    
    $get_products = "select * from products where product_id='$pro_id'";
    
    $run_products = mysqli_query($db,$get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $prod_title = $row_products['product_title'];
                                           
        $prod_img1 = $row_products['product_img1'];
        
        $sub_total = $row_products['sale_price']*$qty_sold;
        
        $product_qty = $row_products['product_qty']-$qty_sold;
        
        $out_of_stock = 'Out Of Stock';
        
        $insert_customer_order = "insert into customer_orders (customer_id,due_amount,invoice_no,delivery_method,payment_method,product_title,product_img1,qty_sold,size,order_date,order_status) values ('$customer_id','$sub_total','$invoice_no','$delivery','$payment','$prod_title','$prod_img1','$qty_sold','$pro_size',NOW(),'$status')";
        
        $run_customer_order = mysqli_query($db,$insert_customer_order);
        
        
        if($product_qty == 0){
            
        $update_product = "update products set product_qty='$out_of_stock' where product_id='$pro_id'";
        
        $run_product = mysqli_query($db,$update_product);  
            
        }else{
        
        $update_product = "update products set product_qty='$product_qty' where product_id='$pro_id'";
        
        $run_product = mysqli_query($db,$update_product);
            
        }
        
        $delete_cart = "delete from cart where ip_add='$ip_add'";
        
        $run_delete = mysqli_query($db,$delete_cart);
        
        echo "<script>alert('Your orders has been submitted, Thanks')</script>";
        
        
        echo "<script>window.open('customer_account.php?my_orders','_self')</script>";
        
    }
    
}

?>
