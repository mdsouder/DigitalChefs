<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
        <?php
            // Get a connection for the database
echo "<h1>Digital Chefs</h1>";
echo "<hr>";
echo "<h2>Filtered Recipe Search</h2>";
require_once('../initialization.php');
$query = "SELECT Culture FROM Recipes";
$response = @mysqli_query($dbc, $query);
$culture_arr = array();
if($response)
{
    while($row = mysqli_fetch_array($response))
    {
        array_push($culture_arr, $row['Culture']);
    }
    $culture_arr = array_unique($culture_arr);
}
echo '<form action="http://localhost:4000/vscode/Search_options/Filter_Display.php" method="post">';
echo 'Culture:<br>';
echo '<input type="hidden" name="culture_list[]" value="0">';
foreach ($culture_arr as $val)
{
    echo '<input type="checkbox" name="culture_list[]" value="'.$val.'">'.$val.'<br>';
}
echo '<br>Time to Cook:<br>
<input type="hidden" name="time_list[]" value="0">
<input type="checkbox" name="time_list[]" value="15">15 Minutes or Less<br>
<input type="checkbox" name="time_list[]" value="30">15 to 30 Minutes<br>
<input type="checkbox" name="time_list[]" value="45">30 to 45 Minutes<br>
<input type="checkbox" name="time_list[]" value="60">45 to 60 Minutes<br>
<input type="checkbox" name="time_list[]" value="60">60 Minutes or Greater<br>
<br>Check for Ingredients in Digital Pantry?<br>
<input type="radio" name="ingredients" value="True">Yes<br>
<input type="radio" name="ingredients" value="False">No<br>
<br><input type="submit" value="Submit">
</form>';
?>
 <li><a href="../Main_menu.php">Main Menu</a></li>
    </body>
</html>