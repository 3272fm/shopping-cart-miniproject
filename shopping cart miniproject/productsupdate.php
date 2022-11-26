<?php
$db = mysqli_connect('localhost', 'root', '', 'beginning');
$errors=array();
$name ="";
$desc="";
$price="";
$rrp="";
$quantity="";
$img ="";

if (isset($_POST['update_products'])) {
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$desc = mysqli_real_escape_string($db, $_POST['desc']);
	$price = mysqli_real_escape_string($db, $_POST['price']);
	$rrp = mysqli_real_escape_string($db, $_POST['rrp']);
	$quantity = mysqli_real_escape_string($db, $_POST['quantity']);
	$img = mysqli_real_escape_string($db, $_POST['img']);
}

if (empty($name)) { array_push($errors, "name is required"); }
  if (empty($desc)) { array_push($errors, "description is required"); }
  if (count($errors) == 0) {
$query = "INSERT INTO `products` ( `name`, `desc`, `price`, `rrp`, `quantity`, `img`) 
VALUES ('$name', '$desc', '$price', '%rrp', '$quantity', '$img');";
mysqli_query($db, $query);
header('location:edit.php');}
?>
<!DOCTYPE html>
<html>
<head>
  <title>add products</title>
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
margin-bottom: 2px;
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
background:red;
padding: 10px 15px;
color:#fffff;
border-radius: 5px;
margin-right: 10px;
border:none;
font-weight: bolder;
font-size:17px;
width: auto;
}

button:hover{
opacity: .7;
}
</STYLE>
</head>
<body>
  <div class="header">
  	<h2>Update products</h2>
  </div>
	<hr color="green">
  <form method="post">
  	<?php include('errors.php'); ?>
  	<div class="input-group">
	<TABLE WIDTH="60%">
	<tr>
  	  <td><label>Product name</label></td>
  	  <td><input type="text" name="name"></td>
	  </tr>
  	</div>
  	<div class="input-group">
	<tr>
  	  <td><label>Description</label></td>
  	  <td><textarea name="desc" rows=12 cols=18></textarea></td>
	  </tr>
  	</div>
  	<div class="input-group">
	<tr>
  	  <td><label>Price</label></td>
  	  <td><input type="number" name="price"></td></tr>
  	</div>
	<div class="input-group">
	<tr>
  	  <td><label>RRP</label></td>
  	  <td><input type="number" name="rrp"></td></tr>
  	</div>
  	<div class="input-group">
	  <div class="input-group">
	<tr>
  	  <td><label>Quantity</label></td>
  	  <td><input type="number" name="quantity"></td></tr>
  	</div>
  	<div class="input-group">
	  <div class="input-group">
	<tr>
  	  <td><label>Product image</label></td>
  	  <td><input type="text" name="img"></td></tr>
  	</div>
  	<div class="input-group">
	<tr><td>
  	  <button type="submit" class="btn" name="update_products">
			Update</button></td><td><a href="edit.php">products</a></tr>
	  </table>
  	</div>
  
  </form>
</body>
</html>