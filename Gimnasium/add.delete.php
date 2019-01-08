<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="Project";
$id=$_SESSION["id"];
$conn = mysqli_connect($servername, $username, $password,$dbname);
$y=$_POST['form'];
$z=$_POST['form2'];
$c=0;
if($z=='Diet')
{
  $x=$_POST['delete'];
  foreach($x as $v)
      $conn->query("DELETE FROM CustomerDiet WHERE item='$v'&&Category='$y'");
  $x=$_POST['add'];
  foreach($x as $v)
      $conn->query("INSERT INTO CustomerDiet(Id,Item,Category) VALUES('$id','$v','$y')");
      header("location:Diet.php");
}

if($z=='Exercise')
{
  $x=$_POST['delete'];
  foreach($x as $v)
      $conn->query("DELETE FROM CustomerEx WHERE item='$v'");
  $x=$_POST['add'];
  foreach($x as $v)
      $conn->query("INSERT INTO CustomerEx(Id,Item,Day) VALUES('$id','$v','$y')");
  header("location:Exercise.php");
}
$y=null;
$z=null;
?>
