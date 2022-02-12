   <div id="customer-sidebar" class="box">
       <div class="sidebar-header text-center">

           <?php 
        
        $customer_session = $_SESSION['customer_email'];
        
        $get_customer = "select * from customers where customer_email='$customer_session'";
        
        $run_customer = mysqli_query($db,$get_customer);
        
        $row_customer = mysqli_fetch_array($run_customer);
        
        $customer_name = $row_customer['customer_name'];
           
        $customer_email = $row_customer['customer_email'];
           
        $customer_contact = $row_customer['customer_contact'];
           
        $customer_address = $row_customer['customer_address'];
        
        if(!isset($_SESSION['customer_email'])){
            
        }else{
            
            echo "
        
                
                <h5 class='panel-title' align='center'>
                
                    Name: $customer_name
                
                </h5>
            
            ";
            
        }
        
        ?>


           <div class="<?php if(isset($_GET['edit_account'])){ echo "active";} ?>">
               <a href="customer_account.php?edit_account">
                   <i class="fa fa-pencil"></i> Edit Account
               </a>
           </div>
       </div>
       <hr>


       <div class="sidebar-body">
           <ul class="list-group m-3">

               <li class="<?php if(isset($_GET['account'])){ echo "active"; } ?>">
                   <a href="customer_account.php?customer_profile" class="">
                       <i class="fa fa-user-o"></i> Profile
                   </a>
               </li>

               <li class="<?php if(isset($_GET['my_orders'])){ echo "active"; } ?>">
                   <a href="customer_account.php?my_orders">
                       <i class="fa fa-list"></i> Orders
                   </a>
               </li>

               <li class="<?php if(isset($_GET['Message'])){ echo "active"; } ?>">
                   <a href="customer_account.php?message">
                       <i class="fa fa-envelope"></i> Message
                   </a>
               </li>


               <li class="<?php if(isset($_GET['pay_offline'])){ echo "active"; } ?>">

                   <a href="customer_account.php?pay_offline">
                       <i class="fa fa-bolt"></i> Pay ofline
                   </a>
               </li>



               <li class="<?php if(isset($_GET['change_password'])){ echo "active" ;} ?>">
                   <a href="customer_account.php?change_password">
                       <i class="fa fa-key" aria-hidden="true"></i> Change Password
                   </a>
               </li>

               <li class="<?php if(isset($_GET['delete_accoun'])){ echo "active"; } ?>">
                   <a href="customer_account.php?delete_account">
                       <i class="fa fa-trash-o"></i> Delete Account
                   </a>
               </li>

           </ul>
           <hr>

           <div class="logout">

               <?php if (!isset($_SESSION['customer_email'])){
    
                  echo "  <a href='checkout.php'><i class='fa fa-sign-out'></i>Login </a> ";
    
                  }else{
    
                   echo "  <a href='Logout.php'><i class='fa fa-sign-out'></i>Logout </a> "; 
    
                }
                             
            ?>
           </div>
       </div>
   </div>
