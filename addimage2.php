<?php
session_start();

$idd=mysqli_connect("localhost","root","")
or die("error connect");
$db=mysqli_select_db($idd,"project");



	$username=$_SESSION['login_user'];
	$query = mysqli_query($idd,"select * from User where Nick_Name ='$username'" );
  	$id_row=mysqli_fetch_row($query); //to seprate the query into several rows.
	$id=$id_row[0]; //get the wanted row (id row).
 
  	
 


$status = $statusMsg = ''; 

 if (isset($_POST['upload'])) {

   $images = mysqli_query($idd,"select * from activity where ID_User ='$id'  AND  ID_Mode='1' " );
  $arr=array();
while ($res=mysqli_fetch_assoc($images)) {
  array_push($arr,$res["Path_Data"] );
}
if(count($arr)>34){
  echo "<script type='text/javascript'>alert('YOU ARRIVED YOUR MAX LIMIT OF ADDING IMAGES! PLEASE DELETE SOME');</script>";
}
else{
 
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
            if (!file_exists("images/".$_FILES['image']['name'])) {
              # code...
            
            move_uploaded_file($image,"images/".$imgName);
           
            // Insert image info intodatabase 
           // $insert = $db->query("INSERT into activity (image, uploaded) VALUES ('$imgContent', NOW())"); 
             $insertinto=mysqli_query($idd,"INSERT INTO `activity`(`Serial`, `ID_User`, `ID_Mode`, `Activity_Date`, `Path_Data`, `Note`) VALUES (NULL,'$id','1',NULL,'$imgName','$image')");
            }
            else{
              $im=explode(".",$imgName);
              $ide=uniqid();
              $imgName=$im[0].$ide.".".$im[1];

              echo $imgName;
              
              move_uploaded_file($image,"images/".$imgName);
              $insertinto=mysqli_query($idd,"INSERT INTO `activity`(`Serial`, `ID_User`, `ID_Mode`, `Activity_Date`, `Path_Data`, `Note`) VALUES (NULL,'$id','1',NULL,'$imgName','$image')");

            }
            
            if($insertinto){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only JPG, JPEG & PNG files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an image file to upload.'; 
    } 
}
 }
 
// Display status message 
echo $statusMsg;
