<!DOCTYPE html>
<html>
<header>
<script>
var days='3';
</script>

</header>



<body>
<a href='lost.php'>Lost</a>
<a href='found.php'>Found</a>
<a href='quickLinks.php'>Quick Links</a>
<a href='admin.php'>Admin</a>


<h1>Lost an Item</h1>
<p>If you have either lost an item, please report it here)</p>
<p>What date did you lose the item on?</p>





<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
    $itemType = $_POST['itemType'] ;    
    $color = $_POST['color'] ;
    $brand = $_POST['brand'] ;




    if (!valid_name($itemType)){
    echo "<p>Please enter an item type.</p>";}
    else if (!valid_name($color)){
    echo "<p>Please enter a color.</p>";}
    else if (!valid_name($brand)){
    echo "<p>Please enter a brand.</p>";}
             

}
else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
if(isset($_GET['dateLost']))
show_record($dbc, $_GET['dateLost']) ;
}
mysqli_close( $dbc ) ;
?>

<!-- Get inputs from the user. -->

<?php
if( isset($_GET['submit']) )
{
    //be sure to validate and clean your variables
    $val1 = htmlentities($_GET['itemType']);
    $val2 = htmlentities($_GET['color']);
    $val3 = htmlentities($_GET['brand']);

    //then you can use them in a PHP function. 
    $result = show_recordsLostSearch($dbc, $val1,$val2,$val3);
}
?>





<form action="search.php" method="POST">
<table>
<tr>
<td>Item Type:</td><td><input type="text" name="itemType"></td>
</tr>
<tr>
<td>Color:</td><td><input type="text" name="color"></td>
</tr>
<tr>
<td>Brand:</td><td><input type="text" name="brand"></td>
</tr>
</table>
<p><input type="submit" value="Search" ></input></p>
</form>








</body>



</html>