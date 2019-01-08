<html>
<head>
<meta charset="utf-8">
<title>Sign-up!!!!</title>
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
width: 380px;
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
<div id="login"><fieldset ><legend style="margin-top:10px;"><h1 style="color:white;font-family:FreeMono;font-size:60px;" ><strong>Welcome.</strong> </h1></legend><h1 style="color:white;font-family:serif;font-size:30px;">Please Fill The Form.</h1>
<form action="signupVerify.php" method="post">
<fieldset>
<p><input type="text" name="name" required value="Full Name" onBlur="if(this.value=='')this.value='Full Name'" onFocus="if(this.value=='Full Name')this.value='' "></p>
<p><input type="text" name="id" required value="Email-id / Phone No." onBlur="if(this.value=='')this.value='Email-id / Phone No.'" onFocus="if(this.value=='Email-id / Phone No.')this.value='' "></p>
<p><input type="text" name="age" required value="enter your age" onBlur="if(this.value=='')this.value='enter your age'" onFocus="if(this.value=='enter your age')this.value='' "></p>
<p  style="color:white;" >Gender:<input type="radio" name="gender" value="male" checked="no"> Male <input type="radio" name="gender" value="female"> Female<br></p>
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
<p style="color:white;" >Password:<input name="Mpass" id="mpass" type="password" style="margin-left:10px; width:300px;" required value="enter password" onBlur="if(this.value=='')this.value='enter password'" onFocus="if(this.value=='enter password')this.value='' ">
<img src="images.png" align="right" onmouseover="S()" onmouseout="H()" height="25px" width="25px" style="margin-right:20px;margin-top:15px;cursor: pointer;
"><br></p>
<b><a style="margin-left:80%" href="login.php">login</a></b>
<p><input type="submit" value="Sign Up"></p>
</fieldset>
</form>
</fieldset>
</div> <!-- end login -->
</body>
</html>
