<?php
session_start();
if(isset($_POST['save']))
{
    extract($_POST);
    include 'dashboard.php';
    $sql=mysqli_query($conn,"SELECT * FROM users where email='$email' and Password='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["id"] = $row['id'];
        $_SESSION["email"]=$row['email'];
        $_SESSION["name"]=$row['name'];

    //  header("Location: dashboard.php"); 
    }
    else
    {
        echo "Invalid Email ID/Password";
    }
}
?>