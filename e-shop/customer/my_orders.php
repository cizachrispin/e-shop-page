<div class="my_order">
    <ul class="nav nav-tabs nav-justified mb-3">
        <li class="nav-item">
            <a data-toggle="tab" href="#order" class="nav-link active">
                Orders
            </a>
        </li>
        <li class="nav-item">
            <a data-toggle="tab" href="#Completed" class="nav-link">
                Completed
            </a>
        </li>
        <li class="nav-item">
            <a data-toggle="tab" href="#Cancelled" class="nav-link">
                Cancelled
            </a>
        </li>
    </ul>


    <div class="tab-content">
        <div class="tab-pane fade show active" id="order">
            <div class="order_content">
                <div class="table-responsive">
                    <table class="table order-table">
                        <tbody>
                            <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($db,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where customer_id='$customer_id'";
            
            $run_orders = mysqli_query($db,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty_sold'];
                
                $size = $row_orders['size'];
                
                $prod_title = $row_orders['product_title'];
                                           
                $prod_img1 = $row_orders['product_img1'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
            
            ?>

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

                                <td width="150">
                                    <div class="detail mb-3">
                                        <a href="customer_account.php?order_details=<?php echo $order_id?>">See Details <i class="fa fa-arrow-right"></i></a>
                                    </div>

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
        
                                         if($order_status != 'cancelled' and $order_status != 'shipped' and $order_status != 'Returned' ){ 
                                       
                                          echo"

                                               <a href='customer_account.php?cancel_order= $order_id' class='cancel'> Cancel</a>
                                    
                                              ";
                                       
                                          }

                                      ?>

                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="tab-pane fade show" id="Completed">
            <div class="order_content">
                <div class="table-responsive">
                    <table class="table order-table">
                        <tbody>

                            <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($db,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where order_status='deliverd'";
            
            $run_orders = mysqli_query($db,$get_orders);
                            
            $count = mysqli_num_rows($run_orders);
              
             $i = 0;
             
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty_sold'];
                
                $size = $row_orders['size'];
                
                $prod_title = $row_orders['product_title'];
                                           
                $prod_img1 = $row_orders['product_img1'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
            
            ?>

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

                                <td width="120">
                                    <div class="text-muted mb-2"><?php echo $order_date; ?> </div>
                                    <a href="customer_account.php?order_details=<?php echo $order_id?>" class="detail"> See Details</a>
                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>

        <div class="tab-pane fade show" id="Cancelled">
            <div class="order_content">
                <div class="table-responsive">
                    <table class="table order-table">
                        <tbody>
                            <?php 
            
            $customer_session = $_SESSION['customer_email'];
            
            $get_customer = "select * from customers where customer_email='$customer_session'";
            
            $run_customer = mysqli_query($db,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $customer_id = $row_customer['customer_id'];
            
            $get_orders = "select * from customer_orders where order_status='cancelled'";
            
            $run_orders = mysqli_query($db,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){
                
                $order_id = $row_orders['order_id'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_no = $row_orders['invoice_no'];
                
                $qty = $row_orders['qty_sold'];
                
                $size = $row_orders['size'];
                
                $prod_title = $row_orders['product_title'];
                                           
                $prod_img1 = $row_orders['product_img1'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
            ?>

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

                                <td width="120">
                                    <div class="text-muted mb-2"><?php echo $order_date; ?> </div>
                                    <div class="detail ">
                                        <a href="customer_account.php?order_details=<?php echo $order_id?>"> Details <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </td>
                            </tr>

                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>



</div>
