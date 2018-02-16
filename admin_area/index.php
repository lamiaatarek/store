<?php
session_start();
if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php?not_admin=you are not admin','_self')</script>";
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>This is Admin Panel</title>
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
   <div class="main_wrapper">
       <div id="header">
           
       </div>
         <div id="right">
         <h2 style="text-align:center;">Manage Content:</h2>
         <a href="index.php?insert_pro">Insert New Product</a>
          <a href="index.php?view_pro">view all products</a>
           <a href="index.php?insert_cat">Insert New Category</a>
            <a href="index.php?view_cat">view category</a>
             <a href="index.php?insert_brand">Insert New Brand</a>
              <a href="index.php?view_brand">view all brands</a>
               <a href="index.php?view_customers">view customers</a>
               <a href="index.php?view_orders">view orders</a>
                <a href="index.php?view_payments">view payments</a>
                 <a href="logout.php">Admin logout</a>
         </div> <!--right--> 
       <div id="left">
           <?php
           include 'includes/db.php';
           if(isset($_GET['insert_pro'])){
               include 'insert_product.php';
          }
            if(isset($_GET['view_pro'])){
               include 'view_product.php';
          }
 
if(isset($_GET['edit_pro'])){
    include 'edit_product.php';
}
           if(isset($_GET['delete_pro'])){
               $pro_id=$_GET['delete_pro'];
               $delete_pro="delete from products where product_id='$pro_id'";
               $run_pro=mysqli_query($con,$delete_pro);
               if($run_pro){
                   echo"<script>window.open('index.php?view_pro','_self')</script>";
               }
           }
           if(isset($_GET['insert_cat'])){
    include 'insert_category.php';
}
             if(isset($_GET['view_cat'])){
               include 'view_cat.php';
          }
          
if(isset($_GET['delete_cat'])){
               $cat_id=$_GET['delete_cat'];
               $delete_pro="delete from categories where cat_id='$cat_id'";
               $run_pro=mysqli_query($con,$delete_pro);
               if($run_pro){
                   echo"<script>window.open('index.php','_self')</script>";
               }
           }
             if(isset($_GET['view_customers'])){
               include 'view_customers.php';
          }
  
           ?>
       </div><!--left-->
   </div><!--main_wrapper-->
    
</body>
</html>
<?php } ?>