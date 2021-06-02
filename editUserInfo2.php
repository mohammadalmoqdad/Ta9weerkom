<?php
session_start();
$idd=mysqli_connect("localhost","root","")
or die("error connect");

if(!isset($_SESSION['login_user'])) {
  header("location:login.php");
}
$db=mysqli_select_db($idd,"project");
$username=$_SESSION['login_user'];

$status = $statusMsg = ''; 

 if (isset($_POST['submit'])) {

$firsname=$_POST['Firstname'];
$Lastname=$_POST['Lastname'];
$email=$_POST['email'];
$newPass=$_POST['repassword'];
$password=$_POST['password'];
$phone=$_POST['phone'];



 
    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            
            $image = $_FILES['image']['tmp_name']; 
            $imgName=$_FILES['image']['name'];
            //copy the file into the folder :images
            move_uploaded_file($image,"images/".$imgName);
           
           
        
             $insertinto=mysqli_query($idd,"UPDATE user SET First_Name='$firsname',Last_Name='$Lastname',Email='$email',Phone='$phone',Personal_Photo='$imgName',Password='$password' where Nick_Name='$username'");
            
            if($insertinto){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
                echo "<script>alert('".$statusMsg."');</script>" ; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.'; 
            echo "<script>alert('".$statusMsg."');</script>" ; 
        } 
    }else{ 
        $insertinto5=mysqli_query($idd,"UPDATE user SET First_Name='$firsname',Last_Name='$Lastname',Email='$email',Phone='$phone',Password='$password' where Nick_Name='$username'");     
    } 
 }
 
// Display status message 

 
		


  
        





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
  <title>Edit Profile</title>
    

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/styleSign.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">
            
            <div class="freshdesignweb-top">
                <a href="home.php">Home</a>
                <span class="right">
                    <a href="login.php">
                        <strong>Login</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
            <header>
                <h1><span>Photographer</span> Here You Can Edit Your Information</h1>
            </header>       
           
            <form method="POST" action="editUserInfo2.php" enctype="multipart/form-data" class="form" >
            <form id="contactform"> 
              
                <p class="contact"><label for="name">First Name</label></p> 
                <input id="name" name="Firstname" placeholder="First name" required="" tabindex="1" type="text"> 
                 
                <p class="contact"><label for="name">Last Name</label></p> 
                <input id="name" name="Lastname" placeholder="last name" required="" tabindex="1" type="text"> 
                 
                <p class="contact"><label for="email">Email</label></p> 
                <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
                
                <p class="contact"><label for="username">USER NAME:</label></p> 
                <p><?php echo $_SESSION['login_user']; ?></p><br>
               
                 
                <p class="contact"><label for="password">Old password</label></p> 
                <input type="password" id="password" minlength="8" name="password" required=""> 
                <p class="contact"><label for="repassword">new your password</label></p> 
                <input type="password" id="repassword" minlength="8" name="repassword" required=""> 
        
             

           

            <p class="contact"><label for="phone">Mobile phone</label></p> 
            <input id="phone" name="phone" placeholder="phone number" required="" minlength="10" type="text"> <br>
        <label>Profile Picture</label>  <input type="file" name="image" ><br>
        
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Sign me up!" type="submit">

        
   </form> 
</body>
</html>