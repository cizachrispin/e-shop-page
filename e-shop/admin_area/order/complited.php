<?php

 if(isset($_GET['complited'])){
        
$shipped_id = $_GET['complited'];
    
$shipped = "select * from customer_orders where order_id='$shipped_id'";
        
$run_shipped = mysqli_query($db,$shipped);
        
$row_shipped = mysqli_fetch_array($run_shipped);
     
$order_id = $row_shipped['order_id'];
     
$customer_id = $row_shipped['customer_id'];
                
$due_amount = $row_shipped['due_amount'];
                
$invoice_no = $row_shipped['invoice_no'];
        
$qty = $row_shipped['qty_sold'];
                
$size = $row_shipped['size'];
                
$prod_title = $row_shipped['product_title'];
                                           
$prod_img1 = $row_shipped['product_img1'];
     
$order_date = substr($row_shipped['order_date'],0,11);
                
$order_status = $row_shipped['order_status'];
        
$payment_method = $row_shipped['payment_method'];
        
$delivery_method = $row_shipped['delivery_method'];    
     
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


<div class="detail-order">
    <div class="title">
        <span class=""><button name="b_print" type="button" class="ipt" onClick="printdiv('div_print');"><i class="fa fa-print" aria-hidden="true" style="font-size: 17px;"></i> Print</button></span>
    </div>

    <div class="body" id="div_print">
        <div class="order_content">
            <form action="" method="post">
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
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> Invoice No </th>
                                <th> Image </th>
                                <th> Product </th>
                                <th> Price </th>
                                <th> Qautity </th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td><?php echo $invoice_no; ?></td>
                                <td width="30"> <img src="../images/product_images/<?php echo $prod_img1; ?>" width="60" height="60"></td>
                                <td width="380"> <?php echo $prod_title; ?> </td>
                                <td> KSH <?php echo $due_amount; ?></td>
                                <td><?php echo $qty; ?></td>


                            </tr>

                        </tbody>

                    </table>
                </div>



                <input type="submit" name="deliverd" class="btn btn-primary" value="Deliverd">
                <input type="submit" name="returned" class="btn btn-primary" value="Returned">
                <input type="submit" name="deliveryFailed" class="btn btn-primary" value="Delivery Failed">
            </form>
        </div>

    </div>
</div>

<?php 
       if(isset($_POST['deliverd'])){            
          
        $order_status = 'Deliverd';
            
        $update_customer_order = "update customer_orders set order_status='$order_status' where order_id='$shipped_id'";
                        
        $run_customer_order = mysqli_query($db,$update_customer_order);  
               
        
        echo "<script>alert('completed order')</script>";
                            
        echo "<script>window.open('index.php?view_orders','_self')</script>";
        
    
       }
    
?>

<?php 
       if(isset($_POST['returned'])){            
          
        $order_status = 'Returned';
            
        $update_customer_order = "update customer_orders set order_status='$order_status' where order_id='$shipped_id'";
                        
        $run_customer_order = mysqli_query($db,$update_customer_order);  
               
        
        echo "<script>alert('completed order')</script>";
                            
        echo "<script>window.open('index.php?view_orders','_self')</script>";
        
    
       }
    
?>

<?php 
       if(isset($_POST['deliveryFailed'])){            
          
        $order_status = 'Delivery Failed';
            
        $update_customer_order = "update customer_orders set order_status='$order_status' where order_id='$shipped_id'";
                        
        $run_customer_order = mysqli_query($db,$update_customer_order);  
               
        
        echo "<script>alert('completed order')</script>";
                            
        echo "<script>window.open('index.php?view_orders','_self')</script>";
        
    
       }
    
?>


<?php } ?>
