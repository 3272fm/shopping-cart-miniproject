<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Signup</title>
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
  	<h2>Nairobi Home Appliances</h2>
  </div>
	<hr color="green">
  <form method="post" action="register.php">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
	<TABLE WIDTH="60%">
	<tr>
  	  <td><label>Username</label></td>
  	  <td><input type="text" name="username"></td>
	  </tr>
  	</div>
  	<div class="input-group">
	<tr>
  	  <td><label>Email</label></td>
  	  <td><input type="email" name="email"></td>
	  </tr>
  	</div>
  	<div class="input-group">
	<tr>
  	  <td><label>Password</label></td>
  	  <td><input type="password" name="password_1"></td></tr>
  	</div>
	<div class="input-group">
	<tr>
  	  <td><label>Confirm Password</label></td>
  	  <td><input type="password" name="password_2"></td></tr>
  	</div>
  	<div class="input-group">
	<tr><td colspan="2">
  	  <button type="submit" class="btn" name="reg_user">Register</button></td></tr>
	  </table>
  	</div>
  	<p>
  		Already a member? <a href="login.php">Sign in</a>
  	</p>
  </form>
</body>
</html>