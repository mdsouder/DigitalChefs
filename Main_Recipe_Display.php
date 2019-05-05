<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
        <?php
        session_start();
            // Get a connection for the database
echo "<h1>Digital Chefs</h1>";
echo "<hr>";
echo "<h2>Recipe</h2>";
require_once('initialization.php');
// Create a query for the database
$second_query = "SELECT Recipe_ID, Recipe_Name, Time, Culture FROM Recipes";
// Get a response from the database by sending the connection
// and the query
$second_response = @mysqli_query($dbc, $second_query);
$num_of_rows = 0;
if(isset($_POST['submit']))
{
    $_SESSION['Current_Recipe'] = $_POST['submit'];
    $ID_var = $_SESSION['Current_Recipe'];
}
else if(isset($_SESSION['Current_Recipe']))
{
    $ID_var = $_SESSION['Current_Recipe'];
}
$third_query = "SELECT Step_ID, Description FROM steps_$ID_var";
$third_response = @mysqli_query($dbc, $third_query);
$fourth_query = "SELECT * FROM ingredients_$ID_var";
$fourth_response = @mysqli_query($dbc, $fourth_query);
if($second_response)
{
    while($row = mysqli_fetch_array($second_response)){
        if($row['Recipe_ID'] == $ID_var){
            echo '<tr>Recipe Name: <td align="left">' . $row['Recipe_Name']. '<br>';
            echo '</td>Time (Minutes): <td align="left">'. $row['Time']. '<br>';
            echo '</td>Culture: <td align="left">'. $row['Culture']. '<br>';
        }
        echo '</tr>';
    }
    echo "<hr>";
    while($row = mysqli_fetch_array($fourth_response))
    {
        echo '<tr><td align="left">Ingredient:      <td/>'.
        '<td align="left">'.$row['Ingredient_ID'].'</td>'. "    ".
        '<td align="left">'.$row['Ingredient_Name'].'</td>'. "    ".
        '<td align="left">'.$row['Quantity'].'</td>'. "    ".
        '<td align="left">'.$row['Unit_of_measure'].'</td>'. "    ".
        '</tr><br>';
    }
    echo "<hr>";
    while($row = mysqli_fetch_array($third_response))
    {
        echo '<tr><td align="left">Step  </td><td align="left">' . $row['Step_ID']. ':    '. $row['Description'].'</td></tr><br>';
    }
    echo "<hr>";
	echo "<br><br>";
$row_ID = $row['Recipe_ID'];
$second_query = "SELECT Ingredient_ID, Quantity FROM digital_pantry";
$second_response = @mysqli_query($dbc, $second_query);
$third_query = "SELECT Ingredient_ID, Quantity FROM ingredients_$row_ID"; 
$third_response = @mysqli_query($dbc, $third_query);
$fourth_query = "SELECT Ingredient_ID, Quantity FROM ingredients_$row_ID"; 
$fourth_response = @mysqli_query($dbc, $fourth_query);
$ingredients_size = 0;
while($fourth_row = mysqli_fetch_array($fourth_response))
{
    $ingredients_size = $ingredients_size + 1;
}
while($third_row = mysqli_fetch_array($third_response))
{
    while($second_row = mysqli_fetch_array($second_response))
    {
        if(strtoUpper($second_row['Ingredient_Name']) == strtoUpper($third_row['Ingredient_Name']))
        {
			$Quantity = $second_row['Quantity'];
			$Ingredient_Name = $second_row['Ingredient_Name'];
            $new_query = "UPDATE digital_pantry SET Quantity = (Quantity - '$Quantity') WHERE digital_pantry.Ingredient_Name = '$Ingredient_Name'";
            $new_response = @mysqli_query($dbc, $new_query);
			if ($Quantity <= 0)
			{
				$second_query = "DELETE FROM digital_pantry WHERE Ingredient_Name = $Ingredient_Name"; 
			}
        }
    }
}
} 
else 
{
    echo "Couldn't issue database query<br />";
    echo mysqli_error($dbc);
}
// Close connection to the database
mysqli_close($dbc);
?>
 <li><a href="Main_menu.php">Main Menu</a></li>
    </body>
</html>