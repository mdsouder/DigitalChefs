<?php
        require_once('../initialization.php');
        // Create a query for the database
        $done = false;
        session_start();
        //inserts the overall recipe into the main recipe table
        //gets the current id that the recipe was auto incremented to.
        $query_Recipe = "INSERT INTO `dc_db`.`recipes` (`Recipe_Name`, `Time`, `Culture`, `User_generated`) VALUES ('{$_SESSION['Title']}','{$_SESSION['Time']}','{$_SESSION['Culture']}','1');";
        $response = @mysqli_query($dbc, $query_Recipe);

        //gets the current id that the recipe was auto incremented to.
        $_SESSION['Current_Recipe'] = mysqli_insert_id($dbc);
        
        //creates the relevant steps table
        $query_Steps_Table = "CREATE TABLE `Steps_{$_SESSION['Current_Recipe']}` (
            `Step_ID` int(11) NOT NULL AUTO_INCREMENT,
            `Recipe_ID` int(11) NOT NULL,
            `Description` varchar(10000) NOT NULL,
            PRIMARY KEY (`Step_ID`,`Recipe_ID`),
            UNIQUE KEY `Step_ID_UNIQUE` (`Step_ID`),
            KEY `Recipe_ID_idx` (`Recipe_ID`),
            CONSTRAINT `Recipe_ID_Steps_{$_SESSION['Current_Recipe']}` FOREIGN KEY (`Recipe_ID`) REFERENCES `recipes` (`Recipe_ID`)
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        $response = @mysqli_query($dbc, $query_Steps_Table);

        //uses the amount of steps to insert that many into the created table
        for($i = 1; $i <= $_SESSION['Steps_Num'];$i++)
        {
            $query_steps = "INSERT INTO Steps_{$_SESSION['Current_Recipe']} (Recipe_ID, Description) VALUES ('{$_SESSION['Current_Recipe']}','{$_POST['step_'.$i]}');";
            $response = @mysqli_query($dbc, $query_steps);
        }

        $query_Ingredients_Table = "CREATE TABLE `Ingredients_{$_SESSION['Current_Recipe']}` (
            `Ingredient_ID` int(11) NOT NULL AUTO_INCREMENT,
            `Recipe_ID` int(11) NOT NULL,
            `Ingredient_Name` varchar(45) DEFAULT NULL,
            `Quantity` varchar(45) DEFAULT NULL,
            `Unit_of_measure` varchar(10) DEFAULT NULL,
            PRIMARY KEY (`Ingredient_ID`,`Recipe_ID`),
            UNIQUE KEY `Ingredient_ID_UNIQUE` (`Ingredient_ID`),
            KEY `Recipe_ID_idx` (`Recipe_ID`),
            CONSTRAINT `Recipe_ID_Ingredients_{$_SESSION['Current_Recipe']}_{$_SESSION['Current_Recipe']}` FOREIGN KEY (`Recipe_ID`) REFERENCES `recipes` (`Recipe_ID`)
          ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8";
        $response = @mysqli_query($dbc, $query_Ingredients_Table);
        
        for($i = 1; $i <= $_SESSION['Ingredients_Num'];$i++)
        {
            $query_ingredients = "INSERT INTO `Ingredients_{$_SESSION['Current_Recipe']}` (Recipe_ID, Ingredient_Name, Quantity, Unit_of_measure) VALUES ( '{$_SESSION['Current_Recipe']}', '{$_POST['Ingredient_'.$i]}', '{$_POST['Amount_'.$i]}', '{$_POST['uom_'.$i]}');";
            $response = @mysqli_query($dbc, $query_ingredients);
            // if (!$response) {
            //     echo mysqli_error($dbc);
            //   }
        }
        
        $done = true;
        // Close connection to the database
        mysqli_close($dbc);
        if ($done == true)  {
            header('Location: ' . "../Main_Recipe_Display.php", false, 302);
            exit; // Ensures, that there is no code _after_ the redirect executed
          }
?>