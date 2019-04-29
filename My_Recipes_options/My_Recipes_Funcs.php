<!DOCTYPE html>
<HTML>
    <?php
    session.start();
        function btnNext()
        {
            if($_SESSION["Current_Recipe"]+1 != NULL)
            {
                $_SESSION["current_Recipe"] -= 1;
            }
        }
        function btnprev()
        {
            if($_SESSION["Current_Recipe"] == NULL)
            {
                $_SESSION["current_Recipe"] += 1;
            }
        }
    ?>
</HTML>