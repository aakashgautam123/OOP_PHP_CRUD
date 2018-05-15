<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login System</title>
	<link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">

</head>
<body>

	
<div id="form">
	<form action="index.php" method="POST">
		<center></center>
		<label>UserName:</label>
		<input type="text" name="username" placeholder="Enter username" required="required">
		<label>UserEmail:</label>
		<input type="email" name="email" placeholder="Enter email" required="required">
		<label>Password:</label>
		<input type="Password" name="password" placeholder="Enter password" required="required">
		<input type="submit" name="submit" value="Register">

	</form>
</div>


<script src="public/js/jquerymin.js"></script>

<script type="text/javascript">

</script>
</body>
</html>

<?php

date_default_timezone_set("Asia/Kathmandu");
include 'process.php';
include 'user.php';
$db = new Database();
if(isset($_POST['submit']))
{

$user = new User();

$user->name = $_POST['username'];
$user->password = sha1($_POST['password']);
$user->email = $_POST['email'];
$user->timestamps = date("h:i:sa");

$feedback =  $db->insert($user);



}



?>