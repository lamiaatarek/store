<form action="" method="post">
    <table  width="795"  bgcolor="pink">
       
        <tr align="center">
           <th>S.N</th>
            <th>Category ID</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>  
               
        </tr>
        <?php
        include 'includes/db.php';
         $get_pro='SELECT * FROM `categories` ';
     $run_pro=mysqli_query($con,$get_pro);
  $i=0;
    while($row_pro=mysqli_fetch_array($run_pro)){
        $cat_id=$row_pro['cat_id'];
        $cat_title=$row_pro['cat_title'];
    
      $i++;
        ?>
        
        <tr align="center">
            <td><?= $i?></td>
            <td><?= $cat_id?></td>
            <td><?= $cat_title ?></td>
           <td><a href="index.php?edit_cat=<?=  $cat_id?>">Edit</a></td>
            <td><a href="index.php?delete_cat=<?=  $cat_id?>">Delete</a></td>
           
        </tr>
        <?php } ?>
    </table>
</form>
