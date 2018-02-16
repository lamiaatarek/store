<?php

if(!isset($_SESSION['admin_email'])){
    echo"<script>window.open('login.php?not_admin=you are not admin','_self')</script>";
}else{
?>
  

  <form action="" method="post" style="padding:80px;">
   <b>Insert new category</b> <input type="text" name="new_cat">
   <input type="submit" name="add_cat" value="ADD New Category">
</form>
<?php 
include 'includes/db.php';
if(isset($_POST['add_cat'])){
    $cat_title=$_POST['new_cat'];
    $update_cat="insert into categories (cat_title) values ('$cat_title')";
    $run_cat=mysqli_query($con, $update_cat);
    if($run_cat){
          echo"<script>alert('Table updated successfully')</script>";
         echo"<script>window.open('index.php?view_cat','_self')</script>";
    }
}}
?>