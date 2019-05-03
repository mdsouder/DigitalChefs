<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title>DigitalChefs</title>
    <header>
        <?php
    //inserts the intialization file that sets up the database.
        require_once('../initialization.php');
        //sets up the main menu to choose from 
        echo "<h1>Digital Chefs</h1>";
        echo "<hr>";
        echo "<h2>Ingredient Submission</h2>";
    ?>
    <nav>
        <ul>    
            <li><a href="Add_Ingredients.php">Back to Ingredient Addition Form</a></li>
        </ul>
    </nav>
    </header>
    <body>
    <?php
        $Ingredient_Name = $_POST["Ingredient_Name"];
        $Quantity = $_POST["Quantity"];
        $Unit_of_measure = $_POST["Unit_of_measure"];

        $query = "SELECT Ingredient_ID, Ingredient_Name, Quantity, Unit_of_measure FROM Digital_Pantry";
        $response = @mysqli_query($dbc, $query);

        while ($row = mysqli_fetch_array($response))
        {
            if ($row['Ingredient_Name'] == $Ingredient_Name)
            {
                $Aquery = "UPDATE digital_pantry SET Quantity = (Quantity + '$Quantity') WHERE digital_pantry.Ingredient_Name = '$Ingredient_Name'";
            }
            else
            {
                $Aquery = "INSERT INTO digital_pantry (Ingredient_Name, Quantity, Unit_of_measure) VALUES ('$Ingredient_Name','$Quantity','$Unit_of_measure')";
            }
        }
        
        $response = @mysqli_query($dbc, $Aquery);
        if ($response)
        {
            echo "Ingredient added successfully!";
        }
        else
        {
            echo "ERROR: Could not execute $Aquery. " . mysqli_error($dbc);
        }
    ?>


    </body>
</html>