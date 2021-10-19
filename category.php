<?php
include("database.php");

?>


<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <button class="btn btn-primary my-5"><a href="register.php" class="text-light">Add user</a></button>
        <table class="table table-light">
  <thead>
    <tr>
    
      <th scope="col">id</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">password</th>
      <th scope="col">age</th>
      <th scope="col">city</th>
      <th scope="col">image</th>
      

    </tr>
</thead>
<tbody>


    <?php 

$sel=mysqli_query($conn,"select * from users");
if(mysqli_num_rows($sel)>0){
    $id=1;
   while($arr=mysqli_fetch_assoc($sel)){
       ?>
       <tr>
           
           <td><?php echo $id;?></td>
           <td><?php echo $arr['name'];?></td>
           <td><?php echo $arr['email'];?></td>
           <td><?php echo $arr['password'];?></td>
           <td><?php echo $arr['age'];?></td>
           <td><?php echo $arr['city'];?></td>
           <td>
             <img src="<?php echo $arr['image'];?>" width="100px" alt="image"></td>
           <td>
         
         
         </td>

       </tr>
       <?php
       $id++;
   }
}

else {
  ?>
<tr>
   <td colspan="6" align="center"> No records found </td>
</tr>
  <?php 
}
?>


   <!--   $sql="select * from employee";
      $result=mysqli_query($conn,$sql);
      $sn=1;
      if($result){
          while($row=mysqli_fetch_assoc($result)){
              $id=$row['emp_id'];
              $name=$row['name'];
              $uname=$row['uname'];
              $email=$row['Email'];
              $age=$row['Age'];
              $city=$row['city'];
              echo' <tr>
              <th scope="row">'.$id.'</th>
              <td>'.$name.'</td>
              <td>'.$uname.'</td>
              <td>'.$email.'</td>
              <td>'.$age.'</td>
              <td>'.$city.'</td>
              
            </tr>';
          }
      }

      $sn++;
?>
    -->

  </tbody>
</table>
    

</body>
</html>