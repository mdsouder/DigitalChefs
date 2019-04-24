<!DOCTYPE html>
<html>
<meta charset="utf-8">
    <title>DigitalChefs</title>
    <header>
        <?php
    //inserts the intialization file that sets up the database.
        require_once('initialization.php');
        //require_once('intialization.php');
        //sets up the main menu to choose from 
        echo "<h1>Digital Chefs</h1>";
        echo "<hr>";
        echo "<h2>User Guide</h2>";
    ?>

<nav>
        <ul>
            <li><a href="Main_Menu.php">Back to Main Menu</a></li>
        </ul>
</nav>

    </header>
    <body>
        <h3>What is the Digital Pantry?</h3>
        <p>The Digital Pantry is an inventory of how much of each ingredient you have. Essentially, you'll want to input
            everything that's in your pantry into the Digital Pantry so we can help you determine if you have enough
            ingredients to make what you want!
        </p>
        <h3>My Recipes? So you can make your own recipes?</h3>
        <p>Sure! If you have a recipe that we don't have within our system that you'd like to save and easily make again,
            the My Recipes menu will allow you to input the details of your own recipes.
        </p>
        <h3>What if I can't decide what I want to eat?</h3>
        <p>That's what the random search option is for! If you select "Search", and then "Random", this program will randomly
            decide on a recipe to make so you don't have to!
        </p>
        <h3>What if I want a specific kind of food, but need some suggestions?</h3>
        <p>We have just the thing for you! Under "Search" if you select "Filter", you'll be able to filter your search results
            based on what kind of food you're in the mood for.
        </p>
        <h3>So my foot's totally stuck, right, I'm freaking out, the dog's having a seizure
            and I need to make something quick! Can you help me with that?
        </h3>
        <p>Well that sounds like quite the predicament! We can't get your foot unstuck, but we can certainly help you make food
            quickly! This can also be found in the "Filter" menu. From there, you'll be able to search for recipes based on how
            long they take to make.
        </p>
    </body>
</html>