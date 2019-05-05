<?php session_start(); ?>
<!DOCTYPE html>
<html>
    <header>
    <a href="../Main_Menu.php">Main_Menu</a>
    <hr>
    <h1>Digital Chefs</h1>
    <hr>
    <h2>My Recipes - Add</h2>
    </header>
    <body>
        <form action="My_Recipes_Add.php" method='post'>
            Title of your Recipe: <input type="text" name="Title" required> <br>
            Culture of your Recipe: <input type="text" name="Culture" required> <br>
            Timing of your Recipe(Minutes): <input type="number" name="Time" required> <br>
            How many ingredients do you need: <input type="number" name="Ingredients_Num" required> <br>
            How many steps does it take?: <input type="number" name="Steps_Num" required> <br>
            <input type="submit" name="submit"> <br>
        </form>
        <?php
        if(isset($_POST['Title']))
            $_SESSION['Title'] = $_POST['Title'];
        if(isset($_POST['Culture']))
            $_SESSION['Culture'] = $_POST['Culture'];
        if(isset($_POST['Time']))
            $_SESSION['Time'] = $_POST['Time'];
        if(isset($_POST['Ingredients_Num']))
            $_SESSION['Ingredients_Num'] = $_POST['Ingredients_Num'];
        if(isset($_POST['Steps_Num']))
            $_SESSION['Steps_Num'] = $_POST['Steps_Num'];

        ?>
        <hr>

        <form action="My_Recipes_Add_Send.php" method='post'>
        <?php
            $ingredient_done = false;
            $step_done = false;
            //if they have a number set for the number of ingredients
            if(isset($_POST["Ingredients_Num"]))
            {
                
                echo "<h2><b>Ingredients</b></h2><br>";
                for($i = 1; $i <= $_POST["Ingredients_Num"]; $i++)
                {
                    echo  "Ingredient $i: <input type='text' name='Ingredient_$i' required>" . "Amount: <input type='number' step='.01' name='Amount_$i' required>".
                    "<select name=uom_$i required>".
                    "<option value='Ounce'>Oz</option>" .
                    "<option value='Pound'>lb</option>".
                    "<option value='Cup'>Cups</option>".
                    "<option value='Teaspoon'>Tsp</option>".
                    "<option value='Tablespoon'>Tbsp</option>".
                    "</select><br>";
                }
                $ingredient_done = true;
            }
            //if they have a number set for the amount of steps
            if(isset($_POST["Steps_Num"]))
            {
                echo "<h2><b>Steps</b></h2><br>";
                for($i = 1; $i <= $_POST["Ingredients_Num"]; $i++)
                {
                    echo    "Step $i: <input type='text' name='step_$i' required> <br>";
                }
                $step_done = true;
            }
        ?>
        <input type="submit" name="submit"> <br>
        </form>
    </body>
</html>