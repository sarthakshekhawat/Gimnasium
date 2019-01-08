<html>
<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="Project";
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
      echo "Connection failed";
  }
  $w=$_POST['weight'];
  $h=$_POST['height'];
  $a=$_POST['age'];
  $p=$_POST['Mpass'];
  $u=$_POST['id'];
  $s=$_POST['gender'];
  $n=$_POST['name'];
  $b=($w/$h)*(10000/$h);
  if($b>24.9)$c=2000;else if($c>18.5)$c=2500;else $c=3000;
  $sql="select Email from Customers where Email='$u'";
  $r=$conn->query($sql);
  if($r->num_rows==true)
    {
      header("Location:already.php");
    }
    else{
  $sql = "insert into Customers(Height,Weight,Age,Password,Email,Improvement,Sex,Name,BMI,Est_calories) values ($h,$w,$a,'$p','$u',0,'$s','$n',$b,$c)";
  $conn->query($sql);
  $sql = "insert into pic(id,image) values ('$u','profile.jpeg')";
  $conn->query($sql);
  $_SESSION['id']=$u;
  header("Location:login.php");
}
  ?>
</body>
</html>
