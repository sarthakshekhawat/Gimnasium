<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Cookie" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

      <style>
        div.tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
            width:70%;
        }

        div.tab button {
            font-size: 20px;
            margin-left: 5%;
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        div.tab button:hover {
            background-color: #ddd;
            text-decoration: underline;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
      hr {
         display: block;
         position: relative;
         padding: 0;
         margin: 0px auto;
         height: 10%;
         width: 50%;
         max-height: 0;
         font-size: 1px;
         line-height: 0;
         clear: both;
         border: none;
         border-radius: 20px;
         border-top: 10px solid black;
         border-bottom: 10px solid black;
      }
      body {
            background-image:url('barbell.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
      }
        c {
          font-family: 'Cookie',monospace;
          margin-left: 600px;
          font-size: 150px;
          color: black;
          font-style: italic;
          text-shadow: 4px 4px 0px red;
        }
      d {
          font-family: 'Times New Roman',monospace;
          font-size: 30px;
          color: black;
          font-style: italic;
        }
        b{
          font-family: 'Cookie',monospace;
          font-size: 30px;
        }
        table{float:left;
        width:35%;
        margin-left: 20%;background: url('comment.jpeg');background-repeat: no-repeat;background-size: cover;
          border: 3px solid black;
          padding: 5px;
        }

        td{
          font-size: 20px;
          padding: 5px;
          color: black;
          font-weight: bold;
        }
        table.one {
            float:left;
            width:100%;
            margin-left: 30%;
        }
        table.two   {
            width:30%;
            float:right;
            }​
        td{}

        img {
          margin-left: 30px;
          border: 10px solid black;
          border-radius: 4px;
          padding: 5px;
          }
          dialog{
            margin-left: 75%;
          }
          div.scroll {
            background: url('comment.jpeg');
          background-color: white;background-repeat: no-repeat;background-size: cover;
          width: 110%;
          height: 25%;
          overflow: scroll;
          }
          tbody {
                height: 300px;
                display: inline-block;
                width: 100%;
                overflow: auto;
            }
      </style>
    </head>
<body>
  <?php session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="Project";
    $id=$_SESSION["id"];
    $_SESSION['Equipment']='none';
    $_SESSION['Body']='none';
    $_SESSION['DietType']='none';
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    $_SESSION['m']=null;
    echo "<br>";
    $x=0;while($x<250){echo "&nbsp";$x++;}$x=0; while($x<150){echo "&nbsp";$x++;} ?><a href="logout.php"><input type="image" height="7%" src="logout.ico"></a>
  <div>
    <c style="color:white;font-style:normal">Gimnasium!!!</c>
  </div>
<div>
  <div style="float:left;width:15%;border-radius:10px;background-color:none" class="container">
    <?php
    $sql="select Image from Pic where Id='$id'";
    $im=$conn->query($sql);
    $data=$im->fetch_assoc();
    echo "<br><br><br><br>";
    if($im->num_rows>0)
   echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img height=\"25%\" width=\"100%\" src=".$data['Image']." style:>";
   else echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src='profile.jpeg' style:>";

   $sql="select Est_calories from Customers where Email='$id'";
   $im=$conn->query($sql);
   $data=$im->fetch_assoc();
   $_SESSION['ca']=$data['Est_calories'];
      ?><br><br><br><br>

        <div style="margin-left:50px;">
            <button id="o1" type="button" class="btn btn-success" onclick="S1()" style="font-weight:bold;margin-left:5%;background-color:blue;font-size:20px" data-toggle="collapse" href="#a1">&nbsp&nbsp Diet Plan &nbsp&nbsp&nbsp&nbsp&nbsp</button><br><br>
            <button id="o2" type="button" class="btn btn-success" onclick="S2()" style="font-weight:bold;margin-left:5%;background-color:blue;font-size:20px" data-toggle="collapse" href="#a2"> Excercise Plan</button><br><br>
            <a href="edit.php"><button type="button" class="btn btn-success" style="font-weight:bold;margin-left:5%;background-color:blue;font-size:20px">&nbsp&nbsp&nbsp Edit profile&nbsp&nbsp&nbsp</button><br></a><br>
            <a href="info.php"><button type="button" class="btn btn-success" style="font-weight:bold; margin-left:5%;background-color:blue;font-size:20px">&nbsp&nbsp&nbsp Profile info&nbsp&nbsp&nbsp</button></a><br>
        </div><br>
    </div>
    <div class="container" style="float:left;margin-left:10%;width:50%;margin-top:5%;">
      <div id="a1" class="collapse">
        <nav class="nav navbar-inverse" style="width:100%">
          <div class="container ">
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li style="margin-left:0%;font-size:30px"><a href="#b" data-toggle="collapse" data-parent="#a1">Breakfast</a></li></ul>
              <ul class="nav navbar-nav">
                <li style="margin-left:100%;font-size:30px"><a href="#l" data-toggle="collapse" data-parent="#a1">Lunch</a></li></ul>
              <ul class="nav navbar-nav">
                <li style="margin-left:200%;font-size:30px"><a href="#s" data-toggle="collapse" data-parent="#a1">Snacks</a></li></ul>
              <ul class="nav navbar-nav">
                <li style="margin-left:300%;font-size:30px"><a href="#d" data-toggle="collapse" data-parent="#a1">Dinner</a></li></ul>
              </ul>
            </div>
          </div>
        </nav>
      </div>

      <div class="collapse" id="b" style="margin-left:0%;">
          <br><br><br>
          <table><tr><td>
            <?php
            $main="Breakfast";
            $query="SELECT Item FROM CustomerDiet where Category='$main' && Id='$id' order by Item";
            $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerDiet ON CustomerDiet.Item=Pic.Id WHERE CustomerDiet.Category='$main' && CustomerDiet.Id='$id' order by Pic.Image";
            $result=$conn->query($query);
            $result2=$conn->query($query2);
            if($result->num_rows>0)
            {"<ul>";while ($row1=$result->fetch_assoc())
            {
              $row2=$result2->fetch_assoc();
              echo "<li>".$row1["Item"]."<br><img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
            }"</ul>";}
          ?>
        </td></tr></table>
        <form action="Diet.php" method="post"><input type="hidden" value="Breakfast" name="Category"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
      </div>

      <div class="collapse" id="l" style="margin-left:0%;">
        <br><br><br>
        <table><tr><td>
          <?php
          $main="Lunch";
          $query="SELECT Item FROM CustomerDiet where Category='$main' && Id='$id' order by Item";
          $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerDiet ON CustomerDiet.Item=Pic.Id WHERE CustomerDiet.Category='$main' && CustomerDiet.Id='$id' order by Pic.Image";
          $result=$conn->query($query);
          $result2=$conn->query($query2);
          if($result->num_rows>0)
          {"<ul>";while ($row1=$result->fetch_assoc())
          {
            $row2=$result2->fetch_assoc();
            echo "<li>".$row1["Item"]."<br><img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
          }"</ul>";}
        ?>
      </td></tr></table>
      <form action="Diet.php" method="post"><input type="hidden" value="Lunch" name="Category"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
      </div>

      <div class="collapse" id="s" style="margin-left:0%;">
        <br><br><br>
        <table><tr><td>
          <?php
          $main="Snacks";
          $query="SELECT Item FROM CustomerDiet where Category='$main' && Id='$id' order by Item";
          $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerDiet ON CustomerDiet.Item=Pic.Id WHERE CustomerDiet.Category='$main' && CustomerDiet.Id='$id' order by Pic.Image";
          $result=$conn->query($query);
          $result2=$conn->query($query2);
          if($result->num_rows>0)
          {"<ul>";while ($row1=$result->fetch_assoc())
          {
            $row2=$result2->fetch_assoc();
            echo "<li>".$row1["Item"]."<br><img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
          }"</ul>";}
        ?>
      </td></tr></table>
      <form action="Diet.php" method="post"><input type="hidden" value="Snacks" name="Category"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
      </div>

      <div class="collapse" id="d" style="margin-left:0%;">
        <br><br><br>
        <table><tr><td>
          <?php
          $main="Dinner";
          $query="SELECT Item FROM CustomerDiet where Category='$main' && Id='$id' order by Item";
          $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerDiet ON CustomerDiet.Item=Pic.Id WHERE CustomerDiet.Category='$main' && CustomerDiet.Id='$id' order by Pic.Image";
          $result=$conn->query($query);
          $result2=$conn->query($query2);
          if($result->num_rows>0)
          {"<ul>";while ($row1=$result->fetch_assoc())
          {
            $row2=$result2->fetch_assoc();
            echo "<li>".$row1["Item"]."<br><img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
          }"</ul>";}
        ?>
      </td></tr></table>
      <form action="Diet.php" method="post"><input type="hidden" value="Dinner" name="Category"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
      </div>

      <div id="a2" class="collapse">
        <nav class="nav navbar-inverse" style="width:102%">
          <div class="container ">
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li style="margin-left:0%;font-size:30px"><a href="#m" data-toggle="collapse" data-parent="#a1">Monday</a></li></ul>
              <ul class="nav navbar-nav">
                <li style="margin-left:0%;font-size:30px"><a href="#t" data-toggle="collapse" data-parent="#a1">Tuesday</a></li></ul>
              <ul class="nav navbar-nav">
                <li style="margin-left:0%;font-size:30px"><a href="#w" data-toggle="collapse" data-parent="#a1">Wednesday</a></li></ul>
              </ul>
              <ul class="nav navbar-nav">
                <li style="margin-left:0%;font-size:30px"><a href="#th" data-toggle="collapse" data-parent="#a1">Thursday</a></li></ul>
              </ul>
              <ul class="nav navbar-nav">
                <li style="margin-left:0%;font-size:30px"><a href="#f" data-toggle="collapse" data-parent="#a1">Friday</a></li></ul>
              </ul>
              <ul class="nav navbar-nav">
                <li style="margin-left:0%;font-size:30px"><a href="#sa" data-toggle="collapse" data-parent="#a1">Saturday</a></li></ul>
              </ul>
            </div>
          </div>
        </nav>
      </div>

      <div class="collapse" id="m" style="margin-left:4%">
        <br><br><br>
        <table><tr><td>
          <?php
          $main="Monday";
          $query="SELECT Item FROM CustomerEx where Day='$main' && Id='$id' order by Item";
          $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerEx ON CustomerEx.Item=Pic.Id WHERE CustomerEx.Day='$main' && CustomerEx.Id='$id' order by Pic.Image";
          $result=$conn->query($query);
          $result2=$conn->query($query2);
          if($result->num_rows>0)
          {"<ul>";while ($row1=$result->fetch_assoc())
          {
            if($result2->num_rows>0)$row2=$result2->fetch_assoc();
            echo "<li>".$row1["Item"]."<br>";
            if($result2->num_rows>0)echo "<img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
          }"</ul>";}
        ?>
      </td></tr></table>
      <form action="Exercise.php" method="post"><input type="hidden" value="Monday" name="Day"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
      </div>

      <div class="collapse" id="t" style="margin-left:4%">
        <br><br><br>
        <table><tr><td>
          <?php
          $main="Tuesday";
          $query="SELECT Item FROM CustomerEx where Day='$main' && Id='$id' order by Item";
          $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerEx ON CustomerEx.Item=Pic.Id WHERE CustomerEx.Day='$main' && CustomerEx.Id='$id' order by Pic.Image";
          $result=$conn->query($query);
          $result2=$conn->query($query2);
          if($result->num_rows>0)
          {"<ul>";while ($row1=$result->fetch_assoc())
          {
            if($result2->num_rows>0)$row2=$result2->fetch_assoc();
            echo "<li>".$row1["Item"]."<br>";
            if($result2->num_rows>0)echo "<img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
          }"</ul>";}
        ?>
      </td></tr></table>
      <form action="Exercise.php" method="post"><input type="hidden" value="Tuesday" name="Day"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
    </div>

      <div class="collapse" id="w" style="margin-left:4%">
        <br><br><br>
        <table><tr><td>
          <?php
          $main="Wednesday";
          $query="SELECT Item FROM CustomerEx where Day='$main' && Id='$id' order by Item";
          $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerEx ON CustomerEx.Item=Pic.Id WHERE CustomerEx.Day='$main' && CustomerEx.Id='$id' order by Pic.Image";
          $result=$conn->query($query);
          $result2=$conn->query($query2);
          if($result->num_rows>0)
          {"<ul>";while ($row1=$result->fetch_assoc())
          {
            if($result2->num_rows>0)$row2=$result2->fetch_assoc();
            echo "<li>".$row1["Item"]."<br>";
            if($result2->num_rows>0)echo "<img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
          }"</ul>";}
        ?>
      </td></tr></table>
      <form action="Exercise.php" method="post"><input type="hidden" value="Wednesday" name="Day"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
      </div>

      <div class="collapse" id="th" style="margin-left:4%">
        <br><br><br>
        <table><tr><td>
          <?php
          $main="Thursday";
          $query="SELECT Item FROM CustomerEx where Day='$main' && Id='$id' order by Item";
          $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerEx ON CustomerEx.Item=Pic.Id WHERE CustomerEx.Day='$main' && CustomerEx.Id='$id' order by Pic.Image";
          $result=$conn->query($query);
          $result2=$conn->query($query2);
          if($result->num_rows>0)
          {"<ul>";while ($row1=$result->fetch_assoc())
          {
            if($result2->num_rows>0)$row2=$result2->fetch_assoc();
            echo "<li>".$row1["Item"]."<br>";
            if($result2->num_rows>0)echo "<img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
          }"</ul>";}
        ?>
      </td></tr></table>
      <form action="Exercise.php" method="post"><input type="hidden" value="Thursday" name="Day"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
      </div>

      <div class="collapse" id="f" style="margin-left:4%">
        <br><br><br>
        <table><tr><td>
          <?php
          $main="Friday";
          $query="SELECT Item FROM CustomerEx where Day='$main' && Id='$id' order by Item";
          $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerEx ON CustomerEx.Item=Pic.Id WHERE CustomerEx.Day='$main' && CustomerEx.Id='$id' order by Pic.Image";
          $result=$conn->query($query);
          $result2=$conn->query($query2);
          if($result->num_rows>0)
          {"<ul>";while ($row1=$result->fetch_assoc())
          {
            if($result2->num_rows>0)$row2=$result2->fetch_assoc();
            echo "<li>".$row1["Item"]."<br>";
            if($result2->num_rows>0)echo "<img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
          }"</ul>";}
        ?>
      </td></tr></table>
      <form action="Exercise.php" method="post"><input type="hidden" value="Friday" name="Day"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
      </div>

      <div class="collapse" id="sa" style="margin-left:4%">
        <br><br><br>
        <table><tr><td>
          <?php
          $main="Saturday";
          $query="SELECT Item FROM CustomerEx where Day='$main' && Id='$id' order by Item";
          $query2="SELECT Pic.Image FROM Pic INNER JOIN CustomerEx ON CustomerEx.Item=Pic.Id WHERE CustomerEx.Day='$main' && CustomerEx.Id='$id' order by Pic.Image";
          $result=$conn->query($query);
          $result2=$conn->query($query2);
          if($result->num_rows>0)
          {"<ul>";while ($row1=$result->fetch_assoc())
          {
            if($result2->num_rows>0)$row2=$result2->fetch_assoc();
            echo "<li>".$row1["Item"]."<br>";
            if($result2->num_rows>0)echo "<img style=\"border: 1px solid black;margin-left:45%;margin-top:5px;height: 30%;width: 40%;\" src='".$row2['Image']."'><br>";
          }"</ul>";}
        ?>
      </td></tr></table>
      <form action="Exercise.php" method="post"><input type="hidden" value="Saturday" name="Day"><input type="submit" style="font-size:30px;margin-left:300px;font-weight:bold;border-radius:10px;" value="Customise"></form>
    </div>
  </div>

    <div class="container" style="float:left;margin-left:0%;width:20%;margin-top:5%;">
      <b style="font-size:70px;color:white">Comments :-</b>
      <div class="scroll" id="Comment">
      <?php
        $sql="select * from Comments";
        $result=$conn->query($sql);
        echo "<ul>";
        while($row=$result->fetch_assoc())
        {
          echo "<li style=\"font-size:10px\"><b style=\"color:black\">".$row["id"]."</b><b style=\"color:#006400\"><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp-->".$row["comment"]."<br></li>";
        }
        echo "</ul>";
      ?></div><br>
      <div>
        <form action="comment.php" method="POST">
          <textarea rows="2" cols="40" name="comnt" style="background:url('tab.jpg');color:white"></textarea>
          <input type="submit" value="Post" style=";color:black;margin-left:280px;margin-top:10px;">
      </form>
    </div>
    </div>
  </div>
  <script>
  var x=null;
    function S1()
    {
      if(x!=null&&x==document.getElementById("o1"))
        {
          x.style.background="blue";
          x=null;
        }
        else if(x!=null)
        {
          x.style.background="blue";
          x=document.getElementById("o1");
          x.style.background="green";
        }
        else
        {
          x=document.getElementById("o1");
          x.style.background="green";
        }
    }
    function S2()
    {
      if(x!=null&&x==document.getElementById("o2"))
        {
          x.style.background="blue";
          x=null;
        }
        else if(x!=null)
        {
          x.style.background="blue";
          x=document.getElementById("o2");
          x.style.background="green";
        }
        else
        {
          x=document.getElementById("o2");
          x.style.background="green";
        }
    }
  </script>
</body>
</html>
