<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>


<script language="javascript">
    function printdiv(printpage) {
        var headstr = "<html><head><title></title></head><body>";
        var footstr = "</body>";
        var newstr = document.all.item(printpage).innerHTML;
        var oldstr = document.body.innerHTML;
        document.body.innerHTML = headstr + newstr + footstr;
        window.print();
        document.body.innerHTML = oldstr;
        return false;
    }

</script>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / View Orders

            </li>

            <span class="pull-right"><button name="b_print" type="button" class="ipt" onClick="printdiv('div_print');"><i class="fa fa-print" aria-hidden="true" style="font-size: 17px;"></i> Print</button></span>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12" id="div_print">
        <div class="panel_order_title">
            <ul class="nav nav-pills">
                <li class="nav-item active">
                    <a data-toggle="tab" href="#all" class="nav-link active">
                        All
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#Pending" class="nav-link">
                        <?php 
                          $get_order = "select * from customer_orders where order_status = 'pending order' order by 1 DESC LIMIT 0,5";
                          $run_order = mysqli_query($db,$get_order);   
                          $count_order = mysqli_num_rows($run_order);
        
                          if($count_order==0){
                              echo"Pending";
                          }else{
                              
                              echo" <span class='count'>$count_order</span>"." "."Pending";
                              
                          }
                                    
                         ?>
                    </a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" href="#Readytoship" class="nav-link">
                        <?php 
                          $get_order = "select * from customer_orders where order_status = 'shipped' order by 1 DESC LIMIT 0,5";
                          $run_order = mysqli_query($db,$get_order);   
                          $count = mysqli_num_rows($run_order);
        
                          if($count==0){
                              echo"Shipped";
                          }else{
                              
                              echo"<span class='count'>$count</span>"." "."Shipped";
                              
                          }
                                    
                         ?>

                    </a>
                </li>
                <li class="nav-item item dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="Completed">Completed
                        <span class="caret"></span></a>

                    <ul class="dropdown-menu">
                        <a data-toggle="tab" role="tab" href="#delivered">Delivered</a>
                        <a data-toggle="tab" role="tab" href="#cancelled">Cancelled</a>
                        <a data-toggle="tab" role="tab" href="#Returned">Returned</a>
                        <a data-toggle="tab" role="tab" href="#DeliveryFailed">Delivery Failed</a>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="all">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> Invoice No </th>
                                <th> Order Date </th>
                                <th> Product </th>
                                <th> Qty </th>
                                <th> Price </th>
                                <th> Status </th>
                                <th> Actions </th>
                            </tr>
                        </thead>

                        <tbody>

                            <?php 
          
                                $i=0;
                            
                                $get_orders = "select * from customer_orders";
                                
                                $run_orders = mysqli_query($db,$get_orders);
          
                                while($row_order=mysqli_fetch_array($run_orders)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $customer_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_title = $row_order['product_title'];
                                    
                                    $qty = $row_order['qty_sold'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $get_customer = "select * from customers where customer_id='$customer_id'";
                                    
                                    $run_customer = mysqli_query($db,$get_customer);
                                    
                                    $row_customer = mysqli_fetch_array($run_customer);
                                    
                                    $customer_email = $row_customer['customer_email'];
                                    
                                    $get_c_order = "select * from customer_orders where customer_id='$customer_id'";
                                    
                                    $run_c_order = mysqli_query($db,$get_c_order);
                                    
                                    $row_c_order = mysqli_fetch_array($run_c_order);
                                    
                                    $order_date = $row_c_order['order_date'];
                                    
                                    $order_amount = $row_c_order['due_amount'];
                                    
                                    $i++;
                            
                            ?>

                            <tr>
                                <td><a href="index.php?order_details=<?php echo $order_id; ?>"><?php echo $invoice_no; ?></a></td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $qty; ?></td>
                                <td> <?php echo $order_amount; ?> </td>
                                <td> <?php echo $order_status; ?></td>
                                <td>
                                    <?php
                
                                        if($order_status == 'pending order'){ 
                                       
                                             echo"
                                             <div class='action'>
                                                <li><a href='#'>Ready to ship</a></li>
                                                <li><a href='#'>Cansel</a></li>
                                             </div>
                                    
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

            <div class="tab-pane" id="Pending">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th> Invoice No </th>
                                <th> Product </th>
                                <th> Date </th>
                                <th> Qty </th>
                                <th> Size </th>
                                <th> Status </th>
                                <th> Action </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php 
                          
                                $i=0;
          
                                $get_order = "select * from customer_orders where order_status = 'pending order' order by 1 DESC LIMIT 0,5";
          
                                $run_order = mysqli_query($db,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_title = $row_order['product_title'];
                                    
                                    $qty = $row_order['qty_sold'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_date = $row_order['order_date'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $count_order = mysqli_num_rows($run_order);
                                    
                                    $i++;
                                    
                                    if($count_order==0){
                                        echo"No data available";
                                        
                                    }else{
                            
                            ?>

                            <tr>
                                <td><a href="index.php?order_details=<?php echo $order_id; ?>"><?php echo $invoice_no; ?></a></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_status; ?></td>
                                <td>
                                    <div class="action">
                                        <li><a href="index.php?ready_to_ship=<?php echo $order_id; ?>">Ready to shipp</a></li>
                                    </div>
                                </td>

                            </tr>

                            <?php } }?>

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="tab-pane" id="Readytoship">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Invoice No </th>
                                <th> Product </th>
                                <th> Date </th>
                                <th> Qty </th>
                                <th> Size </th>
                                <th> Status </th>
                                <th> Action </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php 
                          
                                $i=0;
          
                                $get_order = "select * from customer_orders where order_status = 'shipped' order by 1 DESC LIMIT 0,5";
          
                                $run_order = mysqli_query($db,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_title = $row_order['product_title'];
                                    
                                    $qty = $row_order['qty_sold'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_date = $row_order['order_date'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $count_order = mysqli_num_rows($run_order);
                                    
                                    $i++;
                             
                            ?>

                            <tr>
                                <td><a href="index.php?order_details=<?php echo $order_id; ?>"><?php echo $invoice_no; ?></a></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_status; ?></td>
                                <td> <a href="index.php?complited=<?php echo $order_id; ?>">Complited</a></td>

                            </tr>


                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="delivered">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Invoice No </th>
                                <th> Product </th>
                                <th> Date </th>
                                <th> Qty </th>
                                <th> Size </th>
                                <th> Status </th>
                                <th> Action </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php 
                          
                                $i=0;
          
                                $get_order = "select * from customer_orders where order_status = 'delivered' order by 1 DESC LIMIT 0,5";
          
                                $run_order = mysqli_query($db,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_title = $row_order['product_title'];
                                    
                                    $qty = $row_order['qty_sold'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_date = $row_order['order_date'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $i++;
                                    
                            ?>

                            <tr>
                                <td><a href="index.php?order_details=<?php echo $order_id; ?>"><?php echo $invoice_no; ?></a></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_status; ?></td>
                                <td>
                                    <a href="index.php?delete_order=<?php echo $order_id; ?>">Details</a>
                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="tab-pane" id="cancelled">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Invoice No </th>
                                <th> Product </th>
                                <th> Date </th>
                                <th> Qty </th>
                                <th> Size </th>
                                <th> Status </th>
                                <th> Action </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php 
                          
                                $i=0;
          
                                $get_order = "select * from customer_orders where order_status = 'cancelled' order by 1 DESC LIMIT 0,5";
          
                                $run_order = mysqli_query($db,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_title = $row_order['product_title'];
                                    
                                    $qty = $row_order['qty_sold'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_date = $row_order['order_date'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $i++;
                            
                            ?>

                            <tr>
                                <td><a href="index.php?order_details=<?php echo $order_id; ?>"><?php echo $invoice_no; ?></a></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_status; ?></td>
                                <td>
                                    <a href="index.php?order_details=<?php echo $order_id; ?>">Details</a>
                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="tab-pane" id="Returned">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Invoice No </th>
                                <th> Product </th>
                                <th> Date </th>
                                <th> Qty </th>
                                <th> Size </th>
                                <th> Status </th>
                                <th> Action </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php 
                          
                                $i=0;
          
                                $get_order = "select * from customer_orders where order_status = 'Returned' order by 1 DESC LIMIT 0,5";
          
                                $run_order = mysqli_query($db,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_title = $row_order['product_title'];
                                    
                                    $qty = $row_order['qty_sold'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_date = $row_order['order_date'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $i++;
                                    
                            ?>

                            <tr>
                                <td><a href="index.php?order_details=<?php echo $order_id; ?>"><?php echo $invoice_no; ?></a></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_status; ?></td>
                                <td>
                                    <a href="index.php?order_details=<?php echo $order_id; ?>">Details</a>
                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>
            </div>

            <div class="tab-pane" id="DeliveryFailed">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th> Invoice No </th>
                                <th> Product </th>
                                <th> Date </th>
                                <th> Qty </th>
                                <th> Size </th>
                                <th> Status </th>
                                <th> Action </th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php 
                          
                                $i=0;
          
                                $get_order = "select * from customer_orders where order_status = 'Delivery Failed' order by 1 DESC LIMIT 0,5";
          
                                $run_order = mysqli_query($db,$get_order);
          
                                while($row_order=mysqli_fetch_array($run_order)){
                                    
                                    $order_id = $row_order['order_id'];
                                    
                                    $c_id = $row_order['customer_id'];
                                    
                                    $invoice_no = $row_order['invoice_no'];
                                    
                                    $product_title = $row_order['product_title'];
                                    
                                    $qty = $row_order['qty_sold'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_date = $row_order['order_date'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $i++;
                                    
                            ?>

                            <tr>
                                <td><a href="index.php?order_details=<?php echo $order_id; ?>"><?php echo $invoice_no; ?></a></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $qty; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_status; ?></td>
                                <td>
                                    <a href="index.php?order_details=<?php echo $order_id; ?>">Details</a>
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

<?php } ?>
