<?php
session_start();
$idd=mysqli_connect("localhost","root","")
or die("error connect");

if(!isset($_SESSION['login_user'])) {
  header("location:login.php");
}


$db=mysqli_select_db($idd,"project");
$username=$_SESSION['login_user'];
$query = mysqli_query($idd,"select * from User where Nick_Name ='$username'" );
$id_row=mysqli_fetch_row($query); //to seprate the query into several rows.
$id=$id_row[0];
$users=mysqli_query($idd, "select * from user where ID_User_Type='2'");
$arr=array();
$arr2=array();
$fname=array();
$lname=array();


 $wedPrice=mysqli_query($idd,"select * from price_list where ID_Subject='1' AND ID_Mode='1' AND ID_Unit='2' ");  
  // $row1=mysqli_num_rows($res1);
    $res17=mysqli_fetch_assoc($wedPrice);
     $wedId=$res17["ID_Photographer"]; //id of user majored in session
 
   $gradPrice=mysqli_query($idd,"select * from price_list where ID_Subject='2' AND ID_Mode='1' AND ID_Unit='2' ");  
   $res2=mysqli_fetch_assoc($gradPrice);
   $gradId=$res2["ID_Photographer"]; //id of user majored in graduation
 

   $BirthPrice=mysqli_query($idd,"select * from price_list where ID_Subject='3' AND ID_Mode='1' AND ID_Unit='2' "); 
     $res3=mysqli_fetch_assoc($BirthPrice);
      $BIrthId=$res3["ID_Photographer"]; //id of user majored in Birthday

    $SessPrice=mysqli_query($idd,"select  * from price_list where ID_Subject='4' AND ID_Mode='1' AND ID_Unit='2' ");
       $res4=mysqli_fetch_assoc($SessPrice);
     // $row4=mysqli_num_rows($res4);
       $sessId=$res4["ID_Photographer"]; //id of user majored in session
     
while ($res=mysqli_fetch_assoc($users)) {
  //username & prfile pic & ID  for each one of these 6 users.
  array_push($arr,$res["ID"] );
  array_push($fname,$res["First_Name"]);
  array_push($lname,$res["Last_Name"]);
  array_push($arr2,$res["Personal_Photo"]);

}




?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title> Home</title>
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
                <li class="active"><a href="home2.php">Home</a></li>
                <li class="has-children">
                  <a href="index.html">Photography</a>
                  <ul class="dropdown">
                    <li><a href="#Grad">Graduation</a></li>
                    <li><a href="index.html">Birthday Party</a></li>
                    <li><a href="#Weddingg">Wedding</a></li>
                    <li><a href="index.html">Session</a></li>
                    <li class="has-children">
                      <a href="#">type</a>
                      <ul class="dropdown">
                        <li><a href="#">Photos</a></li>
                        <li><a href="#">Videos</a></li>
                        <li><a href="#">Photos and Videos</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="contactus.html">Contact</a></li>
                <li class="has-children">
                  
                  
                    
                
                <li><a href="logout.php">Log Out</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="ProfilePhotographer.php "class="pl-0 pr-3"><label><?php  echo $_SESSION['login_user']  ?></label></a>
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



        <div class="row">
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">

            <a class="image-gradient"  <?php echo "href=ProfileUser.php?id=".$arr[0];?>>
              <figure>
                <img src=<?php echo "'images/".$arr2[0]."'";  ?> alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3><?php echo $fname[0]." ".$lname[0]; ?></h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <a class="image-gradient"  <?php echo "href=ProfileUser.php?id=".$arr[1]; ?>>
              <figure>
                <img src=<?php echo "'images/".$arr2[1]."'";  ?> alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3><?php echo $fname[1]." ".$lname[1]; ?></h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <a class="image-gradient"  <?php echo "href=ProfileUser.php?id=".$arr[2]; ?>>
              <figure>
                <img src=<?php echo "'images/".$arr2[2]."'";  ?> alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3><?php echo $fname[2]." ".$lname[2]; ?></h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <a class="image-gradient" <?php echo "href=ProfileUser.php?id=".$arr[3]; ?>>
              <figure>
                <img src=<?php echo "'images/".$arr2[3]."'";  ?> alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3><?php echo $fname[3]." ".$lname[3]; ?></h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
           <?php if (count($arr)>4) {
            # code...
          ?>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <a class="image-gradient" <?php echo "href=ProfileUser.php?id=".$arr[4]; ?>>
              <figure>
                <img src=<?php echo "'images/".$arr2[4]."'";  ?> alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3><?php echo $fname[4]." ".$lname[4]; ?></h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
           <?php }?>
          <?php if (count($arr)>5) {
            # code...
          ?>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <a class="image-gradient" <?php echo "href=ProfileUser.php?id=".$arr[5]; ?>>
              <figure>
                <img src=<?php echo "'images/".$arr2[5]."'";  ?> alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3><?php echo $fname[5]." ".$lname[5]; ?></h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
        <?php }?>
        </div>
      </div>
    </div>
    <div class="site-section border-bottom">
      <div class="container">
        <div class="row text-center justify-content-center mb-5">
          <div class="col-md-7" data-aos="fade-up">
            <h2 id="Grad">Graduation Events</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_1.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Ali</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_2.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Sohaib</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_3.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Mohammad</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_4.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Adnan</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_5.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Sara</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_6.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Sara kman marra</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="site-section border-bottom">
      <div class="container">
        <div class="row text-center justify-content-center mb-5">
          <div class="col-md-7" data-aos="fade-up">
            <h2 id="Weddingg">Wedding</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_1.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Ali</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="200">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_2.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Sohaib</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_3.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Mohammad</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_4.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Adnan</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_5.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Sara</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
          <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <a class="image-gradient" href="ProfileUser.html">
              <figure>
                <img src="images/img_6.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <h3>Sara kman marra</h3>
                <span>5 photos / Nature</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>

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