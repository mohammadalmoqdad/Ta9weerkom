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
    

                  
                    
                
                <li style="text-align: center;"><a href="logout.php">Log Out</a></li>
              </ul>
            </nav>
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
    
    $idd=mysqli_connect("localhost","root","")
or die("error connect");


$db=mysqli_select_db($idd,'project');


$query=mysqli_query($idd,"select * from User  where ID_User_Type='2'" );
$id_row=mysqli_fetch_row($query); //to seprate the query into several rows.
  $user=$id_row[0];


  if(isset($_GET['delete'])) {
    
    if(mysqli_query($idd,"delete from user where ID = '$_GET[delete]'")){
      echo "<script>alert('the user are delete ');</script>";
      header('location:admin.php');

    }
  }
      

    if(isset($_GET['edit'])) {

    
    if(mysqli_query($idd,"UPDATE `user` SET `ID_User_Status`='2' WHERE `ID` ='$_GET[edit]'")){
      echo "<script>alert('the user are active ');</script>";
      header('location:admin.php');
    }
  }
   
  if(isset($_GET['block'])) {

    
    if(mysqli_query($idd,"UPDATE `user` SET `ID_User_Status`='4' WHERE `ID` ='$_GET[block]'")){
      echo "<script>alert('the user is Block ');</script>";
      header('location:admin.php');
    }
  }
  

  if(isset($_GET['decline'])) {

    
    if(mysqli_query($idd,"UPDATE `user` SET `ID_User_Status`='1' WHERE `ID` ='$_GET[decline]'")){
      
      header('location:admin.php');
      echo "<script>alert('the user is decline ');</script>";
    }
  }


  $sql="SELECT user.id as IDa, user.First_Name as FirstName,
  user.Last_Name as LastName,user.Email as Email,
   user.Phone as phone,user.Gender as Gender,
   user.Location as Location,
   user.Birth_Date as Birth_Date, user.Nick_Name as UserName, user_status.Description as Status,
    user_type.Type as type from user INNER JOIN user_status ON user.ID_User_Status = user_status.ID 
  INNER JOIN user_type ON user.ID_User_Type = user_type.ID

 






";
$data= mysqli_query($idd, $sql);
print "<table id='customers'>";
  print "<tr>
    <th>fist Name</th>
    <th>last name</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Gender</th>
    <th>location</th>
    <th>birth date</th>
    <th>NickName</th>
    <th> status</th>
     <th> type</th>
    <th> Accept or Decline</th>

  </tr>";
  while ($row = mysqli_fetch_assoc($data)) {
    print "<tr>";
    echo ' <td>'.$row['FirstName'].'</td>';
    echo '<td>'.$row['LastName'].'</td>';
    echo '<td>'.$row['Email'].'</td>';
    echo '<td>'.$row['phone'].'</td>';
    echo '<td>'.$row['Gender'].'</td>';
    echo '<td>'.$row['Location'].'</td>';
    echo '<td>'.$row['Birth_Date'].'</td>';
    echo '<td>'.$row['UserName'].'</td>';
    echo '<td>'.$row['Status'].'</td>';
    echo '<td>'.$row['type'].'</td>';
    print"<td><a href='?delete=".$row['IDa']."'>Delete</a>
    <a href='?edit=".$row['IDa']."'>Accept</a>
    <a href='?decline=".$row['IDa']."'>decline</a>
    <a href='?block=".$row['IDa']."'>Block</a></td>";
  
    print"</tr>";
  print"<tr>";
    
  }
print"</table>"; 
  
  
  
  
  
  ?>