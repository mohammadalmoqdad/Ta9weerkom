<?php
session_start();
$idd=mysqli_connect("localhost","root","")
or die("error connect");

if(!isset($_SESSION['login_user'])) {
  header("location:login.php");
}
$username=$_SESSION['login_user'];
 
    if(isset($_POST['submit'])){
        $db=mysqli_select_db($idd,"project");





$status = $statusMsg = ''; 

 if (isset($_POST['submit'])) {

$firsname=$_POST['Firstname'];
$Lastname=$_POST['Lastname'];
$oldPassword=$_POST['password'];
$newPassword=$_POST['repassword'];
$email=$_POST['email'];




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
           $que=mysqli_query($idd,"select * from user where Nick_Name='$username'");
           $id_row=mysqli_fetch_row($que); //to seprate the query into several rows.
           $id=$id_row[9];
           if (isset($_POST['password']) AND $oldPassword!=$id) {
                echo"  <script>alert('Make sure you write Old Password correctly');</script>";
           }
           
             if ($oldPassword==$id) {
             $insertinto=mysqli_query($idd,"UPDATE user SET First_Name='$firsname',Last_Name='$Lastname',Email='$email',Personal_Photo='$imgName',Password='$newPassword' where Nick_Name='$username'");
            }
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
        $que=mysqli_query($idd,"select * from user where Nick_Name='$username'");
           $id_row=mysqli_fetch_row($que); //to seprate the query into several rows.
           $id=$id_row[9];
             if (isset($_POST['password'])  AND $oldPassword!=$id) {
                echo"  <script>alert('Make sure you write Old Password correctly');</script>";
            }
             if ($oldPassword==$id) {
        $insertinto5=mysqli_query($idd,"UPDATE user SET First_Name='$firsname',Last_Name='$Lastname',Email='$email',Password='$newPassword' where Nick_Name='$username'");    
        } 
    } 
 }
 
 
        
}

  
        





?>












<!DOCTYPE html>
<html>
<head>
<title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/styleSign.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">
            
            <div class="freshdesignweb-top">
                <a href="home2.php" target="_blank">Home</a>
                <span class="right">
                    <a href="logout.php">
                        <strong>Logout</strong>
                    </a>
                </span>
                <div class="clr"></div>
            </div>
            <header>
                <h1>Profile Information</h1>
            </header>       
      <div  class="form">
            <form method="POST" action="editUserInfo.php"enctype="multipart/form-data"  > 
                
                <p class="contact"><label for="name">nickname</label></p> 
                <p style="font-style: italic;"><?php echo $username; ?></p><br>
                 
                <p class="contact"><label for="email">Email</label></p> 
                <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 
                

                 <p class="contact"><label for="name">First Name</label></p> 
                <input id="name" name="Firstname" placeholder="First name" required="" tabindex="1" type="text"> 
                 
                <p class="contact"><label for="name">Last Name</label></p> 
                <input id="name" name="Lastname" placeholder="last name" required="" tabindex="1" type="text"> 
                
                 
                <p class="contact"><label for="password">Old password</label></p> 
                <input type="password" id="password"  minlength="8" name="password" required=""> 
                <p class="contact"><label for="repassword">New password</label></p> 
                <input type="password" id="repassword"  minlength="8" name="repassword" required=""> <br>
        
               
  
           
            

            
           
        <label>Change Profile Picture</label> <input type="file" name="image" id="fileToUpload"><br>
            <input class="buttom" name="submit" id="submit" tabindex="5" value="Submit Changes" type="submit">

            
   </form> 
</div>      
</div>

</body>
</html>