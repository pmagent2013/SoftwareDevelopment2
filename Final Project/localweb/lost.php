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




<h1>Lost an Item</h1>
<p>If you have lost an item, please report it here)</p>






<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $dateLost = $_POST['dateLost'] ;
    $itemType = $_POST['itemType'] ;    
    $color = $_POST['color'] ;
    $brand = $_POST['brand'] ;
    $buildingLost = $_POST['buildingLost'] ;    
    $roomLost = $_POST['roomLost'] ;
    $description = $_POST['description'] ;


    if(!valid_date($dateLost)){
    echo "<p>Please give a valid date.</p>";}
    else if (!valid_name($itemType)){
    echo "<p>Please enter an item type.</p>";}
    else if (!valid_name($color)){
    echo "<p>Please enter a color.</p>";}
    else if (!valid_name($brand)){
    echo "<p>Please enter a brand.</p>";}
    else if (!valid_name($buildingLost)){
    echo "<p>Please enter a building.</p>";}
    else if (!valid_name($roomLost)){
    echo "<p>Please enter a room.</p>";}
    else if (!valid_name($description)){
    echo "<p>Please enter a description.</p>";}
    else{$result = insert_lostItem($dbc, $dateLost, $itemType, $color, $brand, $buildingLost, $roomLost, $description); }
             

}
else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
if(isset($_GET['dateLost']))
show_record($dbc, $_GET['dateLost']) ;
}
mysqli_close( $dbc ) ;
?>

<!-- Get inputs from the user. -->
<form action="lost.php" method="POST">
<table>
<tr>
<td>Date Lost:</td><td><input type="date" name="dateLost" value="<?php if
(isset($_POST['dateLost'])) echo $_POST['dateLost']; ?>"></td>
</tr>
<tr>
<td>Item Type:</td><td><input type="text" name="itemType" value="<?php if
(isset($_POST['itemType'])) echo $_POST['itemType']; ?>"></td>
</tr>
<tr>
<td>Color:</td><td><input type="text" name="color" value="<?php if
(isset($_POST['color'])) echo $_POST['color']; ?>"></td>
</tr>
<tr>
<td>Brand:</td><td><input type="text" name="brand" value="<?php if
(isset($_POST['brand'])) echo $_POST['brand']; ?>"></td>
</tr>
<tr>
<td>Building Lost In:</td><td><input type="text" name="buildingLost" value="<?php if
(isset($_POST['buildingLost'])) echo $_POST['buildingLost']; ?>"></td>
</tr>
<tr>
<td>Room Lost In:</td><td><input type="text" name="roomLost" value="<?php if
(isset($_POST['roomLost'])) echo $_POST['roomLost']; ?>"></td>
</tr>
<tr>
<td>Description:</td><td><input type="text" name="description" value="<?php if
(isset($_POST['description'])) echo $_POST['description']; ?>"></td>
</tr>
</table>
<p><input type="Submit" value="Submit Lost Item" ></p>
</form>



</body>



</html>