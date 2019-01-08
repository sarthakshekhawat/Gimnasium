<?php session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="Project";
  $n=$_SESSION["id"];
  $comment=$_POST['comnt'];
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  $sql="insert into Comments(id,comment) values('$n','$comment')";
  $conn->query($sql);
  header('location:profile.php');
?>
