<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
        <?php
            // Get a connection for the database
echo "<h1>Digital Chefs</h1>";
echo "<hr>";
echo "<h2>Recipe</h2>";
require_once('../initialization.php');
// Create a query for the database
$second_query = "SELECT Recipe_ID, Recipe_Name, Time, Culture FROM Recipes";
// Get a response from the database by sending the connection
// and the query
$second_response = @mysqli_query($dbc, $second_query);
$num_of_rows = 0;
$ID_var = $_POST['submit'];
$third_query = "SELECT Step_ID, Description FROM steps_$ID_var";
$third_response = @mysqli_query($dbc, $third_query);
if($second_response){
while($row = mysqli_fetch_array($second_response)){
    if($row['Recipe_ID'] == $ID_var){
        echo '<tr>Recipe Name: <td align="left">' . $row['Recipe_Name']. '<br>';
        echo '</td>Time (Minutes): <td align="left">'. $row['Time']. '<br>';
        echo '</td>Culture: <td align="left">'. $row['Culture']. '<br>';
    }
echo '</tr>';
}
echo '<br>';
while($row = mysqli_fetch_array($third_response))
{
    echo '<tr>Step <td align="left">' . $row['Step_ID']. ': '. $row['Description'].'<br>';
}
echo '<br>';
} else {
echo "Couldn't issue database query<br />";
echo mysqli_error($dbc);
}
// Close connection to the database
mysqli_close($dbc);
?>
 <li><a href="../Main_menu.php">Main Menu</a></li>
    </body>
</html>