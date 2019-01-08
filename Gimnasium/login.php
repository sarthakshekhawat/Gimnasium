<html>
<head>
<meta charset="utf-8">
<style type="text/css">
body {
      background-image:url('login.gif');
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

/* ---------- LOGIN ---------- */

#login {
margin: 300px auto;
margin-bottom: auto;
width:500px;
}
c{
  font-size: 50px;
  margin: 300px auto;
  font-family: 'Times New Roman';
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
<div id="login"><form action="loginVerify.php" method="post">
<fieldset><legend><c><strong>Welcome.</strong> Please login.</c></legend>
<fieldset>
<p><input type="text" name="username" required value="Email-id / Phone No." onBlur="if(this.value=='')this.value='Email-id / Phone No.'" onFocus="if(this.value=='Email-id / Phone No.')this.value='' "></p>
<p><input type="password" name="pass" id="mpass" required value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "><img src="images.png" align="right" onmouseover="S()" onmouseout="H()" height="25px" width="25px" style="margin-right:20px;margin-top:15px;cursor: pointer;
"></p><br>
<!--<p><a href="#">Forgot Password? </a>-->
<b><a href="signup.php">Sign Up</a></b></p>
<p><input type="submit" value="Login"></p>
</fieldset>
</fieldset>
</form>

</div> <!-- end login -->
</body>
</html>
