

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

   $videos = mysqli_query($idd,"select * from activity where ID_User ='$id'  AND  ID_Mode='1' " );
  $arr=array();
while ($res=mysqli_fetch_assoc($videos)) {
  array_push($arr,$res["Path_Data"] );
}
if(count($arr)>34){
  echo "<script type='text/javascript'>alert('YOU ARRIVED YOUR MAX LIMIT OF ADDING videos! PLEASE DELETE SOME');</script>";
}
else{
 
    $status = 'error'; 
    if(!empty($_FILES["video"]["name"])) { 
        // Get file info 
        $fileName = basename($_FILES["video"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        // Allow certain file formats 
        $allowTypes = array('mp4','flv','wmv','amv','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            
            $image = $_FILES['video']['tmp_name']; 
            $imgName=$_FILES['video']['name'];
            //copy the file into the folder :videos
            if (!file_exists("videos/".$_FILES['video']['name'])) {
              # code...
            
            move_uploaded_file($image,"videos/".$imgName);
           
            // Insert image info intodatabase 
           // $insert = $db->query("INSERT into activity (image, uploaded) VALUES ('$imgContent', NOW())"); 
             $insertinto=mysqli_query($idd,"INSERT INTO `activity`(`Serial`, `ID_User`, `ID_Mode`, `Activity_Date`, `Path_Data`, `Note`) VALUES (NULL,'$id','2',NULL,'$imgName','$image')");
            }
            else{
              $im=explode(".",$imgName);
              $ide=uniqid();
              $imgName=$im[0].$ide.".".$im[1];

              echo $imgName;
              
              move_uploaded_file($image,"videos/".$imgName);
              $insertinto=mysqli_query($idd,"INSERT INTO `activity`(`Serial`, `ID_User`, `ID_Mode`, `Activity_Date`, `Path_Data`, `Note`) VALUES (NULL,'$id','1',NULL,'$imgName','$image')");

            }
            
            if($insertinto){ 
                $status = 'success'; 
                $statusMsg = "File uploaded successfully."; 
            }else{ 
                $statusMsg = "File upload failed, please try again."; 
            }  
        }else{ 
            $statusMsg = 'Sorry, only mp4,flv,wmv,amv & gif files are allowed to upload.'; 
        } 
    }else{ 
        $statusMsg = 'Please select an video file to upload.'; 
    } 
}
 }
 
// Display status message 
echo $statusMsg; 

  // Get image name
    //$image = $_FILES['image']['name'];
 // $insertinto=mysqli_query($idd,"INSERT INTO `activity`(`Serial`, `ID_User`, `ID_Mode`, `Activity_Date`, `Path_Data`, `Note`) VALUES (NULL,'$id','1',NULL,'$image','mynote')");

  










?>








<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"/>
    <title>Mini Ajax File Upload Form</title>

    <!-- Google web fonts -->
    <link href="http://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700" rel='stylesheet' />
<style>  .in{
    background-color:rgb(76, 168, 175);
  border: none;
  color: white;
  padding: 15px 60px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px 10px 45px;
  cursor: pointer;
}</style>
    <!-- The main CSS file -->
    <link href="assets/css/style.css" rel="stylesheet" />
  </head>

  <body>

    <form  method="post" action="addVideo.php"  class="bb" enctype="multipart/form-data" >
       
      <div id="drop">

        Drop Here

        <a>Browse</a>
        <input type="file" name="video" multiple/>

      </div>
      

      <input type="submit" name="upload" value="ADD" class="in">
    </form>

   
        
    <!-- JavaScript Includes -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="assets/js/jquery.knob.js"></script>

    <!-- jQuery File Upload Dependencies -->
    <script src="assets/js/jquery.ui.widget.js"></script>
    <script src="assets/js/jquery.iframe-transport.js"></script>
    <script src="assets/js/jquery.fileupload.js"></script>
    
    <!-- Our main JS file -->
    <script src="assets/js/script.js"></script>


    <!-- Only used for the demos. Please ignore and remove. --> 
        <script src="http://cdn.tutorialzine.com/misc/enhance/v1.js" async></script>

  </body>
</html>