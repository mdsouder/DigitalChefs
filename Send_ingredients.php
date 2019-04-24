<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
        <?php
            // Get a connection for the database
require_once('../initialization.php');
// Create a query for the database
$query = "INSERT INTO dc_db.digital_pantry (Ingredient_Name, Quantity, Unit_of_measure) VALUES ('asdfd', '1234', 'Poud');";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);

// Close connection to the database
mysqli_close($dbc);
?>
    </body>
</html>