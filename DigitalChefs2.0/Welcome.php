<!DOCTYPE html>
<?php session_start(); ?>
<html>
    <head>
        <link rel="stylesheet" href="MainStyleSheet.css"/>
        <div class="body">
            <?php
                require_once('initialization.php');
                readfile('Navigation.html');
            ?>
        </div>
    </head>

    <body>
        <?php
           
            //when the user presses the sign in button it executes this code
            if(isset($_POST['SignIn']))
            {
                //added these two echo statements to reset the prompts everytime a new form is sent;
                echo '<style type="text/css">#IncorrectUsername{display: none;}</style>';
                echo '<style type="text/css">#IncorrectPassword{display: none;}</style>';

                //this query checks the overall username and password to see if it exists
                $Check_User_Query = "SELECT Username, Password FROM users WHERE Password = '{$_POST['Password']}' AND Username = '{$_POST['User']}' LIMIT 1";
                $Check_User_Response = mysqli_query($dbc, $Check_User_Query);
                
                //if the user can't be found it it then tries to find what went wrong
                if(mysqli_num_rows($Check_User_Response) == 0)
                {
                    //first it checks the username
                    $Check_Username_Query = "SELECT Username FROM users WHERE Username = '{$_POST['User']}' LIMIT 1";
                    $Check_Username_Response = mysqli_query($dbc, $Check_Username_Query);
                    
                    //this is the check to see if there are any users with that name
                    if(mysqli_num_rows($Check_Username_Response) == 0)
                    {
                        //if the username isn't even found it unhides the incorrect username prompt
                        echo '<style type="text/css">#IncorrectUsername{display: block;}</style>';
                    }
                    else
                    { 
                        //if the user is found that means the only other issue would be an incorrect Password so unhides the incorrect password prompt
                        echo '<style type="text/css">#IncorrectPassword{display: block;}</style>';
                    }
                }
                else
                {
                    //saves the user as the current user and sends them to a profile page
                    $_SESSION['user'] = $_POST['User'];
                    header('Location:Profile.php');
                    exit;
                }
            }
            if(isset($_POST['SignUp']))
            {
                
            }
            while(!empty($_POST['NewUser']))
            {
                
            }
        ?>
        <div class="center main">
            <div id = "signin">
                <strong> Sign In </strong>
                <p>
                    <form action="Welcome.php" method="post">
                        <label for="User"><b>Username</b></label><br/>
                        <input type="text" name="User">
                        <section id="IncorrectUsername">Username Not Found</section>
                        <br/>
                        <label for="Password"><b>Password</b></label> <br/>
                        <input type="password" name="Password">
                        <section id="IncorrectPassword">Incorrect Password</section>
                        <br />
                        <input type="submit" name="SignIn" value="Sign In">
                    </form>
                </p>
            </div>

            <div id="signup">
                <Strong>Sign up </Strong>
                <p>
                    <form action="Welcome.php" method="post">
                        <label for="NewUser"><b>Username</b></label>
                        <br />
                        <input type="text" name="NewUser">
                        <br />
                        <label for="Email"><b>Email</b></label>
                        <br />
                        <input type="email" name="Email">
                        <br />
                        <label for="NewPassword"><b>Password</b></label>
                        <br />
                        <input type="password" name="NewPassword">
                        <br />
                        <label for="ConfirmPassword"> <b>Confirm Password</b></label>
                        <br />
                        <input type="password" name="ConfirmPassword">
                        <br />
                        <input type="submit" name ="SignUp" value ="Sign Up">
                    </form>
                </p>
            </div>
            <script src="sign.js"></script>
        </div>
    </body>
</html>