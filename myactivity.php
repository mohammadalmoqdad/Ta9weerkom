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
                <li><a href="index.html">Home</a></li>
                <li class="has-children active">
                  <a href="index.html">Photography</a>
                  <ul class="dropdown">
                    <li><a href="index.html">Graduation</a></li>
                    <li><a href="index.html">Birthday Party</a></li>
                    <li><a href="index.html">Wedding</a></li>
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
                
                <li><a href="about.html">About</a></li>
                
                <li class="active"><a href="contactus.html">Contact</a></li>
                <li class="has-children">
                  <a href="#">SIGN UP</a>
                  <ul class="dropdown">
                    <li><a href="signupC.html">Client</a></li>
                    <li><a href="SignupP.html">Photographer</a></li>
                   
                  
                  </ul>
                <li><a href="Login.html">Login</a></li>
              </ul>
            </nav>
          </div>

          <div class="col-6 col-xl-2 text-right">
            <div class="d-none d-xl-inline-block">
              <ul class="site-menu js-clone-nav ml-auto list-unstyled d-flex text-right mb-0" data-class="social">
                <li>
                  <a href="#" class="pl-0 pr-3"><label>MyProfile</label></a>
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

    <div class="site-blocks-cover overlay inner-page-cover" style="background-image: url('images/hero_bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7 text-center" data-aos="fade-up">
            <h1>Sohaib Nasser</h1>
            <div id="edit" contenteditable="true" class="caption">
             <p>Edit your BIO</p> 
              </div>
             
              <div id="update"></div>
          </div>
        </div>
      </div>
    </div>
    
    <button type="button">Add Pictures</button>
    <button type="button">Add Videos</button>
    <label for="note">Add Caption</label>
    <input type="text" value="" placeholder="Optional">

   
    <div class="site-section"  data-aos="fade">
    <div class="container">
      
      <div class="row no-gutters" id="lightgallery">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_1.jpg">
          <a href="#"><img src="images/nature_small_1.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div> 
        
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_2.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam omnis quaerat molestiae, praesentium. Ipsam, reiciendis. Aut molestiae animi earum laudantium.</p>">
          <a href="#"><img src="images/nature_small_2.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_3.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem reiciendis, dolorum illo temporibus culpa eaque dolore rerum quod voluptate doloribus.</p>">
          <a href="#"><img src="images/nature_small_3.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_4.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim perferendis quae iusto omnis praesentium labore tempore eligendi quo corporis sapiente.</p>">
          <a href="#"><img src="images/nature_small_4.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_5.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe, voluptatum voluptate tempore aliquam, dolorem distinctio. In quas maiores tenetur sequi.</p>">
          <a href="#"><img src="images/nature_small_5.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_6.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum cum culpa blanditiis illum, voluptatum iusto quisquam mollitia debitis quaerat maiores?</p>">
          <a href="#"><img src="images/nature_small_6.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
          
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_7.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores similique impedit possimus, laboriosam enim at placeat nihil voluptatibus voluptate hic!</p>">
          <a href="#"><img src="images/nature_small_7.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_8.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam vitae sed cum mollitia itaque soluta laboriosam eaque sit ratione, aliquid.</p>">
          <a href="#"><img src="images/nature_small_8.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_9.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem reiciendis debitis beatae facilis quos, enim quis nobis magnam architecto earum!</p>">
          <a href="#"><img src="images/nature_small_9.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_9.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque officiis magnam, facilis nam eos perspiciatis eligendi pariatur numquam debitis quos!</p>">
          <a href="#"><img src="images/nature_small_9.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_8.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis consequatur quam et, delectus, cum iste ipsa animi eligendi obcaecati nemo.</p>">
          <a href="#"><img src="images/nature_small_8.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_7.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci quia illo voluptatibus numquam inventore, ab asperiores molestiae distinctio atque nihil.</p>">
          <a href="#"><img src="images/nature_small_7.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_6.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt unde placeat obcaecati sapiente illum, fuga nostrum necessitatibus delectus maiores magnam.</p>">
          <a href="#"><img src="images/nature_small_6.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_5.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptas dignissimos non consectetur. Facilis totam, explicabo nam iure! Veniam modi, molestiae.</p>">
          <a href="#"><img src="images/nature_small_5.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_4.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias minus voluptatibus inventore odio. Iure amet nesciunt a, officia quo ex.</p>">
          <a href="#"><img src="images/nature_small_4.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_3.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium illum consectetur dolorum consequuntur sint doloribus eveniet deleniti! Illo, quibusdam, earum.</p>">
          <a href="#"><img src="images/nature_small_3.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_2.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto ad iure, inventore asperiores, cupiditate optio dignissimos labore quidem totam. Dignissimos.</p>">
          <a href="#"><img src="images/nature_small_2.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_1.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nam temporibus totam similique provident delectus quos fugiat officia earum nisi voluptatibus?</p>">
          <a href="#"><img src="images/nature_small_1.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>


        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_1.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe beatae qui aliquid nostrum unde ut officiis omnis delectus sequi deleniti!</p>">
          <a href="#"><img src="images/nature_small_1.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_2.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi iusto vero, soluta porro dicta quaerat tempore magni perferendis aspernatur cupiditate.</p>">
          <a href="#"><img src="images/nature_small_2.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_3.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, minus officiis modi ducimus reprehenderit at ea voluptatum consequuntur enim nulla.</p>">
          <a href="#"><img src="images/nature_small_3.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_4.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis eligendi hic sed, quidem illum ipsa, cum tempora quo reiciendis accusantium.</p>">
          <a href="#"><img src="images/nature_small_4.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_5.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex blanditiis quaerat numquam repellendus pariatur commodi neque animi voluptatum illum dolore?</p>">
          <a href="#"><img src="images/nature_small_5.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_6.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio praesentium maiores, veritatis illum voluptas alias aut unde esse aliquam itaque.</p>">
          <a href="#"><img src="images/nature_small_6.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_7.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Incidunt fugit, non facilis dignissimos minima nostrum nesciunt adipisci, quibusdam cum reprehenderit.</p>">
          <a href="#"><img src="images/nature_small_7.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_8.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos iure delectus obcaecati atque fugit enim quaerat suscipit tenetur in ratione?</p>">
          <a href="#"><img src="images/nature_small_8.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_9.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa neque, eos quae eaque officia, repellendus dolore tempore cumque quibusdam? Maxime?</p>">
          <a href="#"><img src="images/nature_small_9.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_9.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam, unde quis minus ex impedit necessitatibus nostrum, neque veniam repellat officiis!</p>">
          <a href="#"><img src="images/nature_small_9.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_8.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel eveniet sequi assumenda deserunt ab, tempora commodi autem debitis iusto sed.</p>">
          
          <a href="#"><img src="images/nature_small_8.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_7.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore, quasi, pariatur. Minima provident repellat cum, impedit, nemo exercitationem distinctio consequuntur.</p>">
          <a href="#"><img src="images/nature_small_7.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_6.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus nostrum expedita consequatur rerum laboriosam tempore nisi autem animi eveniet perspiciatis.</p>">
          <a href="#"><img src="images/nature_small_6.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_5.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque consectetur error deserunt facilis facere, consequatur at officia quae culpa voluptatibus!</p>">
          <a href="#"><img src="images/nature_small_5.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_4.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti minima porro, hic dolores. Ab, doloremque facilis numquam, ipsa repellendus voluptas.</p>">
          <a href="#"><img src="images/nature_small_4.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>

        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_3.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, dolor alias. Dignissimos hic voluptatibus dolorum expedita recusandae, consequatur distinctio est.</p>">
          <a href="#"><img src="images/nature_small_3.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_2.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum similique, dolore esse quaerat incidunt ullam sit neque laboriosam velit quas.</p>">
          <a href="#"><img src="images/nature_small_2.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-2 item" data-aos="fade" data-src="images/big-images/nature_big_1.jpg" data-sub-html="<h4>Fading Light</h4><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quidem tempora deleniti, consectetur quisquam labore vitae quod quae debitis hic ab!</p>">
          <a href="#"><img src="images/nature_small_1.jpg" alt="IMage" class="img-fluid"></a>
          <button type="button" onclick="alert('Deleted!')">Delete!</button>
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
                <p><strong class="font-weight-bold text-primary">25$</strong></p>
                
              </div>
            </div>
            
            <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5" data-aos="fade" data-aos-delay="200">
              <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                <span class="icon flaticon-picture display-3 text-primary mb-4 d-block"></span>
                <h3 class="text-black h4">Wedding Photography</h3>
                <p></p>
                <p><strong class="font-weight-bold text-primary">$46</strong></p>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5" data-aos="fade" data-aos-delay="300">
              <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                <span class="icon flaticon-sheep display-3 text-primary mb-4 d-block"></span>
                <h3 class="text-black h4">Animal</h3>
                <p></p>
                <p><strong class="font-weight-bold text-primary">$24</strong></p>
              </div>
            </div>

            <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5" data-aos="fade" data-aos-delay="400">
              <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                <span class="icon flaticon-frame display-3 text-primary mb-4 d-block"></span>
                <h3 class="text-black h4">Graduation</h3>
                <p></p>
                <p><strong class="font-weight-bold text-primary">$40</strong></p>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5" data-aos="fade" data-aos-delay="500">
              <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                <span class="icon flaticon-eiffel-tower display-3 text-primary mb-4 d-block"></span>
                <h3 class="text-black h4">Sessions</h3>
                <p></p>
                <p><strong class="font-weight-bold text-primary">$35</strong></p>
              </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-4 text-center mb-5 mb-lg-5" data-aos="fade" data-aos-delay="600">
              <div class="h-100 p-4 p-lg-5 bg-light site-block-feature-7">
                <span class="icon flaticon-video-play display-3 text-primary mb-4 d-block"></span>
                <h3 class="text-black h4">Video Editing</h3>
                <p></p>
                <p><strong class="font-weight-bold text-primary">$15</strong></p>
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