<?php

if(isset($_GET['cancel_order'])){
        
$cancel_order_id = $_GET['cancel_order'];
    
$cancel_order = "select * from customer_orders where order_id='$cancel_order_id'";
        
$run_cancel_order = mysqli_query($db,$cancel_order);
        
$row_cancel_order = mysqli_fetch_array($run_cancel_order);
     
$order_id = $row_cancel_order['order_id'];
     
$customer_id = $row_cancel_order['customer_id'];
                
$due_amount = $row_cancel_order['due_amount'];
                
$invoice_no = $row_cancel_order['invoice_no'];
        
$qty_sold = $row_cancel_order['qty_sold'];
                
$size = $row_cancel_order['size'];
                
$prod_title = $row_cancel_order['product_title'];
                                           
$prod_img1 = $row_cancel_order['product_img1'];
     
$order_date = substr($row_cancel_order['order_date'],0,11);
                
$order_status = $row_cancel_order['order_status'];
        
$payment_method = $row_cancel_order['payment_method'];
        
$delivery_method = $row_cancel_order['delivery_method'];
      
              
?>


<div class="detail-order">
    <div class="title">
        <a href="customer_account.php?my_orders"><i class="fa fa-arrow-left"></i> </a>
        <span class="text-muted">Details</span>
    </div>

    <div class="body">
        <div class="order_content">
            <div class="order-description">
                <div class="box">
                    <h5>PAYMENT INFORMATION</h5>
                    <div>
                        <h6>Payment Method</h6>
                        <span class="text-muted"><?php echo "$payment_method"?></span>
                    </div>
                    <div>
                        <h6>Payment Details</h6>
                        <li class="text-muted">Price: <?php echo " $due_amount"?></li>
                        <li class="text-muted">Shipping Fees: 0</li>
                        <li class="text-muted">Total:<?php echo " $due_amount"?></li>
                    </div>

                </div>
                <div class="box">
                    <h5>DELIVERY INFORMATION</h5>
                    <div>
                        <h6>Delivery Method</h6>
                        <span class="text-muted"><?php echo "$delivery_method"?></span>
                    </div>
                    <div>
                        <h6>Payment Details</h6>
                        <li class="text-muted">Price: <?php echo "$payment_method"?></li>
                        <li class="text-muted">Shipping Fees: <?php echo "$payment_method"?></li>
                        <li class="text-muted">Total:<?php echo "$payment_method"?></li>
                    </div>

                </div>
            </div>

            <form action="" method="post">

                <div class="table-responsive">
                    <table class="table order-table">
                        <tbody>

                            <tr>
                                <td>
                                    <div>
                                        <img class="img-responsive" src="../images/product_images/<?php echo $prod_img1; ?>" alt="Product 3a">
                                    </div>
                                </td>

                                <td class="desc">
                                    <h6>
                                        <a href="detail.php?pro_id=<?php echo $pro_id; ?>">
                                            <?php echo $prod_title; ?>
                                        </a>
                                    </h6>
                                    <span class="text-muted">invoice no: <?php echo $invoice_no; ?></span>
                                    <h6 class="price">Ksh <?php echo $due_amount; ?></h6>
                                    <div class="">
                                        <label for="" class="text-muted">Reason</label>
                                        <textarea name="reason" class="form-control shadow-none" required></textarea>
                                    </div>
                                </td>

                                <td width="90">
                                    <div class="text-muted">Qty: <?php echo $qty_sold; ?></div>
                                </td>

                                <td width="120">
                                    <div class="text-muted mb-2"><?php echo $order_date; ?> </div>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <input type="submit" name="cancel" class="btn btn-primary" value="Cancel Order">

            </form>

        </div>
    </div>
</div>



<?php 
                   
    if(isset($_POST['cancel'])){
        
        $reason = $_POST['reason'];
        
        $order_status = 'cancelled';
            
        
        $insert_cancel_order = "insert into cancel_order (order_id,customer_id,invoice_no,product_title,qty_sold,size,reason,order_status) values ('$order_id','$customer_id','$invoice_no ','$prod_title','$qty_sold','$size','$reason','$order_status')";
        
        
        if(mysqli_query($db, $insert_cancel_order)){
            
        $update_customer_order = "update customer_orders set order_status='$order_status' where order_id='$cancel_order_id'";
                        
        $run_customer_order = mysqli_query($db,$update_customer_order);
            
        
        $update_product = "update products set product_qty='$product_qty' where product_id='$order_id'";
        
        $run_product = mysqli_query($db,$update_product);
                
        
        echo "<script>alert('your order has been canceled')</script>";
                            
        echo "<script>window.open('customer_account.php?my_orders','_self')</script>";
        
    }
        
    }
        
    
?>


<?php } ?>
