<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title></title>
    <body>
        <?php
            // Get a connection for the database
echo "<h1>Digital Chefs</h1>";
echo "<hr>";
echo "<h2>Direct Recipe Search</h2>";
require_once('../initialization.php');
echo '<form action="http://localhost:4000/vscode/Search_options/Direct_Display.php" method="post">
Search: <input type="text" name="input"><br>
<input type="submit" value="Submit">
</form>';
?>
 <li><a href="../Main_menu.php">Main Menu</a></li>
    </body>
</html>