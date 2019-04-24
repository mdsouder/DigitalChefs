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
require_once('../initialization.php');

// Create a query for the database
$query = "SELECT Recipe_ID FROM Recipes";
$second_query = "SELECT Recipe_ID, Recipe_Name, Time, User_Generated, Culture FROM Recipes";
// Get a response from the database by sending the connection
// and the query
$response = @mysqli_query($dbc, $query);
$second_response = @mysqli_query($dbc, $second_query);
$num_of_rows = 0;
while(mysqli_fetch_array($response))
{$num_of_rows = $num_of_rows + 1;}
$random_var = rand(1, $num_of_rows);

if($second_response){
    echo '<table align="left"
    cellspacing="5" cellpadding="8">

    <tr><td align="left"><b>Recipe_Name</b>
    <td align="left"><b>Culture</b></td>
    <td align="left"><b>Time</b></td></tr>';
    while($row = mysqli_fetch_array($second_response)){
    echo '<tr><td align="left">' . 
  $row['Recipe_Name'] . '</td><td align="left">' . 
    $row['Culture'] . '</td><td align="left">' .
    $row['Time'] ; 
    echo '</tr>';
    }
} else {
echo "Couldn't issue database query<br />";
echo mysqli_error($dbc);
}
echo '<br>';
// Close connection to the database
mysqli_close($dbc);
?>
<br>
    </body>
    <footer>
    <li><a href="../Main_menu.php">Main Menu</a></li>
    </footer>  
</html>