<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">

                <i class="fa fa-dashboard"></i> Dashboard / View Costumers

            </li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">

                    <thead>
                        <tr>
                            <th> No </th>
                            <th> Name </th>
                            <th> E-Mail </th>
                            <th> Address </th>
                            <th> Contact </th>
                            <th> Actions </th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php 
          
                                $i=0;
                            
                                $get_c = "select * from customers";
                                
                                $run_c = mysqli_query($db,$get_c);
          
                                while($row_c=mysqli_fetch_array($run_c)){
                                    
                                    $c_id = $row_c['customer_id'];
                                    
                                    $c_name = $row_c['customer_name'];
                                    
                                    $c_email = $row_c['customer_email'];
                                    
                                    $c_address = $row_c['customer_address'];
                                    
                                    $c_contact = $row_c['customer_contact'];
                                    
                                    $i++;
                            
                            ?>

                        <tr>
                            <td> <?php echo $i; ?> </td>
                            <td> <?php echo $c_name; ?> </td>
                            <td> <?php echo $c_email; ?> </td>
                            <td> <?php echo $c_address ?> </td>
                            <td> <?php echo $c_contact ?> </td>

                            <td width="120">
                                <div class="action">
                                    <li><a href="# ">Details</a></li>
                                </div>

                                <div class="action">
                                    <li><a href="index.php?delete_customer=<?php echo $c_id; ?>"><i class="fa fa-trash-o"></i>
                                            Delete</a></li>
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

<?php } ?>
