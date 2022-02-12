<?php 
    
    if(!isset($_SESSION['admin_email'])){
        
        echo "<script>window.open('login.php','_self')</script>";
        
    }else{

?>

<?php  

        if(isset($_GET['edit_manufacturer'])){

            $edit_manufacturer = $_GET['edit_manufacturer'];
            $get_manufacturer = "select * from manufacturers where manufacturer_id='$edit_manufacturer'";
            $run_manufacturer = mysqli_query($db,$get_manufacturer);
            $row_manufacturer = mysqli_fetch_array($run_manufacturer);

            $m_id = $row_manufacturer['manufacturer_id'];
            $cat_id = $row_manufacturer['cat_id'];
            $m_title = $row_manufacturer['manufacturer_title'];
            $cat_title = $row_manufacturer['cat_title'];
            $m_top = $row_manufacturer['manufacturer_top'];
            $m_image = $row_manufacturer['manufacturer_image'];

        }

?>

<div class="row">
    <div class="col-lg-12">
        <ol class="breadcrumb">
            <li class=""><a href="index.php?view_manufacturers"> View manufacturer </a></li>
            <li class=""><a href="index.php?insert_manufacturer"> Insert manufacturer </a></li>
            <li class="active"> Update Manufacturer</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">

                    <i class="fa fa-money fa-fw"></i> Update Manufacturer

                </h3>
            </div>
            <div class="panel-body">
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data">
                    <div class="form-group">

                        <label for="" class="control-label col-md-3">

                            Manufacturer Name

                        </label>
                        <div class="col-md-6">

                            <input name="manufacturer_name" type="text" class="form-control" value="<?php echo $m_title; ?>">

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3">

                            Manufacturer cat

                        </label>

                        <div class="col-md-6">
                            <select name="cat" class="form-control" required>

                                <option disabled value="Select Category">Select Category</option>

                                <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>

                                <?php 
                              
                              $get_cat = "select * from categories";
                              $run_cat = mysqli_query($db,$get_cat);
                              
                              while ($row_cat=mysqli_fetch_array($run_cat)){
                                  
                                  $cat_id = $row_cat['cat_id'];
                                  $cat_title = $row_cat['cat_title'];
                                  
                                  echo "
                                  
                                  <option value='$cat_id'> $cat_title </option>
                                  
                                  ";
                                  
                              }
                              
                              ?>

                            </select>

                        </div>
                    </div>

                    <div class="form-group">


                        <label for="" class="control-label col-md-3">

                            Choose As Top Manufacturer

                        </label><!-- control-label col-md-3 finish -->

                        <div class="col-md-6">
                            <!-- col-md-6 begin -->

                            <input name="manufacturer_top" type="radio" value="yes" <?php 
                                
                                    if($m_top=='no'){}else{echo "checked='checked'";}
                                
                                ?>>
                            <label>Yes</label>

                            <input name="manufacturer_top" type="radio" value="no" <?php 
                                
                                    if($m_top=='no'){echo "checked='checked'";}
                                
                                ?>>
                            <label>No</label>

                        </div><!-- col-md-6 finish -->

                    </div>

                    <div class="form-group">

                        <label for="" class="control-label col-md-3">

                            Manufacturer Image

                        </label>
                        <div class="col-md-6">

                            <input type="file" name="manufacturer_image" class="form-control">

                            <br>

                            <img width="70" height="70" src="../images/other_images/<?php echo $m_image; ?>" alt="<?php echo $m_image; ?>">

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="" class="control-label col-md-3"></label>
                        <div class="col-md-6">

                            <input type="submit" name="update" value="Update Manufacturer" class="btn btn-primary form-control">

                        </div><!-- col-md-6 finish -->

                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php  

    if(isset($_POST['update'])){
        
        $manufacturer_name = $_POST['manufacturer_name'];
        
        $cat = $_POST['cat'];
        
        $manufacturer_top = $_POST['manufacturer_top'];

        if(is_uploaded_file($_FILES['manufacturer_image']['tmp_name'])){
        
            $manufacturer_image = $_FILES['manufacturer_image']['name'];
            
            $temp_name = $_FILES['manufacturer_image']['tmp_name'];
                
            move_uploaded_file($temp_name,"../images/other_images/$manufacturer_image");
            
            $update_manufacturer = "update manufacturers set cat_id='$cat',manufacturer_title='$manufacturer_name',manufacturer_top='$manufacturer_top',manufacturer_image='$manufacturer_image'where manufacturer_id='$m_id'" ;
            
            $run_manufacturer = mysqli_query($db,$update_manufacturer);

            if($run_manufacturer){
            
                echo "<script>alert('Your manufacturer has been updated')</script>";
                
                echo "<script>window.open('index.php?view_manufacturers','_self')</script>";

            }

        }else{
            
            $update_manufacturer = "update manufacturers set manufacturer_title='$manufacturer_name',manufacturer_top='$manufacturer_top' where manufacturer_id='$m_id'" ;
            
            $run_manufacturer = mysqli_query($db,$update_manufacturer);

            if($run_manufacturer){
            
                echo "<script>alert('Your manufacturer has been updated')</script>";
                
                echo "<script>window.open('index.php?view_manufacturers','_self')</script>";

            }

        }
        
    }

?>

<?php } ?>
