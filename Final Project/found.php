<!DOCTYPE html>
<html>
<header>
<script>
var days='3';
</script>

</header>



<body>
<a href='index.php'>Home</a>
<a href='lost.php'>Lost</a>
<a href='found.php'>Found</a>
<a href='quickLinks.php'>Quick Links</a>
<a href='admin.php'>Admin</a>


<h1>Found an Item</h1>
<p>If you have found an item, please report it here)</p>






<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $dateFound = $_POST['dateFound'] ;
    $itemType = $_POST['itemType'] ;    
    $color = $_POST['color'] ;
    $brand = $_POST['brand'] ;
    $buildingFound = $_POST['buildingFound'] ;    
    $roomFound = $_POST['roomFound'] ;
    $description = $_POST['description'] ;


    if(!valid_date($dateFound)){
    echo "<p>Please give a valid date.</p>";}
    else if (!valid_name($itemType)){
    echo "<p>Please enter an item type.</p>";}
    else if (!valid_name($color)){
    echo "<p>Please enter a color.</p>";}
    else if (!valid_name($brand)){
    echo "<p>Please enter a brand.</p>";}
    else if (!valid_name($buildingFound)){
    echo "<p>Please enter a building.</p>";}
    else if (!valid_name($roomFound)){
    echo "<p>Please enter a room.</p>";}
    else if (!valid_name($description)){
    echo "<p>Please enter a description.</p>";}
    else{$result = insert_FoundItem($dbc, $dateFound, $itemType, $color, $brand, $buildingFound, $roomFound, $description); }
             

}
else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
if(isset($_GET['dateFound']))
show_record($dbc, $_GET['dateFound']) ;
}
mysqli_close( $dbc ) ;
?>

<!-- Get inputs from the user. -->
<form action="found.php" method="POST">
<table>
<tr>
<td>Date Found:</td><td><input type="date" name="dateFound" value="<?php if
(isset($_POST['dateFound'])) echo $_POST['dateFound']; ?>"></td>
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
<td>Building Found In:</td><td><input type="text" name="buildingFound" value="<?php if
(isset($_POST['buildingFound'])) echo $_POST['buildingFound']; ?>"></td>
</tr>
<tr>
<td>Room Found In:</td><td><input type="text" name="roomFound" value="<?php if
(isset($_POST['roomFound'])) echo $_POST['roomFound']; ?>"></td>
</tr>
<tr>
<td>Description:</td><td><input type="text" name="description" value="<?php if
(isset($_POST['description'])) echo $_POST['description']; ?>"></td>
</tr>
</table>
<p><input type="submit" value="Sumbit Found Item"></p>
</form>



</body>



</html>