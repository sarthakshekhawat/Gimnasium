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
            background-image:url('profile-bg.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
      }
        c {
          font-family: 'Cookie',monospace;
          margin-left: 600px;
          font-size: 150px;
          color: grey;
          font-style: italic;
          text-shadow: 4px 4px 0px red;
        }
      </style>
    </head>
<body>
  <div>
    <c>Gimnasium!!!</c>
    <hr>
  </div>
  <div style="float:left;width:15%;border-radius:10px;background-color:none" class="container">
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname="Project";
    $n=$_SESSION["id"];
    $conn = mysqli_connect($servername, $username, $password,$dbname);
    $sql="select image from pic where id='$n'";
    $im=$conn->query($sql);
    $data=$im->fetch_assoc();
    echo "<br><br><br><br>";
    if($im->num_rows>0)
   echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src=".$data['image']." style:>";
   else echo "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<img src='profile.jpeg' style:>";
      ?><br><br><br><br>
        <div style="margin-left:50px;">
            <button id="o1" type="button" class="btn btn-success" onclick="S1()" style="margin-left:5%;background-color:blue;font-size:20px" data-toggle="collapse" href="#a1">&nbsp&nbsp Diet Plan &nbsp&nbsp&nbsp&nbsp&nbsp</button><br><br>
            <button id="o2" type="button" class="btn btn-success" onclick="S2()" style="margin-left:5%;background-color:blue;font-size:20px" data-toggle="collapse" href="#a2"> Excercise Plan</button>

        </div>
    </div>

    <div class="container" style="float:right;width:75%;margin-top:5%;">
      <div id="a1" class="collapse">
        <nav class="nav navbar-inverse">
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
      <div class="collapse" id="b">breakfast</div>
      <div class="collapse" id="l">lunch</div>
      <div class="collapse" id="s">snacks</div>
      <div class="collapse" id="d">dinner</div>
      <div id="a2" class="collapse">
        <nav class="nav navbar-inverse">
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
      <div class="collapse" id="m"></div>
      <div class="collapse" id="t"></div>
      <div class="collapse" id="w"></div>
      <div class="collapse" id="th"></div>
      <div class="collapse" id="f"></div>
      <div class="collapse" id="sa"></div>
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
