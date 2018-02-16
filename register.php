<?php
session_start();
include 'functions/functions.php';
//include 'includes/db.php';
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
        <li><a href="./customer/my_account.php">My Account</a></li>
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
    Welcome Guset !<b style="color:yellow">Shopping Cart -</b>
   Total Items : <?=total_items()?>Total Price :<?=total_price()?> <a href="cart.php"  style="color:yellow"> GO TO Cart</a>
        </span>
</div><!--shopping_cart -->
<form action="register.php" method="Post" enctype="multipart/form-data">
			<table align="center" width="500"  bgcolor="orange">
			<tr>
				<td colspan="2" align="center"><h2>Create an account </h2></td>
			</tr>
      <tr>
            <th align="center">customer name: </th>
			<td><input type="text" name='User_name' required /></td>
			</tr>
            
            <tr>
            <th align="center">customer Password: </th>
			<td><input type="password" name='User_pass' required /></td>
			</tr>
            
            <tr>
            <th align="center">customer email: </th>
	<td><input type="text" name="User_email"> </td>
			</tr>
            <tr>
            <th align="center">customer country: </th>
			<td><select name="customer_country">
			    <option>Egypt</option>
			    <option>America</option>
			    <option>Canda</option>
			    <option>Dubai</option>
			   
			</select></td>
			</tr>
      <tr>
            <th align="center">customer city: </th>
			<td><input type="text" name='customer_city' required /></td>
			</tr>
          <tr>
            <th align="center">customer image: </th>
			<td><input type="file" name='customer_image' /></td>
			</tr>
           <tr>
            <th align="center">customer contact: </th>
			<td><input type="text" name='customer_contact' required /></td>
			</tr>
      <tr>
            <th align="center">customer address: </th>
          <td><textarea cols="50" rows="6" name='customer_address' required ></textarea></td>
			</tr>
      
       
          
            
            <tr>
<td colspan="4"><input type="submit" name='register' value="Create Account"/></td>
			</tr>
 
        </table>
    </form>
       
    </section>
    <?php
        if(isset($_POST['register'])){
            $ip=getIp();
            $c_name=$_POST['User_name'];
             $c_pass=$_POST['User_pass'];
             $c_email=$_POST['User_email'];
             $c_country=$_POST['customer_country'];
             $c_city=$_POST['customer_city'];
             $c_img=$_FILES['customer_image']['name'];
             $c_img_tmp=$_FILES['customer_image']['tmp_name'];
            move_uploaded_file($c_img_tmp,"customer/customer_images/$c_img");
             $c_contact=$_POST['customer_contact'];
             $c_add=$_POST['customer_address'];
            $insert="insert into customers (customer_ip,customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image)values('$ip','$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_add','$c_img')";
            $run_insert=mysqli_query($con,$insert);
            $check_cart="select * from cart where ip_address='$ip'";
            $run_cart=mysqli_query($con,$check_cart);
            $count_row=mysqli_num_rows($run_cart);
            if($count_row==0){
                $_SESSION['customer_email']= $c_email;
                echo"<script>alert('Account has been registered successfully')</script>";
                echo"<script>window.open('customer/my_account.php')</script>";
            }
            else{
                $_SESSION['customer_email']= $c_email;
                echo"<script>alert('Account has been registered successfully')</script>";
                echo"<script>window.open('checkout.php','_self')</script>";
            }
       }
        
        ?>
   
    
    <footer> <h2> &copy; Test Project </h2> </footer>

    </div><!-- wrapper -->
</body>
</html>


 