<?php
    require_once("../initialization.php");
    $done = false;
    $query_delete_steps = "DROP TABLE steps_{$_POST['submit']}";
    $query_delete_ingredients = "DROP TABLE ingredients_{$_POST['submit']}";
    $query__delete_recipe = "DELETE FROM `recipes` WHERE (`Recipe_ID` = '{$_POST['submit']}');";
    $response = @mysqli_query($dbc, $query_delete_steps);
    $response = @mysqli_query($dbc, $query_delete_ingredients);
    $response = @mysqli_query($dbc, $query__delete_recipe);
    if(!$response)
    {
        mysqli_error($dbc);
    }

    $done = true;
    // Close connection to the database
    mysqli_close($dbc);
    if ($done == true)  {
        header('Location: ' . "My_Recipes_View.php", false, 302);
        exit; // Ensures, that there is no code _after_ the redirect executed
      }
?>