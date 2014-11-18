<!DOCTYPE html>
<html>
<header>
</header>



<body>
<a href='lost.php'>Lost</a>
<a href='found.php'>Found</a>
<a href='quickLinks.php'>Quick Links</a>
<a href='admin.php'>Admin</a>


<h1>Welcome to Mike and Torin's Lost and Found</h1>
<p>If you have either lost or found an item you can let us know here ;) </p>

<h3>Reported in last
<a href='?days=3'>3 Days</a>
| <a href='?days=5'>5 Days</a>
| <a href='?days=7'>7 Days</a>
| <a href='?days=100000'>Eternity</a>
</h3>
<script>var days = null;</script>
<?php
if (isset($_GET['days'])) $days = $_GET['days'];
		else $days = 3;
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

# Show the records
show_recordsLostRecent($dbc, $days);


if (isset($_GET['days'])) $days = $_GET['days'];
		else $days = 3;


# Show the records
show_recordsFoundRecent($dbc, $days);

# Close the connection
mysqli_close( $dbc ) ;
?>

</body>



</html>