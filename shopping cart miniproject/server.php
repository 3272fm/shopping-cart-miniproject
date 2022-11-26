<?php
// initializing variables
$username = "";
$email    = "";
$name="";
$desc="";
$price="";
$message="";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'beginning');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM clients WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO clients (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	//$_SESSION['success'] = "You are now logged in";
  	header('location: welcome.php');
  }
}

//LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password =md5($password);
  	$query = "SELECT * FROM clients WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
 // 	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  header('location: welcome.php');
  	}else {
  		array_push($errors, "Wrong authentication credentials");
  	}
  }


//REGISTER STAFF
if (isset($_POST['reg_staff'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $staff_id= mysqli_real_escape_string($db, $_POST['staff_id']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name cannot be null"); }
  if (empty($staff_id)) { array_push($errors, "Please enter staff id"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }
  $staff_check_query = "SELECT * FROM staff WHERE name='$name' 
  OR email='$email' OR staff_id='$staff_id' LIMIT 1";
  $result = mysqli_query($db, $staff_check_query);
  $staff = mysqli_fetch_assoc($result);
  
  if ($staff) { 
    if ($staff['name'] === $name) {
      array_push($errors, "Staff with similar name exists!!");
    }

    if ($staff['email'] === $email) {
      array_push($errors, "similar email exists");
    }
    if ($staff['staff_id'] === $staff_id) {
      array_push($errors, "ID exists in the database");
    }
  }

  if (count($errors) == 0) {
  	$password = md5($password_1);

  	$query = "INSERT INTO staff (name, staff_id, email, password) 
  			  VALUES('$name', '$staff_id', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['name'] = $name;
  	header('location: mystaff.php');
  }
}