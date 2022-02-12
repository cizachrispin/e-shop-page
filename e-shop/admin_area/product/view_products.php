<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active">View Products</li>
            <li class=""><a href="index.php?insert_product"> Insert Product </a></li>
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
                            <th> Product </th>
                            <th> Image </th>
                            <th> Price </th>
                            <th> sale Price </th>
                            <th> Qautity </th>
                            <th> Date </th>
                            <th> Actions </th>
                            <th> Status </th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php 
          
                                $i=0;
                            
                                $get_pro = "select * from products";
                                
                                $run_pro = mysqli_query($db,$get_pro);
          
                                while($row_pro=mysqli_fetch_array($run_pro)){
                                    
                                    $pro_id = $row_pro['product_id'];
                                    
                                    $pro_title = $row_pro['product_title'];
                                    
                                    $pro_img1 = $row_pro['product_img1'];
                                    
                                    $pro_price = $row_pro['product_price'];
                                    
                                    $sale_price = $row_pro['sale_price'];
                                    
                                    $pro_qty = $row_pro['product_qty'];
                                    
                                    $pro_date = $row_pro['date'];
                                    
                                    $i++;
                            
                            ?>

                        <tr>
                            <td width="380"> <?php echo $pro_title; ?> </td>
                            <td width="30"> <img src="../images/product_images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
                            <td> KSH <?php echo $pro_price; ?></td>
                            <td> KSH <?php echo $sale_price; ?></td>
                            <td width="110">

                                <?php
                                    if($pro_qty !== 'Out Of Stock'){
                                    echo "$pro_qty";
                                        
                                    }else{
                                        
                                        echo " <div class ='out_of_stock'> $pro_qty</div>  
                                        
                                        ";
                                        
                                    }
                                ?>

                            </td>
                            <td width="100"> <?php echo $pro_date ?> </td>

                            <td width="120">
                                <div class="action">
                                    <li><a href="index.php?edit_product=<?php echo $pro_id; ?>"><i class="fa fa-pencil"></i> Edit Details</a></li>
                                </div>

                                <div class="action">
                                    <li><a href="index.php?delete_product=<?php echo $pro_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></li>
                                </div>
                            </td>
                            <td width="100">

                                <div class="btn-group" id="status" data-toggle="buttons">
                                    <label class="btn btn-default btn-on btn-xs active">
                                        <input type="radio" value="1" name="multifeatured_module[module_id][status]" checked="checked">ON
                                    </label>

                                    <label class="btn btn-default btn-off btn-xs ">
                                        <input type="radio" value="0" name="multifeatured_module[module_id][status]">OFF
                                    </label>
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

<script type="text/javascript">



</script>
