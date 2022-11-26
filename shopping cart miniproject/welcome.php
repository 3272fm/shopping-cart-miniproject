<?php 
  session_start(); 
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<STYLE>
  body{
background-image:  url(imgs/kitchen.jpg);;
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
p{
	font-size: 28px;
padding-bottom: 1px;
padding-top: 1px;
}
h1,h2,h4{
text-align: center;
font-family: Ink Free;
font-size: 60px;
color: morado;
border-bottom: 1px solid #ffffff;
}
h3{
	font-size: 27px;
	color: lime;
	border-top: 1px solid #ffffff;
}

button{
	font-weight: bolder;
	background: red;
font-family: calibri;
font-size: 28px;
}
p{
  text-align: center;
  font-weight: bold;
  background: white;
}
</style>

<body>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
<table width=100%>
<thead>
<td><a href="index.php" align="left"><button>View ads</button></a> </td> <td align="right"><a href="register.php"><button>logout</button></a></td><thead>
<td colspan=2><h2 align="block"><b>Hi <?php echo $_SESSION['username']; ?>, </h2></td></tr></table>
	
    <?php endif ?>
</div>
<div class="featured">
    <p> Need electronic appliances for your kitchen? </p>
    <p>Worry no more, this site<br> got you covered</p>
    <p>The sellers' contact adress is left below each item</p>
    <p> Just make a call and we'll deliver at your door step</p><br>
    <h3><i>Care to leave us a comment?<br> please drop it below;</i></h3>
</div>

</body>
<?php
 $connection=mysqli_connect('localhost', 'root', '', 'beginning');
 if(!$connection){
  echo "Connection to database failed";
 }
if(isset($_POST) & !empty($_POST)){
	$name = mysqli_real_escape_string($connection, $_POST['name']);
	$about = mysqli_real_escape_string($connection, $_POST['about']);
	$subject = mysqli_real_escape_string($connection, $_POST['subject']);
 $isql = "INSERT INTO comments (name, about, subject) 
	VALUES ('$name', '$about', '$subject')";
	$ires = mysqli_query($connection, $isql) or die(mysqli_error($connection));
	if($ires){
		$smsg = "Your Comment Submitted Successfully!!";
	}else{
		$fmsg = "Failed to Submit Your Comment";
	}
 
	}
?>
<html>
<body>
		  	<?php if(isset($smsg)){ ?><?php echo $smsg; ?> <?php } ?>
			<?php if(isset($fmsg)){ ?><?php echo $fmsg; ?> <?php } ?>
		  	<form method="post">
		  	 <table>
			    <tr><td><label>Name</label></td>
			    <td><input type="text" name="name" value="<?php echo $_SESSION['username']; ?>"></td></tr>
			 <tr>
			    <td><label>Subject</label></td>
			    <td><input type="text" name="about"></td></tr>
				<tr>
			    <td><label>Comment</label></td>
			    <td><textarea name="subject" rows="6" columns="15"></textarea></td></tr>
				<tr><td colspan="2">
			  <button type="submit">Submit</button></td></tr></table>
			</form>
</body>
</html>
<?php
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>&copy; $year,E-marketing System</p>
            </div>
        </footer>
        <script src="script.js"></script>
    </body>
</html>
EOT;
?>
</html>