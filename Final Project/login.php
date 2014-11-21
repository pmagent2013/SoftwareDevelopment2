<!DOCTYPE html>
<html>
<header>
	<link rel="stylesheet" type="text/css" href="style.css">
</header>



<body>
<a href='index.php'>Home </a>| 
<a href='lost.php'> Submit Lost Item </a>|
<a href='searchLost.php'> Search for Lost Item </a>|
<a href='found.php'> Submit Found Item </a>|
<a href='searchFound.php'> Search for Found Item </a>|
<a href='Modify.php'> Modify Submitted Item Status </a>|
<a href='quickLinks.php'> Quick Links </a>|
<a href='login.php'> Admin </a>


<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Connect to MySQL server and the database
require( 'includes/login_tools.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {

	$username = $_POST['username'] ;
	$password = $_POST['password'] ;


    $pid = validate($username, $password) ;

    if($pid == -1)
      echo '<P style=color:red>Login failed please try again.</P>' ;

    else
      load('admin.php', $pid);

}
?>
<!-- Get inputs from the user. -->
<h1>User login</h1>
<form action="login.php" method="POST">
<table>
<tr>
<td>Userame:</td><td><input type="text" name="username"></td>
</tr>
<tr>
<td>Password:</td><td><input type="password" name="password"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>