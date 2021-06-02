<?php

session_start();

$idd=mysqli_connect("localhost","root","")
or die("error connect");



$db=mysqli_select_db($idd,"project");




if(isset($_SESSION['login_user'])) {
    header("location:home2.php");
  }


if (isset($_POST['submit'])) {


 
$username=$_POST['username'];
$password=$_POST['pass'];




$query = mysqli_query($idd,"select * from User where Nick_Name ='$username' and Password='$password'" );
$rows = mysqli_num_rows($query);
$query1 = mysqli_query($idd,"select * from User where Nick_Name='$username' and ID_User_Type ='2' and ID_User_Status ='2' " );
$rows1= mysqli_num_rows($query1);
$query2 = mysqli_query($idd,"select * from User where Nick_Name='$username' and ID_User_Type ='2' and ID_User_Status ='1' " );
$rows2= mysqli_num_rows($query2);
$query3 = mysqli_query($idd,"select * from User where Nick_Name='$username' and ID_User_Type ='2' and ID_User_Status ='3' " );
$rows3= mysqli_num_rows($query3);
$query4 = mysqli_query($idd,"select * from User where Nick_Name='$username' and ID_User_Type ='2' and ID_User_Status ='4' " );
$rows4= mysqli_num_rows($query4);
$query5 = mysqli_query($idd,"select * from User where Nick_Name='$username' and ID_User_Type ='3' " );
$rows5= mysqli_num_rows($query5);
$query6 = mysqli_query($idd,"select * from User where Nick_Name='$username' and ID_User_Type ='1' " );
$rows6= mysqli_num_rows($query6);
if ($rows == 1) {
$_SESSION['login_user']=$username;


if($rows1 == 1)
{
    header("location: homeph.php"); 
}
if($rows2 == 1)
{
    header("location: pending.php"); 
}

if($rows3 == 1)
{
    header("location: hanging.php"); 
}


if($rows4 == 1)
{
    header("location: block.php"); 
}


if($rows5 == 1)
{
    header("location: home2.php"); 
    

}
if($rows6 == 1)
{
    header("location: admin.php"); 
    

}



} else {
  echo"  <script>alert('Username or Password is invalid');</script>";
}

}










?>
<!DOCTYPE html>
<html>
<head>
<title>Demo Beautiful Registration Form with HTML5 and CSS3</title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/styleSign.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">
            
            <div class="freshdesignweb-top">
                <a href="index.html" target="_blank">Home</a>
                <span class="right">
                    <a href="regesrtion.php">
                        <strong>SignUp</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
            <header>
                <h1><span>Welcome Back</span>Please fill up your Nick_name and Password</h1>
            </header>       
      <div  class="form">
<form action="login.php" method="POST">         
                 
                 
                <p class="contact"><label for="email">Nick_Name</label></p> 
                <input id="Nick_Name" name="username" placeholder="Nick_Name"  type="text"> <br>
                
                <p class="contact"><label for="Password">Password</label></p> 
                <input id="password" name="pass" placeholder="****" tabindex="1" type="password"><br>
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Login" type="submit">

            
   </form> 
</div>      
</div>

</body>
</html>