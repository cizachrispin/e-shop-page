<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> Dashboard </h1>

        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard

            </li>
        </ol>

    </div>

</div>

<!----------------Dashboad------------------>

<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-tasks fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_products; ?> </div>

                        <div> Products </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_products">

                <div class="panel-footer">


                    <span class="pull-left">

                        View Details
                    </span>

                    <span class="pull-right">

                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-users fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_customers; ?> </div>

                        <div> Customers </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_customers">
                <div class="panel-footer">

                    <span class="pull-left">
                        View Details
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-orange">

            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-tags fa-5x"></i>

                    </div>

                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_p_categories; ?> </div>

                        <div> Product Categories </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_p_cats">
                <div class="panel-footer">

                    <span class="pull-left">
                        View Details
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">

                        <i class="fa fa-shopping-cart fa-5x"></i>

                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"> <?php echo $count_pending_orders; ?> </div>

                        <div>New Orders </div>

                    </div>

                </div>
            </div>

            <a href="index.php?view_orders">
                <div class="panel-footer">

                    <span class="pull-left">
                        View Details
                    </span>

                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>

                    <div class="clearfix"></div>

                </div>
            </a>

        </div>
    </div>
</div>

<!----------------new order------------------>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"></i> New Orders

                </h3>
            </div>

            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped table-bordered">

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
                                    
                                    $qty_sold = $row_order['qty_sold'];
                                    
                                    $size = $row_order['size'];
                                    
                                    $order_date = $row_order['order_date'];
                                    
                                    $order_status = $row_order['order_status'];
                                    
                                    $i++;
                            
                            ?>

                            <tr>

                                <!--<td>

                                    <?php 
                                    
                                       /* $get_customer = "select * from customers where customer_id='$c_id'";
                                    
                                        $run_customer = mysqli_query($db,$get_customer);
                                    
                                        $row_customer = mysqli_fetch_array($run_customer);
                                    
                                        $customer_email = $row_customer['customer_email'];
                                    
                                        echo $customer_email;*/
                                    
                                    ?>

                                </td>-->
                                <td><a href="index.php?order_details=<?php echo $order_id; ?>"><?php echo $invoice_no; ?></a></td>
                                <td> <?php echo $product_title; ?> </td>
                                <td> <?php echo $order_date; ?> </td>
                                <td> <?php echo $qty_sold; ?> </td>
                                <td> <?php echo $size; ?> </td>
                                <td> <?php echo $order_status; ?></td>
                                <td width="150">
                                    <div class="action">
                                        <li><a href="index.php?ready_to_ship=<?php echo $order_id; ?>">Ready to shipp</a></li>
                                    </div>

                                    <div class="action">
                                        <li><a href="#">Cancel</a></li>
                                    </div>
                                </td>

                            </tr>

                            <?php } ?>

                        </tbody>

                    </table>
                </div>

                <div class="text-right">

                    <a href="index.php?view_orders">

                        View All Orders <i class="fa fa-arrow-circle-right"></i>

                    </a>

                </div>

            </div>

        </div>
    </div>

</div>


<?php } ?>
