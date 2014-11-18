<!DOCTYPE html>
<html>
<?php
# Connect to MySQL server and the database
require( 'includes/connect_db.php' ) ;

# Includes these helper functions
require( 'includes/helpers.php' ) ;

/*if ($_SERVER[ 'REQUEST_METHOD' ] == 'POST') {
	$dateLost = $_POST['num'] ;

  $fname = $_POST['fname'] ;
    
  $lname = $_POST['lname'] ;


    if(!valid_number($num)){
    echo "<p>Please give a valid number.</p>";}
    else if (!valid_name($fname)){
    echo "<p>Please complete the first name.</p>";}
    else if (!valid_name($lname)){
    echo "<p>Please complete the last name.</p>";}
    else{$result = insert_record($dbc, $num, $fname, $lname); }
   # else
    #  echo '<p style="color:red">Please input President number, first name, last name</p>' ;
            

}

else if($_SERVER[ 'REQUEST_METHOD' ] == 'GET') {
if(isset($_GET['num']))
show_record($dbc, $_GET['num']) ;
}*/
# Show the records
show_recordsLost($dbc);

# Close the connection
mysqli_close( $dbc ) ;
?>

<!--

<form action="linkypresidents.php" method="POST">
<table>
<tr>
<td>Number:</td><td><input type="int" name="num" value="<?php if
(isset($_POST['num'])) echo $_POST['num']; ?>"></td>
</tr>
<tr>
<td>First Name:</td><td><input type="text" name="fname" value="<?php if
(isset($_POST['fname'])) echo $_POST['fname']; ?>"></td>
</tr>
<tr>
<td>Last Name:</td><td><input type="text" name="lname" value="<?php if
(isset($_POST['lname'])) echo $_POST['lname']; ?>"></td>
</tr>
</table>
<p><input type="submit" name="Search"></p>
</form>
-->

</html>