<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
    <?php

        //inserts the intialization file that sets up the database.
        require_once('intialization.php');
        echo "<h1>Digital Chefs</h1>";
        echo "<hr>";
        echo "<h2>Main Menu</h2>";
    ?>
    <!––sets a form to take input from the user for what menu option to use-->
      <form action="Main_Menu.php" method="get">
          1: Search <br>
          2: Digital Pantry <br>
          3: Help <br>
          <input type="number" name ="Main_Menu_Option" max="3">
    </body>
</html>