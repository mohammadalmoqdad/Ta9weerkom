<?php

$connection = mysqli_connect("localhost", "root", "");

$db = mysqli_select_db($connection, "project");
session_start();
$user_check=$_SESSION['login_user'];

$ses_sql=mysqli_query($connection,"select Nick_Name from user where username='$user_check'");
$row = mysqli_fetch_assoc($ses_sql);
$login_session =$row['Nick_Name'];
if(!isset($login_session)){
mysqli_close($connection); 
header('Location: login.php'); 
}
?>