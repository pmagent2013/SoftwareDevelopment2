<?php
# Shows the records in lost
function show_recordsLostSearch($dbc, $itemType, $color, $brand) {
$query = 'SELECT dateLost, itemType, color, brand, buildingLost, roomLost, description 
          FROM lost 
          WHERE itemType =' . $itemType . ' 
          AND color=' . $color .'
          AND brand=' . $brand .';'
           
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