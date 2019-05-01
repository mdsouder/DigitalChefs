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
        echo "<h2>Ingredient Removal</h2>";
    ?>
    <nav>
        <ul>    
            <li><a href="Remove_Ingredients.php">Back to Ingredient Removal Form</a></li>
        </ul>
    </nav>
    </header>
    <body>
    <?php
        $Ingredient_ID = $_POST["Ingredient_ID"];
        
        $query = "DELETE FROM digital_pantry WHERE Ingredient_ID = $Ingredient_ID";
        $response = @mysqli_query($dbc, $query);
        if ($response)
        {
            echo "Ingredient removed successfully!";
        }
        else
        {
            echo "ERROR: Could not execute Order 66, or I mean, uh... $query. " . mysqli_error($dbc);
        }
    ?>


    </body>
</html>