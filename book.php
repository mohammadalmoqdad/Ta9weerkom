<?php
session_start();

if(!isset($_SESSION['login_user'])) {
  header("location:login.php");
}

$idd=mysqli_connect("localhost","root","")
or  die("error connect");

if (!isset($_GET['id'])) {
  header("location:login.php");
}

$photo=$_GET['id'];


$db=mysqli_select_db($idd,"project");



if(isset($_POST['submit'])){



  $username=$_SESSION['login_user'];
  $query=mysqli_query($idd,"select * from User where Nick_Name ='$username'" );
  $id_row=mysqli_fetch_row($query); //to seprate the query into several rows.
  $user=$id_row[0];

  $hour=$_POST['hour'];
  $Description=$_POST['Description'];
  $type=$_POST['type'];
  
  $subject=$_POST['subject'];
  $unit=$_POST['unit'];
  $time=$_POST['time'];
  
  
  


$query1=mysqli_query($idd,"select * from Price_list where ID_Photographer ='$photo' and ID_Unit='$unit' and ID_Mode='$type' and ID_Subject='$subject' " );
$id_row1=mysqli_fetch_row($query1); //to seprate the query into several rows.
$r1=$id_row1[4]; 




$price=$r1*$hour;





  

$query7=mysqli_query($idd,"select * from price_list  where ID_Photographer='$photo' And ID_Subject='$subject' AND ID_Mode='$type' ");
  $rows= mysqli_num_rows($query7);
if ($rows==1) {
$boking="INSERT INTO `booking`(`ID`, `Date_Time`, `ID_Unit`, `ID_Mode`, `ID_Status`, `Price`, `description`, `hour_booking`, `ID_Client`, `ID_Photographer`, `ID_Subject`) 
VALUES (null,'$time','$unit','$type','2','$price','$Description','$hour','$user','$photo','$subject')";
$q=mysqli_query($idd,$boking);
echo"  <script>alert('the price for this event $price ')</script>";
}
if ($rows!=1) {
 echo"  <script>alert('This Photographer is not working in this subject')</script>";
}
}


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Booking Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
      }
      h1 {
      position: absolute;
      margin: 0;
      font-size: 32px;
      color: #fff;
      z-index: 2;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 20px 0 #a82877; 
      }
      .banner {
      position: relative;
      height: 210px;
      background-image: url("/uploads/media/default/0001/02/8ca4045044162379597641472fa0bb5489ba418f.jpeg");      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      background-color: rgba(0, 0, 0, 0.5); 
      position: absolute;
      width: 100%;
      height: 100%;
      }
      input, textarea, select {
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 3px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      select {
      width: 100%;
      padding: 7px 0;
      background: transparent;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color: #a82877;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 6px 0 #a82877;
      color: #a82877;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #a9a9a9;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 0;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type="time"]::-webkit-inner-spin-button {
      margin: 2px 22px 0 0;
      }
      input[type=radio], input.other {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 10px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      label.radio:before {
      content: "";
      position: absolute;
      top: 2px;
      left: 0;
      width: 15px;
      height: 15px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      #radio_5:checked ~ input.other {
      display: block;
      }
      input[type=radio]:checked + label.radio:before {
      border: 2px solid #a82877;
      background: #a82877;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 7px;
      left: 5px;
      width: 7px;
      height: 4px;
      border: 3px solid #fff;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background: #a82877;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      button:hover {
      background: #bf1e81;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .city-item input {
      width: calc(50% - 20px);
      }
      .city-item select {
      width: calc(50% - 8px);
      }
      }
    </style>
  </head>
  <body>
    <div class="testbox">
      <form action="" method="POST">
        <div class="banner">
          <h1>Booking Form</h1>
        </div>
        <div class="item">
          
        <div class="item">
          <p>Time of Event</p>
          <input type="datetime-local" id="time" name="time" required="">
   
        </div>
        <div class="item">
          <p>Select the Subject</p>
          <select name="subject">
            <option value=""></option>
            
            <option value="1">Wedding</option>
             <option value="2">Graduation</option>
            <option value="3">Birthday</option>
            <option value="4">Session</option>
          </select>
          <div class="item">
          <p>Mode</p>
          <select name="type" required>
            <option value=""></option>
            
            <option value="1">photo</option>
            <option value="2">video </option>
            <option value="3">Both </option>
        
          </select>
        </div>

        </div>
        <div class="item">
          <p>Unit</p>
          <select name="unit" required>
            <option value=""></option>
            
            <option value="2">Per Hour</option>
            <option value="1">Full : note that full means at least 6 hour</option>
          </select>
        </div>
        <div class="item">
          <p>Set Time (in Hours)</p>
          <input type="number" name="hour" placeholder="Full Means at least 6 hours" / >
        </div>
        
        <div class="item">
          <p>Description of Event</p>
          <input type="text" name="Description"  ></textarea>
        </div>
        
        
        
        </div>
        
        <div class="btn-block">
          <input name="submit" type="submit" value=" Book now ">
                </div>
      </form>
    </div>
  </body>
</html>