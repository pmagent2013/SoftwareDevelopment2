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


<h1>Search Lost Items</h1>

<!-- Get inputs from the user. -->
<form action="searchLost.php" method="POST">
<table>
<tr>
<td>Type of Item eg. Watch:</td><td><input type="text" id="itemType" name="itemType" value="<?php if
(isset($_POST['itemType'])) echo $_POST['itemType']; ?>"></td>
</tr>
<tr>
<td>Brand of Item:</td><td><input type="text" id="brand" name="brand" value="<?php if
(isset($_POST['brand'])) echo $_POST['brand']; ?>"></td>
</tr>
<tr>
<td>Color of Item:</td><td><input type="text" id="color" name="color" value="<?php if
(isset($_POST['color'])) echo $_POST['color'];?>"></td>
</tr>
</table>
<p><input type="submit" ></p>
</form>
</html>
</body>


<?php


$brand = (isset($_POST['brand']) ? "'".$_POST['brand']."'" : null);
$itemType = (isset($_POST['itemType']) ? "'".$_POST['itemType']."'" : null);
$color = (isset($_POST['color']) ? "'".$_POST['color']."'" : null);

# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Show the records
    if($brand!=null && $color!=null && $itemType !=null){
       show_recordsLostSearch($dbc, $itemType, $color, $brand); 
    }
        






# Close the connection
mysqli_close( $dbc ) ;
?>





</html>