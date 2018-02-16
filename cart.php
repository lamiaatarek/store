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
        <li><a href="customer/my_account.php">My Account</a></li>
        <li><a href="./register.php">Sign Up</a></li>
        <li><a href="./cart.php">Shopping Cart</a></li>
      
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
     <span style="float:right; font-size:18px; padding:5px; line-height:40px">
    <?php
        if(isset($_SESSION['customer_email'])){
            echo"<b> welcome:</b>" .$_SESSION['customer_email']. "<b style='color:yellow;'>Your</b>";
        }
        else{
            echo"<b>Welcome Guset:</b>";
        }
        
        
        ?>
   <b style="color:yellow">Shopping Cart -</b>
   Total Items : <?=total_items()?>Total Price :<?=total_price()?> <a href="cart.php"  style="color:yellow"> GO TO Cart</a>
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
          <form action="" method="Post" enctype="multipart/form-data">
			<table align="center" width="700" border="2" bgcolor="orange">
			
			<tr align="center">
				<th>Remove</th>
				<th>Products</th>
				
				<th>Total Price</th>
			</tr>
            <?php
                 global $con;
    $total_price=0;
     $ip =getIp();
    $query="SELECT * FROM `cart` WHERE ip_address='$ip'";
    $run_proo=mysqli_query($con, $query );
    while($row=mysqli_fetch_assoc($run_proo)){
        
        $pro_id=$row['product_id'];
    $check_pro="SELECT * FROM `products` WHERE product_id='$pro_id'";
     $run_pro=mysqli_query($con,$check_pro);
    while($row_pro=mysqli_fetch_assoc($run_pro)){
         $pro_price=array($row_pro['product_price']);
        $pro_img=$row_pro['product_image'];
        $pro_title=$row_pro['product_title'];
        $single_price=$row_pro['product_price'];
        $values=array_sum( $pro_price);
         $total_price+=$values;
  
    
    
       
                
                
                ?>
                <tr align="center">
                    <td><input type="checkbox" name="remove[]" value="<?php echo $pro_id;?>"></td>
                    <td><?php echo $pro_title;?>
                        <br>
                      <?php echo "<img src='admin_area/product_images/$pro_img' width=50 height=50>";?></td>
                 
                 
                   <td><?= $single_price?></td>
                </tr>
               <?php  }
   } ?> 
             <tr align="center" >
                <td><input type="submit" name="update_cart" value="update cart"></td>
                <td><input type="submit" name="continue" value="continue shopping"></td>
              
                <td><button><a href="checkout.php">checkout</a></button></td>
                 
             </tr>
              </table>
          </form>
          <?php
         
        
            $ip =getIp();
          if(isset($_POST['update_cart'])){
              foreach($_POST['remove'] as $p_id){
                  
                  $delete_pro="delete from cart where product_id='$p_id' AND ip_address='$ip'";
                  $run_delete=mysqli_query($con,$delete_pro);
                  if($run_delete){
                      echo"<script>window.open('cart.php','_self')</script>";
                  }
              }
          }if(isset($_POST['continue'])){
               echo"<script>window.open('index.php','_self')</script>";
          }
            // echo @$up_cart=updatecart();
           
         
 
          ?>
      </div>
      
       
    </section>
    
    <footer> <h2> &copy; Test Project </h2> </footer>

    </div><!-- wrapper -->
</body>
</html>