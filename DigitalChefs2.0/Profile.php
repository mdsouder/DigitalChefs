<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>

    </head>
    <body>
        Hello <?php echo $_SESSION['user']; ?>
    </body>
</html>