<html>
<head>
  <style>
  body {
        background-image:url('comment.jpeg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;

  color: white;
  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
  font-size: 16px;
  line-height: 1.5em;
  }
    a { text-decoration: none; }
    h1 { font-size: 1em; }
    h1, p {
    margin-bottom: 10px;
    }
    strong {
    font-weight: bold;
    }
    .uppercase { text-transform: uppercase; }
    #info {
    margin: 100px auto;
    margin-bottom: auto;
    width:1200px;
    height: 570px;
    margin-left: 300px;
    }
    c{
      font-size: 50px;
      color: blue;
      margin: 300px auto;
      font-family: 'Times New Roman';
    }
    form fieldset{
      border-color: black;
      border-width: 7px;
    }
    form fieldset input[type="text"], input[type="password"] {
    background-color: #e5e5e5;
    border: none;
    font-weight: bold;
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    color: #5a5656;
    font-family: 'Open Sans', Arial, Helvetica, sans-serif;
    font-size: 30px;
    height: 100px;
    outline: none;
    padding: 0px 10px;
    width: 500px;
    -webkit-appearance:none;
    }
    form fieldset input[type="button"] {
    background-color: #008dde;
    border: none;
    border-radius: 3px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    color: #f4f4f4;
    cursor: pointer;
    font-family: 'Open Sans', Arial, Helvetica, sans-serif;
    height: 50px;
    text-transform: uppercase;
    width: 250px;
    margin-left: 250px;
    margin-right: auto;
    -webkit-appearance:none;
    }
    form fieldset a {
    color: white;
    margin-left: 150px;
    font-size: 10px;
    }
    form fieldset a:hover {
      text-decoration: underline;
      color: red;
      font-weight: bold;
      font-size: 20px;
    }
    .btn-round {
    background-color: #5a5656;
    border-radius: 50%;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    color: #f4f4f4;
    display: block;
    font-size: 12px;
    height: 50px;
    line-height: 50px;
    margin: 30px 125px;
    text-align: center;
    text-transform: uppercase;
    width: 50px;
    }

  </style>
</head>
<body>
<?php
  session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="Project";
  $n=$_SESSION["id"];
  $conn = mysqli_connect($servername, $username, $password,$dbname);

  $x=0;while($x<15){echo "&nbsp";$x++;}
  $sql="select Improvement from Customers where Email='$n'";
  $result=$conn->query($sql);
  $data=$result->fetch_assoc();
?>
<div id="info">
  <br><br>
<form>
<fieldset><legend><c style="color:black;font-size:80px"><strong>Profile Info</strong></legend>
<fieldset>
  <br>
  <table>
<tr><td><c style="color:black;font-weight:bold">Name : </c></td><td><c><? echo $_SESSION['name']; ?></c></td></tr>
<tr><td><c style="color:black;font-weight:bold">Email-id : </c></td><td><c><? echo"&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";echo $_SESSION['id']; ?></c></td></tr>
<tr><td><c style="color:black;font-weight:bold">Age : </c></td><td><c><? echo $_SESSION['age']." yrs"; ?></c></td></tr>
<tr><td><c style="color:black;font-weight:bold">Height :</c></td><td><c><? echo $_SESSION['height']." cm"; ?></c></td></tr>
<tr><td><c style="color:black;font-weight:bold">Weight :</c></td><td><c><? echo $_SESSION['weight']." Kg"; ?></c></td></tr>
<tr><td colspan="2"><br><c>
          <?
          if($data['Improvement']!=0)
          {
            if($data['Improvement']>0)
              echo "<b>&nbsp&nbsp&nbsp You gained ".$data['Improvement']." Kg since your last update</b><br>";
            else echo "<b>&nbsp&nbsp&nbsp You lost ".$data['Improvement']*(-1)." Kg since your last update</b><br><br>";
          }
          ?></c>
</tr>
<tr><td></td><td><p><a href="profile.php"><input type="button" value="Go Back"></a></p></td></tr>
</table>
</fieldset>
</fieldset>
</form>
</div>
</body>
</html>
