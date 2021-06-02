<?php
session_start();
use function PHPSTORM_META\type;

$idd=mysqli_connect("localhost","root","")
or die("error connect");
if(isset($_SESSION['login_user'])) {
  header("location:login.php");
}
$d=mysqli_select_db($idd,"project");
if(isset($_POST['submit'])){
$firsname=$_POST['Firstname'];
$Lastname=$_POST['Lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$time=$_POST['Time'];
$gender=$_POST['gender'];
$location=$_POST['location'];
$phone=$_POST['phone'];
$photo=$_POST['fileToUpload'];
$type1=$_POST['type1'];

if($type1==2){


$result=mysqli_query($idd,"select * from User where Nick_Name ='$username'");
$number=mysqli_num_rows($result);

if($number == 1){

echo"
    <script>alert('the user is taken ?');</script>";
}
else{
$q="INSERT INTO user (`ID`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Personal_Photo`, `Gender`, `Location`, `Birth_Date`, `Password`, `Nick_Name`, `ID_User_Type`, `ID_User_Status`)
     VALUES (null,'$firsname','$Lastname','$email','$phone','$photo','$gender','$location','$time','$password','$username','2','1')";
 $re=mysqli_query($idd,$q);
    
 mysqli_close($idd);
 
}
}


if($type1==3){
    $result=mysqli_query($idd,"select * from User where Nick_Name ='$username'");
    $number=mysqli_num_rows($result);

    if($number == 1){
    
   echo "<script>alert('the user is taken ');</script>";

}
else{
    
    
    $q="INSERT INTO user (`ID`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Personal_Photo`, `Gender`, `Location`, `Birth_Date`, `Password`, `Nick_Name`, `ID_User_Type`, `ID_User_Status`)
    VALUES (null,'$firsname','$Lastname','$email','$phone','$photo','$gender','$location','$time','$password','$username','3','2')";
 $re=mysqli_query($idd,$q);
    
 mysqli_close($idd);
 echo $q;
}
} 


}


  



?>
<!DOCTYPE html>
<html>
<head>
<title>REGISTER</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="demo.css" media="all" />
</head>
<!DOCTYPE html>
<html>
<head>
    <script> function sur(){
alert("are you sure a sign up ?");

    }
    
    
    
    </script>
<title>REGISTER!</title>
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/styleSign.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">
			
            <div class="freshdesignweb-top">
                <a href="" target="_blank">Home</a>
                <span class="right">
                    <a href="login.php">
                        <strong>Login</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
			<header>
				<h1><span>Photographer</span> Please fill up your informations to start work with us</h1>
            </header>       
            <form class="form" action="regesrtion.php" method="post" return sur()>
           
    		<form id="contactform"> 
               <p class="contact"><label for="signup">Sign Up As:</label>
               <input type="radio" name="type1" value="2" required> Photographer 
               <input type="radio" name="type1" value="3">Client <br></p>
    
    			<p class="contact"><label for="name">FirstName</label></p> 
    			<input id="name" name="Firstname" placeholder="First name" required="" tabindex="1" type="text"> 
                 
                <p class="contact"><label for="name">LastName</label></p> 
    			<input id="name" name="Lastname" placeholder="last name" required="" tabindex="1" type="text"> 
    			 
    			<p class="contact"><label for="email">Email</label></p> 
    			<input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
                
                <p class="contact"><label for="username">Create a username</label></p> 
    			<input id="username" name="username" minlength="8" placeholder="username" required="" tabindex="2" type="text"> 
    			 
                <p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" minlength="8" name="password" required=""> 
                <p class="contact"><label for="repassword">Confirm your password</label></p> 
    			<input type="password" id="repassword" minlength="8" name="repassword" required=""> 
        
               <fieldset>
                 
                 <label  class="text-black" for="dateandtime">Birthday</label>
                   <input type="date" id="time" name="Time">
              </fieldset>
  
            <select class="select-style gender" name="gender">
            
            <option value="0">Male</option>
            <option value="1">Female</option>
            
            </select><br><br>
            

            <select class="select-style gender" name="location">               
                <option value="amman">Amman</option>
                <option value="zarqa">Zarqa</option>
                <option value="others">Irbid</option>
                <option value="others">Jerash</option>
                <option value="others">Ajlon</option>
                <option value="others">Aqaba</option>
                <option value="others">Alkarak</option>
                </select><br><br>
                

            <p class="contact"><label for="phone">Mobile phone</label></p> 
            <input id="phone" name="phone" placeholder="phone number" required="" minlength="10" type="text"> <br>
        <label>Profile Picture</label> <input type="file" name="fileToUpload" id="fileToUpload"><br>
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up!" type="submit">

            
   </form> 
</div>      
</div>

</body>
</html>
