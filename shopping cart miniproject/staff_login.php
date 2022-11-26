<?php
$db = mysqli_connect('localhost', 'root', '', 'beginning');
session_start();
$errors=array();
if (isset($_POST['confirm'])) {
	$staff_id = mysqli_real_escape_string($db, $_POST['staff_id']);
	$password=mysqli_real_escape_string($db, $_POST['password']);
	
	if (empty($staff_id)) {
		array_push($errors, "Staff ID cannot be empty");
	}
	if (empty($password)) {
		array_push($errors, "password is required");
	}
  
	if (count($errors) == 0) {
		$password =md5($password);
		$query = "SELECT * FROM staff WHERE 
		password='$password' AND staff_id='$staff_id'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
		  $_SESSION['staff_id'] = $staff_id;
		 header('location:productsupdate.php');
		}else {
			array_push($errors, "Wrong authentication credentials");
		}
	}
  }
?>
  <title>staff</title>
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
background: pink;
padding: 10px 15px;
color:RED;
border-radius: 5px;
margin-right: 10px;
border:none;
width: auto;
font-weight: bold;
font-size: 24px;
}

button:hover{
opacity: .7;
}
</STYLE>
  <div class="header">
  	<h2>Staff login</h2>
  </div>
	<hr color="green">
  <form method="post">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
	<TABLE WIDTH="60%">
	<tr>
  	  <td><label>Staff ID</label></td>
  	  <td><input type="text" name="staff_id"></td>
	  </tr>
  	</div>
  	<div class="input-group">
	<tr>
  	  <td><label>Password</label></td>
  	  <td><input type="password" name="password"></td>
	  </tr>
  	</div>
  	<div class="input-group">
	<tr><td colspan="2">
  	  <button type="submit" class="btn" name="confirm">Log in</button></td></tr>
	  </table>
  	</div>
  </form>

