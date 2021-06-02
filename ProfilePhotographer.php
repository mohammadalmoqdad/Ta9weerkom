<?php
session_start();
$idd=mysqli_connect("localhost","root","")
or die("error connect");


if(!isset($_SESSION['login_user'])) {
  header("location:login.php");
}
$db=mysqli_select_db($idd,"project");
$username=$_SESSION['login_user'];

  //firstly have to add some pics because it is related to user id, so i will make page to add images on activity table

  $query = mysqli_query($idd,"select * from User where Nick_Name ='$username'" );
    $id_row=mysqli_fetch_row($query); //to seprate the query into several rows.
    $id=$id_row[0]; //get the wanted row (id row).
    $user_type=$id_row[11];
    $ema=$id_row[3];
      $fname=$id_row[1];
    $lname=$id_row[2];
      $usern=$fname." ".$lname;
    $profPic=$id_row[5];
  $query2 = mysqli_query($idd,"select * from activity where ID_Mode='1' AND  ID_User ='$id' " );//return the rows that the photographer have images in .

  $query3 = mysqli_query($idd,"select * from activity where ID_User ='$id' AND ID_Mode='2'" ); //return the rows that the photographer have videos in .



   $wedPrice=mysqli_query($idd,"select * from price_list   where ID_Photographer='$id' And ID_Subject='1' AND ID_Mode='1' AND ID_Unit='2' ");  
   $res1=mysqli_fetch_assoc($wedPrice);
 
   $gradPrice=mysqli_query($idd,"select * from price_list   where ID_Photographer='$id' And ID_Subject='2' AND ID_Mode='1' AND ID_Unit='2' ");  
   $res2=mysqli_fetch_assoc($gradPrice);
   
   $BirthPrice=mysqli_query($idd,"select * from price_list   where ID_Photographer='$id' And ID_Subject='3' AND ID_Mode='1' AND ID_Unit='2' ");   $res3=mysqli_fetch_assoc($BirthPrice);
   
    $SessPrice=mysqli_query($idd,"select * from price_list   where ID_Photographer='$id' And ID_Subject='4' AND ID_Mode='1' AND ID_Unit='2' ");   $res4=mysqli_fetch_assoc($SessPrice);
  










$arr=array();
while ($res=mysqli_fetch_assoc($query2)) {
  array_push($arr,$res["Path_Data"] );
}

$videos=array();
while ($res2=mysqli_fetch_assoc($query3)) {
  array_push($videos,$res2['Path_Data']);
  }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ProfPhotographer</title>
            <style>
   button {
    background-color:rgb(76, 168, 175);
  border: none;
  color: white;
  padding: 15px 60px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

   
    
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300i,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/lightgallery.min.css">    
    
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
    
    <link rel="stylesheet" href="css/swiper.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
    <script type="text/javascript">
     function saveEdits() {

//get the editable element
var editElem = document.getElementById("edit","edit2");

//get the edited element content
var userVersion = editElem.innerHTML;

//save the content to local storage
localStorage.userEdits = userVersion;

//write a confirmation to the user
document.getElementById("update").innerHTML="Edits saved!";

}
function checkEdits() {

//find out if the user has previously saved edits
if(localStorage.userEdits!=null)
document.getElementById("edit").innerHTML = localStorage.userEdits;
}



$(document).ready(function(){
  $("button").click(function(){
    $("img").remove();
  });
});




    </script>
  </head>
  <body onload="checkEdits()==true">
  
  <div class="site-wrap">

    
    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    

    <header class="site-navbar py-3" role="banner">
      
      


      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-6 col-xl-2">
            <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">TasweerCom<span class="text-primary">.</span></a></h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li><a href="home2.php">Home</a></li>
                              
               
                
                <li class="active"><a href="contactus.html">Contact</a></li>
                <li class="has-children">
                <li><a href="logout.php">Log Out</a></li>
                <?php 
                if ($user_type==2) {
                  # code...
                
                ?>
                <li>
                  <a  href="works.php" class="pl-0 pr-3"><label>My Activity</label></a>
                </li>
                 <li>
                   <a href="editSubject.php" class="pl-0 pr-3"><label>Edit Subject Details & Prices</label></a>
                  
                </li>  
              <?php } ?>
                <?php 
                if ($user_type==1) {
                  # code...
                
                ?>
                <li>
                  <a href="works.php" class="pl-0 pr-3"><label>My Activity</label></a>
                </li>
                   <li>
                  <a href="editSubject.php" class="pl-0 pr-3"><label>Edit Subject Details & Prices</label></a>
                </li>
              <?php } ?>
                  
                    <?php 
                if ($user_type==3) {

                  echo " <a href='dateclint.php' class='pl-0 pr-3'><label>My Timetable</label></a>";
                 } ?>
                
              
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
               
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="#" class="pl-3 pr-3"><span class="icon-youtube-play"></span></a>
                </li>
              </ul>
            </div>

            <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>

    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url('images/hero_bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up">
            <h1><?php echo $usern; ?></h1>
            <div id="edit" contenteditable="true" class="caption">
             <p>Edit your BIO</p> 
              </div>
             
              <div id="update"></div>
          </div>
        </div>
      </div>
    </div>

     <?php  if($profPic) { ?>
 <div class="site-block-profile-pic" data-aos="fade" data-aos-delay="200">
     <img <img src= <?php   echo "images/".$profPic; ?> alt="No Profile Image yet"><br>
      
    </div>

     <?php } ?>
     <a <?php echo "href=editUserInfo.php";?> ><button style="margin-left: 550px" type="button">Edit Profile</button></a>

    <div class="site-section"  data-aos="fade">
    <div class="container">
      
      <div class="row no-gutters" id="lightgallery">
        <?php if(count($arr)>0) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[0];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor doloremque hic excepturi fugit, sunt impedit fuga tempora, ad amet aliquid?</p>">
          <a href="#"><img width="320" height="200" src= <?php echo "images/".$arr[0];?>  alt="IMage" class="img-fluid"></a>
          
        </div>
      <?php } ?>
      <?php if(count($arr)>1) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php  if(count($arr)>1) { echo "images/".$arr[1]; }?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam omnis quaerat molestiae, praesentium. Ipsam, reiciendis. Aut molestiae animi earum laudantium.</p>">
          <a href="#"><img src= <?php  if(count($arr)>1) { echo "images/".$arr[1]; }?> alt="IMage" class="img-fluid"></a>
        </div> 
         <?php } ?>
        <?php if(count($arr)>2) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src= <?php echo "images/".$arr[2];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem reiciendis, dolorum illo temporibus culpa eaque dolore rerum quod voluptate doloribus.</p>">
          <a href="#"><img src= <?php echo "images/".$arr[2];?>  alt="IMage"  class="img-fluid"></a>
        </div>
         <?php } ?>
        <?php if(count($arr)>3) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[3];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim perferendis quae iusto omnis praesentium labore tempore eligendi quo corporis sapiente.</p>">
          <a href="#"><img src= <?php  echo "images/".$arr[3];?> alt="IMage" class="img-fluid"></a>
        </div>
         <?php } ?>
        <?php if(count($arr)>4) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[4];?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, voluptatum voluptate tempore aliquam, dolorem distinctio. In quas maiores tenetur sequi.</p>">
          <a href="#"><img src= <?php echo "images/".$arr[4];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
        <?php if(count($arr)>5) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[5];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores similique impedit possimus, laboriosam enim at placeat nihil voluptatibus voluptate hic!</p>">
          <a href="#"><img src= <?php  echo "images/".$arr[5];?> alt="IMage" class="img-fluid"></a>
        </div>
         <?php } ?>
        <?php if(count($arr)>6) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[6];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam vitae sed cum mollitia itaque soluta laboriosam eaque sit ratione, aliquid.</p>">
          <a href="#"><img src= <?php echo "images/".$arr[6]; ?> alt="IMage" class="img-fluid"></a>
        </div>
         <?php } ?>
         <?php if(count($arr)>7) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[7];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem reiciendis debitis beatae facilis quos, enim quis nobis magnam architecto earum!</p>">
          <a href="#"><img src= <?php  echo "images/".$arr[7];?> alt="IMage" class="img-fluid"></a>
        </div>
         <?php } ?>
          <?php if(count($arr)>8) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[8];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque officiis magnam, facilis nam eos perspiciatis eligendi pariatur numquam debitis quos!</p>">
          <a href="#"><img src= <?php echo "images/".$arr[8];?> alt="IMage" class="img-fluid"></a>
        </div>
         <?php } ?>
         <?php if(count($arr)>9) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[9];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis consequatur quam et, delectus, cum iste ipsa animi eligendi obcaecati nemo.</p>">
          <a href="#"><img src= <?php echo "images/".$arr[9];?> alt="IMage" class="img-fluid"></a>
        </div>
         <?php } ?>
         <?php if(count($arr)>10) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[10];?> data-sub-html="><h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quia illo voluptatibus numquam inventore, ab asperiores molestiae distinctio atque nihil.</p>">
          <a href="#"><img src= <?php  echo "images/".$arr[10];?> alt="IMage" class="img-fluid"></a>
        </div>
         <?php } ?>
          <?php if(count($arr)>11) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[11];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt unde placeat obcaecati sapiente illum, fuga nostrum necessitatibus delectus maiores magnam.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[11];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>12) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[12];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dignissimos non consectetur. Facilis totam, explicabo nam iure! Veniam modi, molestiae.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[12];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>13) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[13];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias minus voluptatibus inventore odio. Iure amet nesciunt a, officia quo ex.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[13];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>14) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[14];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium illum consectetur dolorum consequuntur sint doloribus eveniet deleniti! Illo, quibusdam, earum.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[14];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>15) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[15];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ad iure, inventore asperiores, cupiditate optio dignissimos labore quidem totam. Dignissimos.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[15];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>16) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[16];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam temporibus totam similique provident delectus quos fugiat officia earum nisi voluptatibus?</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[16];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>17) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[17];?>" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe beatae qui aliquid nostrum unde ut officiis omnis delectus sequi deleniti!</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[17];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>18) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[18];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi iusto vero, soluta porro dicta quaerat tempore magni perferendis aspernatur cupiditate.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[18];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>19) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[19];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, minus officiis modi ducimus reprehenderit at ea voluptatum consequuntur enim nulla.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[19];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>20) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[20];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eligendi hic sed, quidem illum ipsa, cum tempora quo reiciendis accusantium.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[20];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>21) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[21];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex blanditiis quaerat numquam repellendus pariatur commodi neque animi voluptatum illum dolore?</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[21];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>22) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[22];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio praesentium maiores, veritatis illum voluptas alias aut unde esse aliquam itaque.</p>">
          <a href="#"><img src= <?php  echo "images/".$arr[22];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>23) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[23];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt fugit, non facilis dignissimos minima nostrum nesciunt adipisci, quibusdam cum reprehenderit.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[23];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>24) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[24];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure delectus obcaecati atque fugit enim quaerat suscipit tenetur in ratione?</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[24];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>25) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[25];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa neque, eos quae eaque officia, repellendus dolore tempore cumque quibusdam? Maxime?</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[25];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>26) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[26];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, unde quis minus ex impedit necessitatibus nostrum, neque veniam repellat officiis!</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[26];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>27) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[27];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel eveniet sequi assumenda deserunt ab, tempora commodi autem debitis iusto sed.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[27];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>28) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[28];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, quasi, pariatur. Minima provident repellat cum, impedit, nemo exercitationem distinctio consequuntur.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[28];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>29) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[29];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus nostrum expedita consequatur rerum laboriosam tempore nisi autem animi eveniet perspiciatis.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[29];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>30) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[30];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque consectetur error deserunt facilis facere, consequatur at officia quae culpa voluptatibus!</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[30];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>31) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[31];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti minima porro, hic dolores. Ab, doloremque facilis numquam, ipsa repellendus voluptas.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[31];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>32) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[32];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, dolor alias. Dignissimos hic voluptatibus dolorum expedita recusandae, consequatur distinctio est.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[32];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>33) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[33];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum similique, dolore esse quaerat incidunt ullam sit neque laboriosam velit quas.</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[33];?>  alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>
         <?php if(count($arr)>34) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[34];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem tempora deleniti, consectetur quisquam labore vitae quod quae debitis hic ab!</p>">
          <a href="#"><img src=<?php  echo "images/".$arr[34];?> alt="IMage" class="img-fluid"></a>
        </div>
        <?php } ?>

        <?php if(count($arr)>35) { ?>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src=<?php echo "images/".$arr[35];?> data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum cum culpa blanditiis illum, voluptatum iusto quisquam mollitia debitis quaerat maiores?</p>">
          <a href="#"><img src= <?php echo "images/".$arr[35];?> alt="IMage" class="img-fluid"></a>
        </div>
         <?php } ?>


         <div>
          <?php if(count($videos)>0) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[0]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[0];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
          <?php if(count($videos)>1) { ?>
    <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[1]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[1];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div> 
         <?php } ?>
         <?php if(count($videos)>2) { ?>
    <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[2]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[2];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
         <?php if(count($videos)>3) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[3]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[3];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         
         <?php } ?>
         
          <?php if(count($videos)>4) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[4]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[4];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
          <?php if(count($videos)>5) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[5]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[5];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>6) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[6]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[6];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        <?php } ?>
         <?php if(count($videos)>7) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[7]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[7];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div> 
         <?php } ?>
          <?php if(count($videos)>8) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[8]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[8];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>9) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[9]."'";?>   type='video/mp4'>
            <source src= <?php echo "videos/".$videos[9];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>10) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[10]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[10];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div> 
         <?php } ?>
          <?php if(count($videos)>11) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[11]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[11];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div> 
         <?php } ?>
          <?php if(count($videos)>12) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[12]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[12];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>13) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[13]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[13];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div> 
         <?php } ?>
          <?php if(count($videos)>14) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[14]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[14];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>15) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[15]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[15];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>16) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[16]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[16];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>17) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[17]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[17];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>18) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[18]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[18];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>19) { ?>

        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[19]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[19];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
           <?php if(count($videos)>20) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[20]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[20];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
      <?php } ?>
         <?php if(count($videos)>21) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[21]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[21];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
        <?php if(count($videos)>22) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[22]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[22];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        <?php } ?>
         <?php if(count($videos)>23) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[23]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[23];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
         <?php } ?>
        <?php if(count($videos)>24) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[24]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[24];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div> 
        <?php } ?>
         <?php if(count($videos)>25) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[25]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[25];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div> 
        <?php } ?>
         <?php if(count($videos)>26) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[26]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[26];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        <?php } ?>
          <?php if(count($videos)>27) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[27]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[27];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        <?php } ?>
          <?php if(count($videos)>28) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[28]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[28];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        <?php } ?>
          <?php if(count($videos)>29) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[29]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[29];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        <?php } ?>
          <?php if(count($videos)>30) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[30]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[30];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        <?php } ?>
          <?php if(count($videos)>31) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[31]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[31];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div> 
        <?php } ?>
         <?php if(count($videos)>32) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[32]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[32];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        <?php } ?>
          <?php if(count($videos)>33) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[33]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[33];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        <?php } ?>
          <?php if(count($videos)>34) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[34]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[34];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div> 
        <?php } ?>
         <?php if(count($videos)>35) { ?>
        <div style="margin: 23px; text-align: center;" > <video width='720' height='440' controls>
            <source  src=<?php echo "'videos/".$videos[35]."'";?>  type='video/mp4'>
            <source src= <?php echo "videos/".$videos[35];?> type='video/ogg'>
            Your browser does not support the video tag.
          </video> 
        </div>
        
        <?php } ?>
      </div>
      </div>
    </div>
  </div>
 
  <div class="site-section"  data-aos="fade">
    <div class="container-fluid">
      
      <div class="row justify-content-center">
        <div class="col-md-7">
          <div class="row mb-5">
            <div class="col-12 " data-aos="fade-up">
              <h2 class="site-section-heading text-center">Pricing</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5" data-aos="fade" data-aos-delay="100">
              <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                <span class="icon flaticon-camera display-3 text-primary mb-4 d-block"></span>
                <h3 class="text-black h4">Birthday</h3>
                <p></p>
                <p><strong class="font-weight-bold text-primary"><?php   if ( $res3["Price"]) {
     echo $res3["Price"];
  }
  else{
    echo "---";
  } ?></strong></p>
                
              </div>
            </div>
            
            <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5" data-aos="fade" data-aos-delay="200">
              <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                <span class="icon flaticon-picture display-3 text-primary mb-4 d-block"></span>
                <h3 class="text-black h4">Wedding Photography</h3>
                <p></p>
                <p><strong class="font-weight-bold text-primary"><?php   if ( $res1["Price"]) {
     echo "$".$res1["Price"];
  }
  else{
    echo "---";
  } ?></strong></p>
              </div>
            </div>
           

            <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5" data-aos="fade" data-aos-delay="400">
              <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                <span class="icon flaticon-frame display-3 text-primary mb-4 d-block"></span>
                <h3 class="text-black h4">Graduation</h3>
                <p></p>
                <p><strong class="font-weight-bold text-primary"><?php   if ( $res2["Price"]) {
     echo $res2["Price"];
  }
  else{
    echo "- -";
  } ?></strong></p>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5" data-aos="fade" data-aos-delay="500">
              <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                <span class="icon flaticon-eiffel-tower display-3 text-primary mb-4 d-block"></span>
                <h3 class="text-black h4">Sessions</h3>
                <p></p>
                <p><strong class="font-weight-bold text-primary"><?php   if ( $res4["Price"]) {
     echo $res4["Price"];
  }
  else{
    echo "- -";
  } ?></strong></p>
              </div>
            </div>
           

          </div>
        </div>
      </div>
    </div>
  </div> 




   <div class="py-3 mb-5 pt-5">
     <div class="container">
       <div class="row">
         <div class="col-md-12 d-md-flex align-items-center">
           <h2 class="text-black mb-5 mb-md-0 text-center text-md-left">Need me?</h2>
           <div class="ml-auto text-center text-md-left">
            <a href="contactphotophotographer.html" class="btn btn-danger py-3 px-5 rounded">Contact Me</a>
           </div>
         </div>
       </div>
     </div>
   </div>


  

  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="mb-5">
              <h3 class="footer-heading mb-4">About ProfPhotographer</h3>
              <p>here is the place which you can find your best photographer for your special occaion</p>
            </div>
          </div>
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                  <li><a href="#">Photography</a></li>
                  <li><a href="#">Gallery</a></li>
                  <li><a href="#">Services</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact Us</a></li>
                  <li><a href="#">Terms</a></li>
                </ul>
              </div>
            </div>


          </div>

          <div class="col-lg-4 mb-5 mb-lg-0">
            <h3 class="footer-heading mb-4">Follow us</h3>

                <div>
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>

            

          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            
            Copyright @2020 All rights reserved | by Zarqa University</a>
           
            </p>
          </div>
          
        </div>
      </div>
    </footer>


    
    
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/swiper.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/picturefill.min.js"></script>
  <script src="js/lightgallery-all.min.js"></script>
  <script src="js/jquery.mousewheel.min.js"></script>

  <script src="js/main.js"></script>
  
  <script>
    $(document).ready(function(){
      $('#lightgallery').lightGallery();
    });
  </script>
    
  </body>
</html>