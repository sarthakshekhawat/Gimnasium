<?php
  session_start();
  $x=$_POST['sort'];
  echo $x;
  if($x=='exercise')
  {
    $_SESSION['Equipment']=$_POST['equipment'];
    $_SESSION['Body']=$_POST['body'];
    header("location:Exercise.php");
  }
  else
  {
    $_SESSION['DietType']=$_POST['dietType'];
    header("location:Diet.php");
  }
?>
