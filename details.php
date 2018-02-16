<?php
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
        <li><a href="#">My Account</a></li>
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
     
          <?php
            if(isset($_GET['pro_id'])){
                
                $product_id=$_GET['pro_id'];
                $get_pro=" SELECT * FROM `products` WHERE `product_id`= '$product_id' ";
                $run_pro=mysqli_query($con,$get_pro);
                
                 while($row_pro=mysqli_fetch_array($run_pro)){
                     $pro_id=$row_pro['product_id'];
                     $pro_title=$row_pro['product_title'];
                     $pro_price=$row_pro['product_price'];
                     $pro_image=$row_pro['product_image'];
                     $pro_desc=$row_pro['product_desc'];
                     
                     echo "
                 <div id='single_product'>
                 <h3>$pro_title</h3>
                 <img src='admin_area/product_images/$pro_image' width='300' height='300'><br>
                 <p>$pro_price &euro;</p>
                 <a href='index.php'>GO BACK</a>
                 <p>$pro_desc</p>
                 </div>
                 ";  
                 }//while
            }//if
          ?>
      
      
       
    </section>
    
    <footer> <h2> &copy; Test Project </h2> </footer>

    </div><!-- wrapper -->
</body>
</html>