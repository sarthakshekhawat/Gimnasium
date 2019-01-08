<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style>

    body {
      background-image:url('invalid.jpg');
          background-size: auto;
          background-repeat: no-repeat;
          background-attachment: fixed;
    }
      c {
        font-family: 'Cookie',monospace;
        margin-left: 150px;
        font-size: 150px;
        color: white;
        font-style: italic;
        text-shadow: 4px 4px 0px rgba(0,0,0,0.1);
      }
    </style>
</style>
<body>
  <?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="Project";
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
      echo "Connection failed";
  }
  $u=$_POST['username'];
  $p=$_POST['pass'];
  $sql="select Password from Customers where Email='$u'";
  $r=$conn->query($sql);
  $data=$r->fetch_assoc();
  if($r->num_rows==1)
    {
      if($data['Password']==$p)
       {
         $sql="select Name from Customers where Email='$u'";
         $r=$conn->query($sql);
         $data=$r->fetch_assoc();
         $_SESSION["pass"]=$p;
         $_SESSION["name"]=$data['Name'];
         $sql="select Age from Customers where Email='$u'";
         $r=$conn->query($sql);
         $data=$r->fetch_assoc();
         $_SESSION["age"]=$data['Age'];
         $sql="select Weight from Customers where Email='$u'";
         $r=$conn->query($sql);
         $data=$r->fetch_assoc();
         $_SESSION["weight"]=$data['Weight'];
         $sql="select Height from Customers where Email='$u'";
         $r=$conn->query($sql);
         $data=$r->fetch_assoc();
         $_SESSION["height"]=$data['Height'];
         $_SESSION["id"]=$u;
         header("Location:profile.php");
       }
     }
  else
      header("Location:notPresent.php");
   ?><br><br><a href="login.php" style="margin-left:90%" class="btn btn-warning btn-lg">
           <span class="glyphicon glyphicon-user"></span> Try Again..
         </a>
   <?php
      $x=1;
      for ($x=1; $x<=30; $x++) {
          echo "<br>";
      }
    ?>
   <c>Invalid password</c>
</body></html>
