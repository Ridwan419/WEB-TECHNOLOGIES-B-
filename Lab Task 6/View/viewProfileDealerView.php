<?php
session_start();
require_once '../Controller/dealerInfoController.php';



if(isset($_SESSION['username']))
{
$data = fetchDealer($_SESSION['username']);


  if($data!=NULL)
  {
    foreach ($data as $i => $dealer):

         $name= $dealer['NAME'] ;
         $email=$dealer['EMAIL'];
         $username= $dealer['USERNAME'] ;
         $birth=$dealer['BIRTH'];
         $gender= $dealer['GENDER'] ;
    endforeach;

    echo "<br />$name";
    echo "<br />$email";
    echo "<br />$username";
    echo "<br />$birth";
    echo "<br />$gender";
  }
}

else {
  echo "You cannot access this page!!";
}
 ?>
