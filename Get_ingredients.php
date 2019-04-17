<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
        <?php
            // Get a connection for the database
require_once('intialization.php');

// Create a query for the database
$query = "SELECT , Ingredient_ID, Ingredient_Name, Quantity, Unit_of_measure FROM Digital_Pantry";

// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// If the query executed properly proceed
if($response){

    echo '<table align="left"
    cellspacing="5" cellpadding="8">
    
    <tr><td align="left"><b>Ingredient_ID</b></td>
    <td align="left"><b>Ingredient_Name</b></td>
    <td align="left"><b>Quantity</b></td>
    <td align="left"><b>Unit_of_measure</b></td></tr>';

while($row = mysqli_fetch_array($response)){

echo '<tr><td align="left">' . 
$row['Ingredient_ID'] . '</td><td align="left">' . 
$row['Ingredient_Name'] . '</td><td align="left">' .
$row['Quantity'] . '</td><td align="left">' . 
$row['Unit_of_Measure'] . '</td><td align="left">';

echo '</tr>';
}

echo '</table>';

} else {

echo "Couldn't issue database query<br />";

echo mysqli_error($dbc);

}

// Close connection to the database
mysqli_close($dbc);

?>
        ?>
    </body>
</html>

