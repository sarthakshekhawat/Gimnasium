<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname="Project";
$id=$_SESSION["id"];
$conn = mysqli_connect($servername, $username, $password,$dbname);
if($_SESSION['m']==null)$_SESSION['m']=$_POST["Category"];
$main=$_SESSION['m'];
?>

<html><head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>

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
        x {
          font-family: 'Times New Roman',monospace;
          margin-left: 600px;
          font-size: 150px;
          color: black;
          font-style: italic;

        }
</style></head><body><br><br><a href="profile.php" style="margin-left:90%" class="btn btn-info btn-lg">
        <span class="glyphicon glyphicon-user"></span> Profile
      </a>
    <div><x style="margin-left:230px;font-size:40px;font-weight:bold;color:white">Current Items</x><x style="margin-left:820px;font-size:40px;font-weight:bold;color:white">List</x></div><br><br>
    <!--<div><x style="margin-left:200px;font-size:25px;font-weight:bold">Total calories added:<p id="calories"></p></x><br><br></div>-->

    <form action="add.delete.php" method="post"><table class="one"><input type="hidden" name="form" value="<?echo $main;?>"><input type="hidden" name="form2" value="Diet"><tr>
      <td>
          <?php
            $query="SELECT Item FROM CustomerDiet where Category='$main' && Id='$id' order by Item";
            $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerDiet ON CustomerDiet.Item=Pic.Id WHERE CustomerDiet.Category='$main' && CustomerDiet.Id='$id' Order by Pic.Image";
            $result=$conn->query($query);
            $result2=$conn->query($query2);
            if($result->num_rows>0)
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
          $x=$_SESSION['DietType'];
          if($x!='none')
            $query="SELECT D.Item FROM Diet D LEFT JOIN CustomerDiet CD USING(Item) WHERE (CD.Id!='$id'||CD.Item IS NULL )AND D.Category='$main'AND D.Type='$x' order by D.Item";
          else $query="SELECT D.Item FROM Diet D LEFT JOIN CustomerDiet CD USING(Item) WHERE (CD.Id!='$id'||CD.Item IS NULL )AND D.Category='$main' order by D.Item";
          //$query2="SELECT Pic.Image FROM Pic INNER JOIN ( Diet D LEFT JOIN CustomerDiet CD USING(Item) WHERE CD.Item IS NULL AND D.Category='$main') ON Diet.Item=Pic.Id WHERE Diet.Category='$main'";
          $result=$conn->query($query);
          //$result2=$conn->query($query2);
          if($result->num_rows>0)
          while ($row1=$result->fetch_assoc())
          {//if($result2->num_rows>0)
            //$row2=$result2->fetch_assoc();
            echo "<input type=\"checkbox\" name=\"add[]\" value='".$row1["Item"]."'>".$row1["Item"]."<br>";
            echo "<img src='".$row1["Item"].".jpg"."'><br>";
          }
        ?>
        </td>
    </tr></table><br> <br><br><br><br><br><br><br><br><br><br><br><br>
    <div><x style="margin-left:50px;font-size:25px;font-weight:bold;"><input type="submit" style="border-radius:10px;color:red" value="Delete"></x><x style="margin-left:300px;font-size:25px;font-weight:bold"><input type="submit" style="border-radius:10px;color:green" value="Add"></x></div>
  </form>
  <form action="sort.php" method="post" style="margin-top:15%;margin-left:50%">
    <p style="color:black;font-size:20px;font-weight:bold;color:white">Veg/NonVeg :  <select name="dietType" style="margin-left:10px;color:black">
    <option value="none"> Any </option>
    <option value="Veg"> Veg </option>
    <option value="Non Veg"> Non-Veg </option>
  </select></p><div class="ps"><input type="hidden" name="sort" value="diet"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Filter Items"></div>
    </form>  <H1 style="color:white;text-decoration:underline;margin-left:30px;">Total Calories added :
      <?
        $query="SELECT Sum(Diet.Calories) AS value_sum FROM Diet INNER JOIN CustomerDiet ON CustomerDiet.Item=Diet.Item WHERE CustomerDiet.Id='$id' && Diet.Category='$main'";
        $r=$conn->query($query);
        $c=$r->fetch_assoc();

          if($c['value_sum']!=null)echo $c['value_sum'];
          else echo "0";
      ?></h1>
      <H1 style="color:white;text-decoration:underline;margin-left:30px;">Suggested Calories :
        <?
          $query="select Est_calories from Customers where Email='$id'";
          $r=$conn->query($query);
          $c=$r->fetch_assoc();
          echo (1/4)*$c['Est_calories'];
        ?>
      </h1>
</body>
</html>
