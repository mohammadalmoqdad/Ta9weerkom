<?php
session_start();
$idd=mysqli_connect("localhost","root","")
or die("error connect");

if(!isset($_SESSION['login_user'])) {
  header("location:login.php");
}

$db=mysqli_select_db($idd,'project');
$username=$_SESSION['login_user'];
  $query=mysqli_query($idd,"select * from User where Nick_Name ='$username'" );
$id_row=mysqli_fetch_row($query); //to seprate the query into several rows.
  $user=$id_row[0];




$query1=mysqli_query($idd,"select * from booking where ID_Photographer='$user' " );
$id_row1=mysqli_fetch_row($query1); //to seprate the query into several rows.
$c=$id_row1[8];
$unit=$id_row[2];
$mode=$id_row[3];
$subj=$id_row[10];




  



if(isset($_GET['delete'])) {
  if(mysqli_query($idd,"delete from booking where ID = '$_GET[delete]'")){
    header('location:homeph.php');
  }
}


if(isset($_GET['edit'])) {
  if(mysqli_query($idd,"UPDATE booking SET 'ID_status'='$row1[5]' WHERE ID ='$_GET[edit]'")){
    //header('location:homeph.php');
  }
}
if(!isset($_SESSION['login_user'])) {
  header("location:login.php");
}




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>ProfPhotographer</title>
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
    <style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: rgb(76, 147, 175);
  color: white;
}
</style>
  </head>
  <body>
  
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
            <h1 class="mb-0"><a href="home.php" class="text-black h2 mb-0">TasweerCom<span class="text-primary">.</span></a></h1>
          </div>
          <div class="col-10 col-md-8 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right text-lg-center" role="navigation">

              <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block">
                <li class="active"><a href="home.php">Home</a></li>
                
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="contactus.html">Contact</a></li>
                <li class="has-children">
                  
                  
                  

                   <li><a href="request.php">Requests</a></li>
                    <li><a href="addsubject.php">ADD SUBJECT</a></li>
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="#" class="pl-0 pr-3"><label><a href="ProfilePhotographer.php"><?php  echo $_SESSION['login_user']  ?> </a></label></a>
                </li>
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

    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url('images/Mainpic.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up">
            <h1>Welcome to Freelancing Photographer website</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="site-block-profile-pic" data-aos="fade" data-aos-delay="200">
      <a href="about.html"><img src="images/person_7.jpg" alt="Image"></a>
    </div>
<?php

$sql="SELECT booking.Date_Time as date,booking.price as price,booking.description as book_description,
booking.hour_booking as booking_hour,

unit.Description as unit_disc ,
action_mode.Description as action_disc,
booking_status.Description as status_disc ,
user.First_Name as first_name,user.Last_Name as last_name,
subject.Type as subject_type

from booking
INNER JOIN unit ON booking.ID_Unit = unit.id
INNER JOIN action_mode ON booking.ID_Mode = action_mode.id
INNER JOIN booking_status ON booking.ID_Status = booking_status.id
INNER JOIN user ON booking.ID_Client  = user.id
INNER JOIN subject ON booking.ID_Subject   = subject.id

where  ID_Photographer='$user' AND ID_Status='3'






";
$data= mysqli_query($idd, $sql);
      
        


    print "<table id='customers'>";
  print "<tr>
    <th>Client Name</th>
    <th>Date event</th>
    <th>unit</th>
    <th>mode</th>
    <th>Hour</th>
    <th>Subject</th>
    <th>description</th>
    
    <th> Total Price</th>
    
  </tr>";
  while ($row = mysqli_fetch_assoc($data)) {
    

    print "<tr>";
    echo ' <td>'.$row['first_name'].$row['last_name'].'</td>';
    echo '<td>'.$row['date'].'</td>';
    echo '<td>'.$row['unit_disc'].'</td>';
    echo '<td>'.$row['action_disc'].'</td>';
    echo '<td>'.$row['booking_hour'].'</td>';
    echo '<td>'.$row['subject_type'].'</td>';
    echo '<td>'.$row['book_description'].'</td>';
    echo '<td>'.$row['price'].'</td>';
   
   
  print"</tr>";
 }

print"</table>"; 
  
  
  
  ?>
<div class="py-3 mb-5 mt-5">
     <div class="container">
       <div class="row">
         <div class="col-md-12 d-md-flex align-items-center" data-aos="fade">
           <h2 class="text-black mb-5 mb-md-0 text-center text-md-left">Need us?</h2>
           <div class="ml-auto text-center text-md-left">
            <a href="contact.html" class="btn btn-danger py-3 px-5 rounded">Contact us</a>
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
              <h3 class="footer-heading mb-4">ABOUT US</h3>
              <p></p>
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
                  <li><a href="#">About US</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                  <li><a href="#">Contact US</a></li>
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
            
          </div>
          
        </div>
      </div>
    </footer>


    

    
  </div>

    
  </body>
</html>