<?php
session_start();
include 'functions/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="styles/style.css" rel="stylesheet">
</head>
<body>
    <div id="wrapper">
    <header>
    <img src="images/banner.jpg" width="1000" height="200" alt=""/>
    </header>

    <nav>
    <ul>
        <li><a href="../index.php">Home</a></li>
        <li><a href="../allproducts.php">All Products</a></li>
        <li><a href="./my_account.php">My Account</a></li>
        <li><a href="../register.php">Sign Up</a></li>
        <li><a href="../cart.php">Shopping Cart</a></li>
       
    </ul>
    
    <div id="form">
		<form action="results.php" enctype="multipart/form-data">
        <input type="text" name="user_query" placeholder="Search a Product" />
        <input type="submit" name="search" value="Search"/>
        </form>    
    </div>
    </nav>
<div style="clear: both"></div>
   <aside>
    <h1>My Account</h1>
    <ul>
       <?php 
        $user=$_SESSION['customer_email'];
        $get_img="select * from customers where customer_email='$user'";
        $run_img=mysqli_query($con,$get_img);
     $row_img=mysqli_fetch_assoc($run_img);
        $img=$row_img['customer_image'];
        $name=$row_img['customer_name'];
        echo "<img src='customer_images/$img' width='100' height='100'>";
        
        ?>
        <li><a href="my_account.php?my_orders">My Orders</a></li>
        <li><a href="my_account.php?edit_account">Edit Account</a></li>
        <li><a href="my_account.php?change_pass">Change Password</a></li>
        <li><a href="my_account.php?delete_account">Delete Account</a></li>
        <li><a href="logout.php">Log Out</a></li>
    </ul>
    
    
    </aside>
    
    <section>
    <?php cart(); ?>
    <div id="shopping_cart">
    <span style="float:right; font-size:18px; padding:5px; line-height:40px">
    <?php
        if(isset($_SESSION['customer_email'])){
            echo"<b> welcome:</b>" .$_SESSION['customer_email'];
        }
        
        
        ?>
   
       <?php
        if(!isset($_SESSION['customer_email'])){
            echo"<a href='checkout.php' style='color:orange'>Login</a>";
        }
        else{
             echo"<a href='logout.php' style='color:orange'>Logout</a>";
        }
        
        ?>
        </span>
        
</div><!--shopping_cart -->

      <div id="products">
        
         <?php 
          if(!isset($_GET['my_orders'])){
              if(!isset($_GET['edit_account'])){
                  if(!isset($_GET['change_pass'])){
                    if(!isset($_GET['delete_account'])){
                        echo"<h2 style='padding:20px'>Welcome: $name</h2>";
                        echo"<p>You can see your order progress from this <a href='my_account.php?my_orders'>link</a></p>";
                    }
                  }
              }
          }?>
          <?php
          if(isset($_GET['edit_account'])){
              include 'edit_account.php';
          }
           if(isset($_GET['change_pass'])){
              include 'change_pass.php';}
          if(isset($_GET['delete_account'])){
              include 'delete_account.php';
          }
         if(isset($_GET['my_orders'])){
              include 'my_orders.php';
          }
         
          ?>
          
      </div>
      
       
    </section>
    
    <footer> <h2> &copy; Test Project </h2> </footer>

    </div><!-- wrapper -->
</body>
</html>