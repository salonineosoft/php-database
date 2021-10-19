 <?php
// session_start();
$email=$_SESSION['email'];
include("database.php");
$sql=mysqli_query($conn,"select * from users where email='$email'");
$row  = mysqli_fetch_assoc($sql);
$image=$row['image'];
 
 $img="$image";


 ?>
 
 
 
 
 
 
 <div class="list-group">
  <a href="?con=1" class="list-group-item list-group-item-action"><img src="<?php echo $img ?>" alt="" width="200px" height="200px" class="ml-5" style="border-radius:50%;"></a>

  <a href="category.php" class="list-group-item list-group-item-action">category</a>
   
  
  <a href="?con=image" class="list-group-item list-group-item-action">Image</a>  
</div> 
