<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
        <?php
            // Get a connection for the database
echo "<h1>Digital Chefs</h1>";
echo "<hr>";
echo "<h2>Direct Recipe Search</h2>";
require_once('../initialization.php');
// Create a query for the database
$query = "SELECT Recipe_ID, Recipe_Name, Time, Culture FROM Recipes";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);
if($response){
while($row = mysqli_fetch_array($response)){
    if(strpos($row['Recipe_Name'], $_POST['input']) !== false){
        echo '<tr>Recipe Name: <td align="left">' . $row['Recipe_Name']. '<br>';
        echo '</td>Time (Minutes): <td align="left">'. $row['Time']. '<br>';
        echo '</td>Culture: <td align="left">'. $row['Culture'];
        echo '<form action="http://localhost:4000/vscode/Search_options/Recipe_Display.php" method="post">
            <input name="submit" type="submit" value='.$row['Recipe_ID'].'>
            </form><br>';
    }
echo '</tr>';
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