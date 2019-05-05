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
// Create a query for the database
$query = "SELECT Recipe_ID, Recipe_Name, Time, Culture FROM Recipes";
$response = @mysqli_query($dbc, $query);
// Get a response from the database by sending the connection
// and the query
if($response){
while($row = mysqli_fetch_array($response)){
    foreach($_POST['culture_list'] as $cul_val){
        foreach($_POST['time_list'] as $time_val){
            if(strpos($row['Culture'], $cul_val) !== false || sizeof($_POST['culture_list'])==1){
                if($row['Time'] <= $time_val && $row['Time'] > $time_val-15 || sizeof($_POST['time_list'])==1){
                    if($_POST['ingredients'] == "True"){
                        $row_ID = $row['Recipe_ID'];
                        $second_query = "SELECT Ingredient_ID, Quantity FROM digital_pantry";
                        $second_response = @mysqli_query($dbc, $second_query);
                        $third_query = "SELECT Ingredient_ID, Quantity FROM ingredients_$row_ID"; 
                        $third_response = @mysqli_query($dbc, $third_query);
                        $fourth_query = "SELECT Ingredient_ID, Quantity FROM ingredients_$row_ID"; 
                        $fourth_response = @mysqli_query($dbc, $fourth_query);
                        $ingredients_size = 0;
                        $ingredients_run_count = 0;
                        while($fourth_row = mysqli_fetch_array($fourth_response))
                        {
                            $ingredients_size = $ingredients_size + 1;
                        }
                        while($third_row = mysqli_fetch_array($third_response))
                        {
                            while($second_row = mysqli_fetch_array($second_response))
                            {
                                if($second_row['Ingredient_ID'] == $third_row['Ingredient_ID'])
                                {
                                    if($second_row['Quantity'] > $third_row['Quantity'])
                                    {
                                        $ingredients_run_count = $ingredients_run_count + 1;
                                        $second_query = "SELECT Ingredient_ID, Quantity FROM digital_pantry";
                                        $second_response = @mysqli_query($dbc, $second_query);
                                        if($ingredients_run_count == $ingredients_size)
                                        {
                                            echo '<tr>Recipe Name: <td align="left">' . $row['Recipe_Name']. '<br>';
                                            echo '</td>Time (Minutes): <td align="left">'. $row['Time']. '<br>';
                                            echo '</td>Culture: <td align="left">'. $row['Culture'];
                                            echo '<form action="http://localhost:4000/vscode/Search_options/Recipe_Display.php" method="post">
                                            <button name="submit" type="submit" value='.$row['Recipe_ID'].'>Select</button>
                                            </form><br>';
                                            $second_query = NULL;
                                            $second_response = NULL;
                                        }
                                    }                                   
                                }
                            }
                        }
                    }
                    else{
                        echo '<tr>Recipe Name: <td align="left">' . $row['Recipe_Name']. '<br>';
                        echo '</td>Time (Minutes): <td align="left">'. $row['Time']. '<br>';
                        echo '</td>Culture: <td align="left">'. $row['Culture'];
                        echo '<form action="http://localhost:4000/vscode/Search_options/Recipe_Display.php" method="post">
                        <button name="submit" type="submit" value='.$row['Recipe_ID'].'>Select</button>
                        </form><br>';
                    }
                }  
            }
        }
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