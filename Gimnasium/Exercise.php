<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="Project";
$id=$_SESSION["id"];
$conn = mysqli_connect($servername, $username, $password,$dbname);
if($_SESSION["m"]==null)$_SESSION["m"] = $_POST['Day'];
$main=$_SESSION["m"];
?>

<html><head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
x {
  font-family: 'Times New Roman',monospace;
  margin-left: 600px;
  font-size: 150px;
  color: black;
  font-style: italic;

}
body {
      background-image:url('tab.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
}
table{
background: url('profile.jpg');
  border: 3px solid black;
  padding: 5px;
}

td{
  font-size: 20px;
  padding: 5px;  overflow-y: scroll;display: block;height: 500px;
  font-weight: bold;
}
table.one {
    float:left;
    width:20%;
    margin-left: 10%;
}
table.two   {
  margin-right: 20%;
    width:20%;
    float:right;
    }​
    td{}
img {
  margin-left: 90px;
  border: 3px solid black;height: 100px;width: auto;
  border-radius: 4px;
  padding: 5px;
  }

</style></head><body>
  <br><br>
  <a href="profile.php" style="margin-left:90%" class="btn btn-info btn-lg">
          <span class="glyphicon glyphicon-user"></span> Profile
        </a>
<br>
    <div><x style="margin-left:230px;font-size:40px;font-weight:bold;color:white">Current Items</x><x style="margin-left:820px;font-size:40px;font-weight:bold;color:white">List</x></div>
    <!--<div><x style="margin-left:200px;font-size:25px;font-weight:bold">Total calories added:<p id="calories"></p></x><br><br></div>-->


    <form action="add.delete.php" method="post"><table class="one"><input type="hidden" name="form" value="<?echo $main;?>"><input type="hidden" name="form2" value="Exercise"><tr>
      <td>
          <?php
            $query="SELECT Item FROM CustomerEx where Day='$main' && Id='$id' order by Item";
            $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerEx ON CustomerEx.Item=Pic.Id WHERE CustomerEx.Day='$main' && CustomerEx.Id='$id' order by Pic.Image";
            $result=$conn->query($query);
            $result2=$conn->query($query2);
            while ($row1=$result->fetch_assoc())
            {if($result2->num_rows>0)
              $row2=$result2->fetch_assoc();
              echo "<input type=\"checkbox\" name=\"delete[]\" value='".$row1["Item"]."'>".$row1["Item"]."<br>";
              if($result2->num_rows>0)echo "<img src='".$row2['Image']."'><br>";
            }
        ?>
        </td>
      </tr></table>

      <table class="two"><tr>
      <td>
        <?php
          if($_SESSION['Equipment']=='none'&&$_SESSION['Body']=='none')
            $query="SELECT E.Item FROM Exercise E LEFT JOIN CustomerEx CE USING(Item) WHERE (CE.Item IS NULL||CE.Id!='$id') order by E.Item";

          else if($_SESSION['Equipment']!='none'&&$_SESSION['Body']=='none')
          {
            $Equip=$_SESSION['Equipment'];//$Body=$_SESSION['Body'];
            $query="SELECT E.Item FROM Exercise E LEFT JOIN CustomerEx CE USING(Item) WHERE (CE.Item IS NULL||CE.Id!='$id')&&E.Equipment='$Equip' order by E.Item";
          }
          else if($_SESSION['Equipment']=='none'&&$_SESSION['Body']!='none')
          {
            $Body=$_SESSION['Body'];
            $query="SELECT E.Item FROM Exercise E LEFT JOIN CustomerEx CE USING(Item) WHERE (CE.Item IS NULL||CE.Id!='$id')&&E.Body='$Body' order by E.Item";
          }
          else
            {
              $Equip=$_SESSION['Equipment'];$Body=$_SESSION['Body'];
              $query="SELECT E.Item FROM Exercise E LEFT JOIN CustomerEx CE USING(Item) WHERE (CE.Item IS NULL||CE.Id!='$id')&&E.Equipment='$Equip'&&E.Body='$Body' order by E.Item";
            }
//          $query2="SELECT Pic.Image FROM Pic INNER JOIN Exercise ON Pic.Id=Exercise.Item order by Pic.Id";
          $result=$conn->query($query);
  //        $result2=$conn->query($query2);
          if($result->num_rows>0)
          while ($row1=$result->fetch_assoc())
          {
    //        if($result2->num_rows>0)$row2=$result2->fetch_assoc();
            echo "<input type=\"checkbox\" name=\"add[]\" value='".$row1["Item"]."'>".$row1["Item"]."<br>";
            echo "<a href=\"https://www.youtube.com/results?search_query='".$row1["Item"]."'+Exercise\"><img src='".$row1["Item"].".jpg"."'></a><br>";
          }
        ?>
        </td>
    </tr></table><br><br><br><br><br><br><br><br><br><br><br><br><br>

    <div><x style="margin-left:50px;font-size:25px;font-weight:bold;"><input type="submit" style="border-radius:10px;color:red" value="Delete"></x><x style="margin-left:300px;font-size:25px;font-weight:bold"><input type="submit" style="border-radius:10px;color:green" value="Add"></x></div>
  </form>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<form action="sort.php" method="post" style="margin-left:40%">
  <p style="color:black;font-size:20px;font-weight:bold;color:white">Equipment :  <select name="equipment" style="color:black;margin-left:10px">
  <?php
    $r=$conn->query("SELECT DISTINCT Equipment FROM Exercise ORDER BY Equipment");
    echo '    <option value="none"> All </option>' . PHP_EOL;
      while($row=$r->fetch_assoc()) {
          echo '    <option value="' . $row['Equipment'] . '">' . $row['Equipment'] . '</option>' . PHP_EOL;
      }
  ?>
</select></p>
    <p style="color:black;font-size:20px;font-weight:bold;color:white">Body-part :  <select name="body" style="color:black;margin-left:10px">
    <?php
      $r=$conn->query("SELECT DISTINCT Body FROM Exercise ORDER BY Body");
      echo '    <option value="none"> All </option>' . PHP_EOL;
        while($row=$r->fetch_assoc()) {
            echo '    <option value="' . $row['Body'] . '">' .$row['Body']. '</option>' . PHP_EOL;
        }
    ?>
  </select></p><div class="ps"><input type="hidden" name="sort" value="exercise"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Filter Items"></div>
</form>
</body>
</html>
