<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
        <?php
            // Get a connection for the database
echo "<h1>Digital Chefs</h1>";
echo "<hr>";
echo "<h2>My Recipes</h2>";
require_once('initialization.php');
// Create a query for the database
$query = "SELECT Recipe_ID, Recipe_Name, Time, Culture, User_generated FROM recipes";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);
if(mysqli_num_rows($response) > 0)
{
    echo '<table align="left"
    cellspacing="5" cellpadding="8">
    <tr><td align="left"><b>Recipe Name</b>
    <td align="left"><b>Culture</b></td>
    <td align="left"><b>Time</b></td></tr>';
    
    while($row = mysqli_fetch_assoc($response))
    {
        if($row["User_generated" ] == 1)
        {
        echo '<tr><td align="left">' . 
        $row['Recipe_Name'] . '</td><td align="left">' . 
        $row['Culture'] . '</td><td align="left">' .
        $row['Time'] ; 
        echo '</tr>';
        }
    }

    echo '<td align="left"><li><a href="Main_menu.php">Main Menu</a></li></td>';
} 
else 
{
echo "Couldn't issue database query<br />";
echo mysqli_error($dbc);
}
echo '<br>';
// Close connection to the database
mysqli_close($dbc);
?>
<br>
    </body>
</html>