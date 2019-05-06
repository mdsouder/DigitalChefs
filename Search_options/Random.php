<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
        <?php
            // Get a connection for the database
echo "<h1>Digital Chefs</h1>";
echo "<hr>";
echo "<h2>Random Recipe</h2>";
require_once('../initialization.php');
// Create a query for the database
$query = "SELECT Recipe_ID FROM Recipes";
$second_query = "SELECT Recipe_ID, Recipe_Name, Time, Culture FROM Recipes";
$rec_ID = array();
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);
$second_response = @mysqli_query($dbc, $second_query);
$num_of_rows = 0;
while($push_var = mysqli_fetch_array($response))
{$num_of_rows = $num_of_rows + 1;
array_push($rec_ID,$push_var['Recipe_ID']);}
$random_var = rand(1, $num_of_rows);
$rec_ID_check = $rec_ID[$random_var-1];
$third_query = "SELECT Step_ID, Description FROM steps_$rec_ID_check";
$third_response = @mysqli_query($dbc, $third_query);
$fourth_query = "SELECT * FROM ingredients_$rec_ID_check";
$fourth_response = @mysqli_query($dbc, $fourth_query);
if($second_response){
while($row = mysqli_fetch_array($second_response)){
    if($row['Recipe_ID'] == $rec_ID_check){
        echo '<tr>Recipe Name: <td align="left">' . $row['Recipe_Name']. '<br>';
        echo '</td>Time (Minutes): <td align="left">'. $row['Time']. '<br>';
        echo '</td>Culture: <td align="left">'. $row['Culture']. '<br>';
    }
echo '</tr>';
}
echo '<br>';
while($row = mysqli_fetch_array($fourth_response))
{
    echo '<tr><td align="left">Ingredient:      <td/>'.
    '<td align="left">'.$row['Ingredient_Name'].'</td>'. "    ".
    '<td align="left">'.$row['Quantity'].'</td>'. "    ".
    '<td align="left">'.$row['Unit_of_measure'].'</td>'. "    ".
    '</tr><br>';
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
 <li><a href="random.php">Randomize Again</a></li>
 <li><a href="../Main_menu.php">Main Menu</a></li>
    </body>
</html>