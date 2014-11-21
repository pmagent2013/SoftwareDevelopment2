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


<h1>Welcome to Mike and Torin's Lost and Found</h1>
<p>If you have either lost or found an item you can let us know here ;) </p>

<h3>View Items Reported in Last
<a href='?days=3'>3 Days</a>
| <a href='?days=5'>5 Days</a>
| <a href='?days=7'>7 Days</a>
| <a href='?days=100000'>Eternity</a>
</h3>
<script>var days = null;</script>
<?php
#set php vaiable days to match the js one
if (isset($_GET['days'])) $days = $_GET['days'];
		else $days = null;
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

if($days != null){
# Show the records
show_recordsLostRecent($dbc, $days);

# Show the records
show_recordsFoundRecent($dbc, $days);
}
else{
	echo '<img src = "doge.png">';
}


# Close the connection
mysqli_close( $dbc ) ;
?>

</body>



</html>