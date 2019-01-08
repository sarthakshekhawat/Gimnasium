<?php session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="Project";
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  $name=$_POST['name'];
  $age=$_POST['age'];
  $height=$_POST['height'];
  $weight=$_POST['weight'];
  $url=$_POST['link'];
  $improve=$weight-$_SESSION['weight'];
  $b=($weight/$height)*(10000/$height);
  $id=$_SESSION['id'];
  if($b>24.9)$c=2000;else if($b>18.5)$c=2500;else $c=3000;
  $sql = "UPDATE Customers SET Height=$height,Weight=$weight,Age=$age,Improvement=$improve,Name='$name',BMI=$b,Est_calories=$c WHERE Email='$id'";
  $conn->query($sql);
  $_SESSION['name']=$name;
  $_SESSION['weight']=$weight;
  $_SESSION['height']=$height;
  $_SESSION['age']=$age;
  if($url!=null){
  $sql = "UPDATE Pic SET Image='$url' WHERE Id='$id'";
  $r=$conn->query($sql);
  if($r->num_rows==0)
  {$sql="INSERT INTO Pic(Id,Image) Values ('$id','$url')";
  $r=$conn->query($sql);}
}
  header("location:profile.php");
?>
