 <?php 
    
    $session_email = $_SESSION['customer_email'];
    
    $select_customer = "select * from customers where customer_email='$session_email'";
    
    $run_customer = mysqli_query($db,$select_customer);
    
    $row_customer = mysqli_fetch_array($run_customer);
    
    $customer_id = $row_customer['customer_id'];

    $customer_name = $row_customer['customer_name'];

    $customer_email = $row_customer['customer_email'];

    $customer_contact = $row_customer['customer_contact'];

    $customer_address = $row_customer['customer_address'];

    
    
    ?>

 <div class="container">
     <div class="col-md-12 col-12">
         <div class="payment_option">
             <div class="row">
                 <div class="checkout col-md-8 col-12">
                     <h5 class="text-muted">Checkout</h5>
                     <div class="box">
                         <div class="box-title">
                             <h6>Customer Details</h6>
                         </div>
                         <div class="box-body text-muted">
                             <li>Name: <?php echo $customer_name?></li>
                             <li>Email: <?php echo $customer_email?></li>
                             <li>Phone: <?php echo $customer_contact?></li>
                             <li>Address: <?php echo $customer_address?></li>
                         </div>
                     </div>

                     <form action="customer/order.php?c_id=<?php echo $customer_id ?>" id="my-form" method="post" enctype="multipart/form-data">
                         <div class="box">
                             <div class="box-title">
                                 <h6>Delivery method</h6>
                             </div>
                             <div class="box-body">
                                 <div class="radio">
                                     <input type="radio" id="" name="delivery_method" value="Pickup" required>
                                     <label for="">Pickup from the shop</label><br>
                                     <div class="txt">
                                         <label class="text-muted">Get your order items from our shop "address for the shop"</label>
                                     </div>

                                 </div>
                                 <div class="radio">
                                     <input type="radio" id="" name="delivery_method" value="Deliver home/ofice" required>
                                     <label for="">Delivery to your home or office</label><br>
                                     <div class="txt">
                                         <label class="text-muted">We will deliver to your home/office.</label>
                                         <li><a href="#">Add Delivery Address</a></li>
                                     </div>

                                 </div>
                                 <div class="radio">
                                     <input type="radio" id="" name="delivery_method" value="Send as parcel" disabled required>
                                     <label for="">Send as parcel</label>
                                     <div class="txt">
                                         <label class="text-muted">
                                             Your order items will be sent via public transport as a parcel
                                         </label>
                                     </div>

                                 </div>
                             </div>

                         </div>

                         <div class="box">
                             <div class="box-title">
                                 <h6>Payment Method</h6>
                             </div>
                             <div class="box-body">
                                 <div class="radio">
                                     <input type="radio" id="p" name="payment_method" value="Pay On Delivery" required>
                                     <label for="">Pay On Delivery</label><br>
                                     <div class="txt"><label class="text text-muted">Pay at your doorstep / pick up station</label></div><br>
                                 </div>
                                 <div class="radio">
                                     <input type="radio" id="d" name="payment_method" value="Pay online" disabled required>
                                     <label for=""><img src="images/logo_images/paymentM.png" alt="" style="height: 60px; width:220px"> </label><br>
                                     <div class="txt">
                                         <label class="text-muted">Your security, our priority. You keep control of every transaction and are protected against fraud and stealth.</label>
                                     </div>

                                 </div>
                             </div>
                         </div>
                     </form>
                 </div>

                 <div class="ordersummary col-md-4 col-12">
                     <h5 class="text-muted">Order Summary</h5>
                     <div class="box">
                         <div class="box-title">
                             <h6> Your Order</h6>
                         </div>

                         <div class="box-body">
                             <div class="content">
                                 <?php
    
                            $ip_add = getRealIpUser();
           
                            $select_cart = "select * from cart where ip_add='$ip_add'";
                       
                            $run_cart = mysqli_query($db,$select_cart);
           
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
                                           
                            $only_price = $row_products['product_price'];
                                
                            $sale_price = $row_products['sale_price'];
                                           
                            $sub_total = $row_products['sale_price']*$pro_qty;
                                           
                            $total += $sub_total;

                          ?>
                                 <div class="table-responsive">
                                     <table class="table-product">
                                         <tr>
                                             <td><img class="img-responsive" src="images/product_images/<?php echo $product_img1; ?>" alt="Product 3a"></td>

                                             <td><?php echo $product_title; ?><br>
                                                 <div class="price">
                                                     <span class="text-muted">
                                                         (<?php echo "$pro_qty x $sale_price ";?>) </span>
                                                     Ksh <?php echo $sub_total; ?>
                                                 </div>
                                             </td>

                                         </tr>

                                     </table>

                                 </div>

                                 <?php } } ?>

                                 <div class="table-responsive">
                                     <table class="table">
                                         <tbody>
                                             <tr>
                                                 <td>sub-total</td>
                                                 <th>Ksh <?php echo $total; ?></th>
                                             </tr>
                                             <tr>
                                                 <td>Shipping and Handling</td>
                                                 <th>ksh 0 </th>

                                             </tr>
                                             <tr>
                                                 <td>Tax</td>
                                                 <th>ksh 0</th>
                                             </tr>
                                             <tr class="Total">
                                                 <td>Total</td>
                                                 <th><?php total_price(); ?></th>
                                             </tr>

                                         </tbody>
                                     </table>
                                 </div>

                                 <a href="cart.php">Edit Cart</a>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-md-8 col-12 box-btn">
                     <input class="button" form="my-form" name="submit" value="SUBMIT YOUR ORDER" type="submit" />
                 </div>

             </div>
         </div>
     </div>
 </div>
