<?php
session_start();

if(isset($_SESSION['username']))
{

 echo "<br><a href='dashboardDealerView.php'>Dashboard</a>";
 echo "<br><a href='viewProfileDealerView.php'>View Profile</a>";
 echo "<br><a href='editProfileDealerView.php'>Edit Profile</a>";
 // echo "<br><a href='upload.php'>Change Profile Picture</a>";
  echo "<br><a href='changePasswordDealerView.php'>Change Password</a>";
  echo "<br><a href ='../Controller/logoutDealerController.php'>Logout </a>";
  echo "<h1 align='middle'> Welcome ".$_SESSION['username']."</h2>";



}
else {
  echo "You can not access the page.";
}
 ?>
