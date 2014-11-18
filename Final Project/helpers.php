<?php
$debug = true;

# Shows the records in lost
function show_recordsLost($dbc) {
$query = 'SELECT dateLost, itemType, color, brand, buildingLost, roomLost, description FROM lost ORDER BY datereported' ;

# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Items Lost</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>Date Lost</TH>';
  echo '<TH>Item Type</TH>';
  echo '<TH>Color</TH>';
  echo '<TH>Brand</TH>';
  echo '<TH>Building Lost</TH>';
  echo '<TH>Room Lost</TH>';
  echo '<TH>Description</TH>';
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    echo '<TR>' ;
    echo '<TD>' . $row['dateLost'] . '</TD>' ;
    echo '<TD>' . $row['itemType'] . '</TD>' ;    
    echo '<TD>' . $row['color'] . '</TD>' ;
    echo '<TD>' . $row['brand'] . '</TD>' ;
    echo '<TD>' . $row['buildingLost'] . '</TD>' ;
    echo '<TD>' . $row['roomLost'] . '</TD>' ;
    echo '<TD>' . $row['description'] . '</TD>' ;
    echo '</TR>' ;
  }

  # End the table
  echo '</TABLE>';

  # Free up the results in memory
  mysqli_free_result( $results ) ;
}
else
{
  # If we get here, something has gone wrong
  echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
}
}



# Shows the records in lost
function show_recordsLostRecent($dbc, $days) {
$query = 'SELECT dateLost, itemType, color, brand, buildingLost, roomLost, description 
          FROM lost 
          WHERE dateLost BETWEEN DATE_SUB(NOW(), INTERVAL '. $days . ' DAY) AND NOW();';
           
# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Items Lost</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>Date Lost</TH>';
  echo '<TH>Item Type</TH>';
  echo '<TH>Color</TH>';
  echo '<TH>Brand</TH>';
  echo '<TH>Building Lost</TH>';
  echo '<TH>Room Lost</TH>';
  echo '<TH>Description</TH>';
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    echo '<TR>' ;
    echo '<TD>' . $row['dateLost'] . '</TD>' ;
    echo '<TD>' . $row['itemType'] . '</TD>' ;    
    echo '<TD>' . $row['color'] . '</TD>' ;
    echo '<TD>' . $row['brand'] . '</TD>' ;
    echo '<TD>' . $row['buildingLost'] . '</TD>' ;
    echo '<TD>' . $row['roomLost'] . '</TD>' ;
    echo '<TD>' . $row['description'] . '</TD>' ;
    echo '</TR>' ;
  }

  # End the table
  echo '</TABLE>';

  # Free up the results in memory
  mysqli_free_result( $results ) ;
}
else
{
  # If we get here, something has gone wrong
  echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
}
}


# Shows the records in lost
function show_recordsFoundRecent($dbc, $days) {
$query = 'SELECT dateFound, itemType, color, brand, buildingFound, roomFound, description 
          FROM found 
          WHERE dateFound BETWEEN DATE_SUB(NOW(), INTERVAL '. $days . ' DAY) AND NOW();';
           
# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Items Found</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>Date Found</TH>';
  echo '<TH>Item Type</TH>';
  echo '<TH>Color</TH>';
  echo '<TH>Brand</TH>';
  echo '<TH>Building Found</TH>';
  echo '<TH>Room Found</TH>';
  echo '<TH>Description</TH>';
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    echo '<TR>' ;
    echo '<TD>' . $row['dateFound'] . '</TD>' ;
    echo '<TD>' . $row['itemType'] . '</TD>' ;    
    echo '<TD>' . $row['color'] . '</TD>' ;
    echo '<TD>' . $row['brand'] . '</TD>' ;
    echo '<TD>' . $row['buildingFound'] . '</TD>' ;
    echo '<TD>' . $row['roomFound'] . '</TD>' ;
    echo '<TD>' . $row['description'] . '</TD>' ;
    echo '</TR>' ;
  }

  # End the table
  echo '</TABLE>';

  # Free up the results in memory
  mysqli_free_result( $results ) ;
}
else
{
  # If we get here, something has gone wrong
  echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
}
}









#this is the function that shows link records
function show_link_records($dbc) {
	# Create a query to get the num, last name of the dead presidents
$query = 'SELECT num, lname FROM presidents ORDER BY num DESC' ;

# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Dead Presidents</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>Number</TH>';    
  echo '<TH>Last Name</TH>';
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    
  $alink = '<A HREF=linkypresidents.php?num=' . $row['num']. '>' . $row['num'] . '</A>' ;
    echo '<TR>' ;
    echo '<TD ALIGN=right>' . $alink . '</TD>' ;
    echo '<TD>' . $row['lname'] . '</TD>' ;
    echo '</TR>' ;    
    
  }
  
  # End the table
  
  echo '</TABLE>';
  
  # Free up the results in memory
  mysqli_free_result( $results ) ;
}
else
{
  # If we get here, something has gone wrong
  echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
}
}

function show_record($dbc, $num) {
	# Create a query to get the num, first name, last name of the dead presidents
$query = 'SELECT num, lname, fname FROM presidents WHERE num = ' . $num ;

# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Dead Presidents</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>Number</TH>';
  echo '<TH>First Name</TH>';
  echo '<TH>Last Name</TH>';
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    echo '<TR>' ;
    echo '<TD>' . $row['num'] . '</TD>' ;
    echo '<TD>' . $row['fname'] . '</TD>' ;
    echo '<TD>' . $row['lname'] . '</TD>' ;
    echo '</TR>' ;
  }

  # End the table
  echo '</TABLE>';

  # Free up the results in memory
  mysqli_free_result( $results ) ;
}
else
{
  # If we get here, something has gone wrong
  echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
}
}

# Inserts a record into the lost table
function insert_lostItem($dbc, $dateLost, $itemType, $color, $brand, $buildingLost, $roomLost, $description) {
  $query = 'INSERT INTO lost(dateLost, itemType, color, brand, buildingLost, roomLost, description) VALUES ( "' . $dateLost . '", "'. $itemType .'", "'. $color .'", "'. $brand .'", "'. $buildingLost .'", "'. $roomLost .'", "'. $description .'" )' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

# Inserts a record into the found table
function insert_foundItem($dbc, $dateFound, $itemType, $color, $brand, $buildingFound, $roomFound, $description) {
  $query = 'INSERT INTO found(dateFound, itemType, color, brand, buildingFound, roomFound, description) VALUES ( "' . $dateFound . '", "'. $itemType .'", "'. $color .'", "'. $brand .'", "'. $buildingFound .'", "'. $roomFound .'", "'. $description .'" )' ;
  show_query($query);

  $results = mysqli_query($dbc,$query) ;
  check_results($results) ;

  return $results ;
}

# Shows the query as a debugging aid
function show_query($query) {
  global $debug;

  if($debug)
    echo "<p>Query = $query</p>" ;
}

# Checks the query results as a debugging aid
function check_results($results) {
  global $dbc;

  if($results != true)
    echo '<p>SQL ERROR = ' . mysqli_error( $dbc ) . '</p>'  ;
}



function valid_number($num) {
if(empty($num) || !is_numeric($num))
return false ;
else {
$num = intval($num) ;
if($num <= 0)
return false ;
}
return true ;
}

function valid_name($name) {
if(empty($name)){
return false;}
return true;
}

function valid_date($date) {
if(empty($date)){
return false;}
return true;
}












function show_recordsFoundType($dbc, $itemType) {
$query = 'SELECT dateFound, itemType, color, brand, buildingFound, roomFound, description 
          FROM found 
          WHERE itemType= '. $itemType . ';';
           
# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Items Found</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>Date Found</TH>';
  echo '<TH>Item Type</TH>';
  echo '<TH>Color</TH>';
  echo '<TH>Brand</TH>';
  echo '<TH>Building Found</TH>';
  echo '<TH>Room Found</TH>';
  echo '<TH>Description</TH>';
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    echo '<TR>' ;
    echo '<TD>' . $row['dateFound'] . '</TD>' ;
    echo '<TD>' . $row['itemType'] . '</TD>' ;    
    echo '<TD>' . $row['color'] . '</TD>' ;
    echo '<TD>' . $row['brand'] . '</TD>' ;
    echo '<TD>' . $row['buildingFound'] . '</TD>' ;
    echo '<TD>' . $row['roomFound'] . '</TD>' ;
    echo '<TD>' . $row['description'] . '</TD>' ;
    echo '</TR>' ;
  }

  # End the table
  echo '</TABLE>';

  # Free up the results in memory
  mysqli_free_result( $results ) ;
}
else
{
  # If we get here, something has gone wrong
  echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
}
}

function show_recordsLostType($dbc, $type) {
$query = 'SELECT dateLost, itemType, color, brand, buildingLost, roomLost, description 
          FROM lost 
          WHERE itemType= '. $type . ';';
           
# Execute the query
$results = mysqli_query( $dbc , $query ) ;

# Show results
if( $results )
{
  # But...wait until we know the query succeeded before
  # starting the table.
  echo '<H1>Items Lost</H1>' ;
  echo '<TABLE border="1">';
  echo '<TR>';
  echo '<TH>Date Lost</TH>';
  echo '<TH>Item Type</TH>';
  echo '<TH>Color</TH>';
  echo '<TH>Brand</TH>';
  echo '<TH>Building Lost</TH>';
  echo '<TH>Room Lost</TH>';
  echo '<TH>Description</TH>';
  echo '</TR>';

  # For each row result, generate a table row
  while ( $row = mysqli_fetch_array( $results , MYSQLI_ASSOC ) )
  {
    echo '<TR>' ;
    echo '<TD>' . $row['dateLost'] . '</TD>' ;
    echo '<TD>' . $row['itemType'] . '</TD>' ;    
    echo '<TD>' . $row['color'] . '</TD>' ;
    echo '<TD>' . $row['brand'] . '</TD>' ;
    echo '<TD>' . $row['buildingLost'] . '</TD>' ;
    echo '<TD>' . $row['roomLost'] . '</TD>' ;
    echo '<TD>' . $row['description'] . '</TD>' ;
    echo '</TR>' ;
  }

  # End the table
  echo '</TABLE>';

  # Free up the results in memory
  mysqli_free_result( $results ) ;
}
else
{
  # If we get here, something has gone wrong
  echo '<p>' . mysqli_error( $dbc ) . '</p>'  ;
}
}








?>