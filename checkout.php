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
        <li><a href="index.php">Home</a></li>
        <li><a href="allproducts.php">All Products</a></li>
        <li><a href="customer/my_account.php">My Account</a></li>
        <li><a href="#">Sign Up</a></li>
        <li><a href="#">Shopping Cart</a></li>
       
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
    <h1>Categories</h1>
    <ul>
    <?=getCats()?>
    </ul>
    
    <h1>Brands</h1>
    <ul>
    <?=getBrands()?>
    </ul>
    </aside>
    
    <section>
    <?php cart(); ?>
    <div id="shopping_cart">
    <span style="float:right; font-size:17px; padding:5px; line-height:40px">
    <?php
        if(isset($_SESSION['customer_email'])){
            echo"<b> welcome:</b>" .$_SESSION['customer_email']. "<b style='color:yellow;'>Your</b>";
        }
        else{
            echo"<b>Welcome Guset:</b>";
        }
        
        
        ?><b style="color:yellow">Shopping Cart -</b>
   Total Items : <?=total_items()?>Total Price :<?=total_price()?> <a href="cart.php" style="color:yellow"> GO TO Cart</a>
        </span>
</div><!--shopping_cart -->

      <?php
        if(!isset($_SESSION['customer_email'])){
            include ('login.php');
        }
        else{
            include ('payment.php');
        }
        ?>
      
       
    </section>
    
    <footer> <h2> &copy; Test Project </h2> </footer>

    </div><!-- wrapper -->
</body>
</html>