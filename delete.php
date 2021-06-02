<?php
session_start();
$idd=mysqli_connect("localhost","root","")
or die("error connect");

if(!isset($_SESSION['login_user'])) {
  header("location:login.php");
}

$db=mysqli_select_db($idd,"project");
$username=$_SESSION['login_user'];

if(isset($_GET["id"]))
{

 $id2=$_GET["id"];

$delImg=mysqli_query($idd,"DELETE FROM activity WHERE `Serial`='$id2' ");

header("location:works.php");


}


?>