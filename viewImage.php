<?php
session_start();

$idd=mysqli_connect("localhost","root","")
or die("error connect");
$db=mysqli_select_db($idd,"project");



	$username=$_SESSION['login_user'];
	$query = mysqli_query($idd,"select * from User where Nick_Name ='$username'" );
  	$id_row=mysqli_fetch_row($query); //to seprate the query into several rows.
	$id=$id_row[0]; //get the wanted row (id row).
  	$query2 = mysqli_query($idd,"select * from activity where ID_User ='$id' AND ID_Mode='1'" );//return the rows that the photographer have images in .

	$query3 = mysqli_query($idd,"select * from activity where ID_User ='$id' AND ID_Mode='2'" ); //return the rows that the photographer have videos in .

  	while ($res=mysqli_fetch_assoc($query2)) {
  		//echo "<img src='".base64_encode($res['Path_Data'])." alt='no' ><br>";
	  		echo "<img width='320' height='240'src='images/".$res['Path_Data']."' >";
  	}

//****************view video
  while ($res2=mysqli_fetch_assoc($query3)) {
  
	  		echo " <video width='320' height='240' controls>
					  <source  src='videos/".$res2['Path_Data']."'	 type='video/mp4'>
					  <source src= 'videos/".$res2['Path_Data']." ' type='video/ogg'>
					  Your browser does not support the video tag.
					</video> ";
  	}

