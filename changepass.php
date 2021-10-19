<?php 
include("database.php");
$err='';
session_start();
$email=$_SESSION['email'];
echo $email;
//<!--ye lgana jruri hai konse email ka pass chnge krnah-->
$query=mysqli_query($conn,"SELECT * FROM users where email='$email'");
$arr=mysqli_fetch_assoc($query);
//<============>

if(isset($_POST['changepassword']))
{
    $old=$_POST['oldpass'];
    $new=$_POST['newpass'];
    $conpass=$_POST['conpass'];
    if($arr['password']==$old)
    {
        if($new==$conpass)
        {
            if(mysqli_query($conn,"update users set Password='$new' where email='$email'"))
            {
                
                include 'dashboard.php';
            }
            else
            {
                echo"ARE bhai SQL me issue hai";
            }
        }
        else
        {
            $err="are yar ap new con shi kro yar ????????";
        }
    }
    else
    {
        $err="correct password";
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
<?php if(!empty($err)) { ?>

<div> <?php echo $err; ?> </div>

<?php
}?>
    <form method="POST" enctype="multipart/form-data">
    
    <br><br><input type="text" name="oldpass" placeholder="OLD PASS">
  <br><br>  <input type="text" name="newpass" placeholder="New PASS">
  <br><br>  <input type="text" name="conpass" placeholder="Confirm PASS">
<br><br>
    <input type="submit" value="change PASSWORD" name='changepassword'>

    </form>
</body>
</html>