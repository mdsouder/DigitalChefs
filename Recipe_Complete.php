<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title>DigitalChefs</title>
    <header>
        <?php
    //inserts the intialization file that sets up the database.
        require_once('initialization.php');
        //sets up the main menu to choose from 
        echo "<h1>Digital Chefs</h1>";
        echo "<hr>";
        echo "<h2>Ingredient Removal</h2>";
    ?>
    <nav>
        <ul>    
            <li><a href="Main_Menu.php">Back to Main Menu</a></li>
        </ul>
    </nav>
    </header>
    <body>
    <?php
$ID_var = $_POST['ID_var'];
$second_query = "SELECT Ingredient_Name, Quantity FROM digital_pantry";
$second_response = @mysqli_query($dbc, $second_query);
$third_query = "SELECT Ingredient_Name, Quantity FROM ingredients_$ID_var"; 
$third_response = @mysqli_query($dbc, $third_query);
$fourth_query = "SELECT Ingredient_Name, Quantity FROM ingredients_$ID_var"; 
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
        if(strtoupper($second_row['Ingredient_Name']) == strtoupper($third_row['Ingredient_Name']))
        {
            $ingredients_run_count = $ingredients_run_count + 1;
            $Quantity = $third_row['Quantity'];
            $Ingredient_Name = $third_row['Ingredient_Name'];
            $new_query = "UPDATE digital_pantry SET Quantity = (Quantity - '$Quantity') WHERE digital_pantry.Ingredient_Name = '$Ingredient_Name'";
            $new_response = @mysqli_query($dbc, $new_query);
			if ($Quantity <= 0)
			{
				$second_query = "DELETE FROM digital_pantry WHERE Ingredient_Name = $Ingredient_Name"; 
            }
            if ($ingredients_run_count == $ingredients_size)
            {
                $second_query = NULL;
                $second_response = NULL;
            }
        }
    }
    $second_query = "SELECT Ingredient_Name, Quantity FROM digital_pantry";
    $second_response = @mysqli_query($dbc, $second_query);
}
        if ($second_response)
        {
            echo "Recipe complete! Enjoy your food!";
        }
        else
        {
            echo "ERROR: Could not execute Order 66, or I mean, uh... $query. " . mysqli_error($dbc);
        }
    ?>
    </body>
</html>