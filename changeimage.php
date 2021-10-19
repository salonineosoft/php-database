<?php 


$email=$_SESSION['email'];
$p=mysqli_query($conn,"select * from users where email='$email'");
$arr=mysqli_fetch_assoc($p);
$IMAGESHOW=$arr['image'];
//unlink($arr['image']);//delete old image 
if(isset($_POST['IMAGECHANGE']))
{
        //New Image INFO
    $tmp=$_FILES['att']['tmp_name'];
    $fname=$_FILES['att']['name']; 
    $imgpath="users/$email/$fname";
    //New Image INFO

    unlink($arr['image']);//delete old image 

    
   if(mysqli_query($conn,"update users set image='$imgpath' where email='$email'"))
   {
    move_uploaded_file($tmp,"users/$email/$fname");//upload the Image   
       echo "SUCESS";
   }
   else
   {
       echo"FAIL IMAGE";
   }


}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form method="POST" enctype="multipart/form-data">

   <input type="file" name="att">
   <input type="submit" value="change" name="IMAGECHANGE">
   </form>
</body>
</html>

