<html>
<head>
<meta charset="utf-8">
<style type="text/css">
body {
	background-image:url('gym.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;

color: #5a5656;
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

/* ---------- LOGIN ---------- */
#login {
margin-left: 500px;
margin-top: 100px;
width: 500px;
}
form fieldset input[type="text"], input[type="password"] {
background-color: #e5e5e5;
border: none;
margin-left: 15px;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #5a5656;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
font-size: 14px;
height: 50px;
outline: none;
padding: 0px 10px;
width: 350px;
-webkit-appearance:none;
}
button{
	background-color: #008dde;
	border: none;
	border-radius: 3px;
	-moz-border-radius: 3px;
	-webkit-border-radius: 3px;
	color: #f4f4f4;
	cursor: pointer;
	font-family: 'Open Sans', Arial, Helvetica, sans-serif;
	height: 50px;
	margin-left: 150px;
	text-transform: uppercase;
	width: 200px;
	-webkit-appearance:none;

}
form fieldset input[type="submit"] {
background-color: #008dde;
border: none;
border-radius: 3px;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
color: #f4f4f4;
cursor: pointer;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
height: 50px;
margin-left: 150px;
text-transform: uppercase;
width: 200px;
-webkit-appearance:none;
}
form fieldset a {
color: #5a5656;
font-size: 10px;
}
form fieldset a:hover { text-decoration: underline; }
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
<script>
function S(){
	var obj = document.getElementById("mpass");
  obj.type = "text";
}
function H(){
	var obj = document.getElementById('mpass');
  obj.type = "password";
}
</script>
<?php session_start();
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname="Project";
  $n=$_SESSION["id"];
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  ?>
	<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="delete.php">&nbsp&nbsp<input type="image" height="7%" onclick="P()" src="deleteProfile.png"></a>
	<a style="margin-left:80%">
					<button onclick="S()">Profile</button>
				</a>

<div id="login"><fieldset ><legend style="margin-top:10px;"><h1 style="color:white;font-family:FreeMono;font-size:60px;" ><strong>Welcome.</strong> </h1></legend><h1 style="color:white;font-family:serif;font-size:30px;">Edit profile.</h1>
<form action="editprofile.php" method="post">
<fieldset>
<p><b style="color:white">Name:</b><input type="text" name="name" value='<?php echo $_SESSION['name'];?>'></p>
<p><b style="color:white">Pic URL:</b><input type="text" name="link" style="width:340px"></p>
<p><b style="color:white">Age:</b><input type="text" name="age" value='<?php echo $_SESSION['age'];?>'></p>
<p style="color:white">Height( in cm) :  <select name="height" style="margin-left:10px">
<?php
    for ($x=1; $x<=250; $x++) {
        echo '    <option value="' . $x . '">' . $x . '</option>' . PHP_EOL;
    }
?>
  </select>
	<p style="color:white">Weight( in Kg) :  <select name="weight" style="margin-left:10px">
	<?php
	    for ($x=1; $x<=350; $x++) {
	        echo '    <option value="' . $x . '">' . $x . '</option>' . PHP_EOL;
	    }
	?>
	  </select></p>
<p><input type="submit" value="Submit"></p>
</fieldset>
</form>
</fieldset>
</div>
<script>
		function P()
		 {
			if (window.confirm('Account will be deleted.  Continue??'))
			{
			 window.location.href = 'delete.php';
			}
		}
	function S()
	 {
		if (window.confirm('All changes will be discarded.  Continue??'))
		{
		 window.location.href = 'profile.php';
		}
	}
</script>
</body>
</html>
