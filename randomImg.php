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
  $query2 = mysqli_query($idd,"select * from activity where ID_Mode='1' AND  ID_User ='$id' " );//return the rows that the photographer have images in .

  $query3 = mysqli_query($idd,"select * from activity where ID_User ='$id' AND ID_Mode='2'" ); //return the rows that the photographer have videos in .

  // while ($res=mysqli_fetch_assoc($query2)) {
                                //echo "<img src='".base64_encode($res['Path_Data'])." alt='no' ><br>"; if restored from DB and it's DataType is LongBlob.
       // echo "<img width='320' height='240'src='images/".$res['Path_Data']."' >";
  //  }

$arr=array();
while ($res=mysqli_fetch_assoc($query2)) {
  array_push($arr,$res["Path_Data"] );
}



$ar=array();
while (count($ar)<6) {
 

  if (!in_array($arr[array_rand($arr)],$ar)) {
   
    array_push($ar,$arr[array_rand($arr)]);
  }
}
foreach ($ar as $k) {
  # code...
  echo "<img width='320' height='200' src= '"."images/".$k."' alt='no'>" ;
}
?>