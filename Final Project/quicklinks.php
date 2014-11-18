<!DOCTYPE html>
<html>
<header>
</header>



<body>
<a href='index.php'>Home</a>
<a href='lost.php'>Lost</a>
<a href='found.php'>Found</a>
<a href='quickLinks.php'>Quick Links</a>
<a href='admin.php'>Admin</a>


<h1>Welcome to Mike and Torin's Lost and Found</h1>
<p>If you have either lost or found an item you can let us know here ;) </p>

<h3>Type of item?
<a href='?itemType="watch"'>Watch</a>
| <a href='?itemType="phone"'>Phone</a>
| <a href='?itemType="dad"'>Dad</a>
| <a href='?itemType="coat"'>coat</a>
</h3>
<script>var itemType = '';</script>
<?php
if (isset($_GET['itemType'])) $itemType = $_GET['itemType'];
		else $itemType = null;
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Show the records
if($itemType!=null){

show_recordsLostType($dbc, $itemType);

# Show the records
show_recordsFoundType($dbc, $itemType);
}

# Close the connection
mysqli_close( $dbc ) ;
?>

</body>



</html>