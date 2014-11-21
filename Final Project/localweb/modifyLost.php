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


<h1>Need to modify the status of an Item?</h1>
<p>You can change the status and remove items from this page </p>

<h3>Reported in last
<a href='?days=3'>3 Days</a>
| <a href='?days=5'>5 Days</a>
| <a href='?days=7'>7 Days</a>
| <a href='?days=100000'>Eternity</a>
</h3>
<script>var days = null;</script>
<?php
if (isset($_GET['days'])) $days = $_GET['days'];
		else $days = 100000;
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Show the records
show_recordsLostRecentAdmin($dbc, $days);



if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $id = $_POST['id'];
    $currentStatus = $_POST['currentStatus'];
    update_LostItem($dbc, $id, $currentStatus);

}

?>
<form action="modifyLost.php" method="POST">
<table>
<tr>
<td>ID:</td><td><input type="text" name="id" value="<?php if
(isset($_POST['id'])) echo $_POST['id']; ?>"></td>
</tr>
<tr>
<td>New Status:</td><td><input type="text" name="currentStatus" value="<?php if
(isset($_POST['currentStatus'])) echo $_POST['currentStatus']; ?>"></td>
</tr>
</table>
<p><input type="Submit" value="Change Item Status"></p>
</form>
<?php



# Close the connection
mysqli_close( $dbc ) ;
?>



</body>



</html>