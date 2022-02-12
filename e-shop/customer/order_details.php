<?php 

    if(isset($_GET['order_details'])){
        
        $order_details_id = $_GET['order_details'];
        
        $order_details = "select * from customer_orders where order_id='$order_details_id'";
        
        $run_order_details = mysqli_query($db,$order_details);
        
        $row_order_details = mysqli_fetch_array($run_order_details);
        
        $order_id = $row_order_details['order_id'];
                
        $due_amount = $row_order_details['due_amount'];
                
        $invoice_no = $row_order_details['invoice_no'];
        
        $qty = $row_order_details['qty_sold'];
                
        $size = $row_order_details['size'];
                
        $prod_title = $row_order_details['product_title'];
                                           
        $prod_img1 = $row_order_details['product_img1'];
                
        $order_date = substr($row_order_details['order_date'],0,11);
                
        $order_status = $row_order_details['order_status'];
        
        $payment_method = $row_order_details['payment_method'];
        
        $delivery_method = $row_order_details['delivery_method'];
        
    }

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

                                <div class="m-t-sm">
                                    <li class="pending text-muted"><?php echo $order_status; ?></li>

                                </div>
                            </td>

                            <td width="90">
                                <div class="text-muted">Qty: <?php echo $qty; ?></div>
                            </td>

                            <td width="135">
                                <div class="text-muted mb-2"><?php echo $order_date; ?> </div>

                                <div class=" mb-3">

                                    <?php
                
                                             if($order_status == 'pending order'){ 
                                       
                                             echo"

                                                  <a href='' class='pay_now'> Pay Now</a>
                                    
                                                ";
                                       
                                              }
                                        
                                         ?>

                                </div>

                                <?php
        
                                         if($order_status != 'cancelled'){ 
                                       
                                          echo"

                                               <a href='customer_account.php?cancel_order= $order_id' class='cancel'> Cancel</a>
                                    
                                              ";
                                       
                                          }

                                      ?>

                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
