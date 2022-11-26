<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>LOGIN</title>
  <STYLE>
  body{
background: #b76f20;
font-family: times new roman;
display: justified;
}

form{
width: 75%;
border: 2px solid #ccc;
padding: 30px;
background:#d4bb7e;
border-radius: 15px;
}
h1,h2,h3,h4{
text-align: center;
margin-bottom: 40px;
font-family: Ink Free;
font-size: 60px;
color: morado;
}

a{
text-align: left;
color: black;
underline: none;
}

input{
display: block;
border: 2px solid #652a0e;
width: 95%;
padding: 10px auto;
border-radius: 5px;
}

label{
color:  #000080;
font-size: 18px;
padding: 10px;
}

button {
float:center;
background: #bd8865;
padding: 10px 15px;
color: #5f4b8b;
border-radius: 5px;
margin-right: 10px;
border:none;
width: 70px;
}

button:hover{
opacity: .7;
}
</STYLE>
</head>
<body>
  <div class="header">
  	<h2 align="center">Login</h2>
  </div>
	 <hr color="green" size="8">
  <form method="post" action="login.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
	<table width="60%">
	<tr>
  		<td><label>Username</label></td>
  		<td><input type="text" name="username" ></td>
  	</tr>
	</div>
  	<div class="input-group">
	<tr>
  		<td><label>Password</label></td>
  		<td><input type="password" name="password"></td>
		</tr>
  	</div>
  	<div class="input-group">
  	<tr>
	</table>
<td colspan="2"><button type="submit" class="btn" name="login_user">Login</button>
</td></tr>  	</div>
  	<p>
  		Have no account? Click <a href="register.php">Sign up</a>
  	</p>
  </form>
</body>
</html>