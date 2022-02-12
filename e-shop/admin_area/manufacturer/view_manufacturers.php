<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class="active"> View manufacturer </li>
            <li class=""><a href="index.php?insert_manufacturer"> Insert manufacturer </a></li>
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
                            <th> ID: </th>
                            <th> Manufacturer Title </th>
                            <th> category Title </th>
                            <th> Manufacturer Image </th>
                            <th> Actions </th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php 
          
                                $i=0;
                            
                                $get_manufacturer = "select * from manufacturers";
                                
                                $run_manufacturer = mysqli_query($db,$get_manufacturer);
          
                                while($row_manufacturer=mysqli_fetch_array($run_manufacturer)){
                                    
                                    $manufacturer_id = $row_manufacturer['manufacturer_id'];
                                    
                                    $manufacturer_title = $row_manufacturer['manufacturer_title'];
                                    
                                    $cat_title = $row_manufacturer['cat_title'];
                                    
                                    $manufacturer_image = $row_manufacturer['manufacturer_image'];
                                    
                                    $i++;
                            
                            ?>

                        <tr>
                            <td> <?php echo $manufacturer_id; ?> </td>
                            <td> <?php echo $manufacturer_title; ?> </td>
                            <td> <?php echo $cat_title; ?> </td>
                            <td> <img src="../images/other_images/<?php echo $manufacturer_image; ?>" width="60" height="60"></td>

                            <td width="120">
                                <div class="action">
                                    <li><a href="index.php?edit_manufacturer=<?php echo $manufacturer_id; ?>"><i class="fa fa-pencil"></i> Edit Details</a></li>
                                </div>

                                <div class="action">
                                    <li><a href="index.php?delete_manufacturer=<?php echo $manufacturer_id; ?>"><i class="fa fa-trash-o"></i>
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
