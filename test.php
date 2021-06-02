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

 $query7=mysqli_query($idd,"select * from price_list  where ID_Photographer='$id' And ID_Subject='$subject' AND ID_Mode='$type' ");

