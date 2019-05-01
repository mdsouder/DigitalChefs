<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title>DigitalChefs</title>
    <header>
        <?php
    //inserts the intialization file that sets up the database.
        require_once('../initialization.php');
        //require_once('intialization.php');
        //sets up the main menu to choose from 
        echo "<h1>Digital Chefs</h1>";
        echo "<hr>";
        echo "<h2>Add Ingredients to Digital Pantry</h2>";
    ?>
    <nav>
        <ul>
            <li><a href="../Digital_Pantry.php">Back to Digital Pantry Menu</a></li>
        </ul>
    </nav>

    </header>
    <body>
        <form action="Ingredient_Submit.php" method="POST">
            Ingredient Name:
            <input name="Ingredient_Name" id="Ingredient_Name" type="text">
            <br><br>
            Ingredient Amount:
            <input name="Quantity" id="Quantity" type="number">
            <br><br>
            Unit of Measure:
            <select name="Unit_of_measure" id="Unit_of_measure">
                <option value="Ounce">Oz</option>
                <option value="Pound">Pound</option>
                <option value="Cup">Cups</option>
                <option value="Teaspoon">Tsp</option>
                <option value="Tablespoon">Tbsp</option>
            </select>
            <br><br>
            <input type="submit">
        </form>
    


    </body>
</html>