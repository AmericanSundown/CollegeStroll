<!DOCTYPE HTML>
<!--
    Overflow by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>CollegeStroll | SignIn</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="http://localhost/collegestroll/assets/css/main.css" />
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.scrolly.min.js"></script>
        <script src="assets/js/jquery.poptrox.min.js"></script>
        <script src="assets/js/skel.min.js"></script>
        <script src="assets/js/util.js"></script>
        <!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
        <script src="assets/js/main.js"></script>

    </head>
    <body>

<?php
//signin.php
include 'connect.php';
session_start();



//first, check if the user is already signed in. If that is the case, there is no need to display this page
if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true)
{
    echo '
    <article class="container box style3">
    You are already signed in, you can <a href="signout.php">sign out</a> if you want.
    </article>';
}
else
{
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        /*the form hasn't been posted yet, display it
          note that the action="" will cause the form to post to the same page it is on */
        echo
            '<article class="container box style3">
            <header>
                <h2>Sign In</h2>
                <p>Enter the details to log in</p>
            </header>

            <form method="post" action="">
                <div class="row 50%">
                    <div class="6u 12u$(mobile)"><input type="text" name="user_name" placeholder="Username"/></div>
                    <div class="6u 12u$(mobile)"><input type="password" name="user_pass" placeholder="Password"/></div>
                    <div class="12u$">
                    <ul class="actions">
                    <li>
                    <input type="submit" value="Sign in" />
                    </li>
                    </ul>
                    </div>
                </div>
            </form>

         </article>';
    }
    else
    {
        /* so, the form has been posted, we'll process the data in three steps:
            1.  Check the data
            2.  Let the user refill the wrong fields (if necessary)
            3.  Varify if the data is correct and return the correct response
        */
        $errors = array(); /* declare the array for later use */

        if(!isset($_POST['user_name']))
        {
            $errors[] = '<article class="container box style3">The username field must not be empty.</article>';
        }

        if(!isset($_POST['user_pass']))
        {
            $errors[] = '<article class="container box style3">The password field must not be empty.</article>';
        }

        if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
        {
            echo '
            <article class="container box style3">
            Uh-oh.. a couple of fields are not filled in correctly..';
            echo '<ul>';
            foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
            {
                echo '<li>' . $value . '</li>'; /* this generates a nice error list */
            }
            echo '</ul>
            </article>';
        }
        else
        {
            //the form has been posted without errors, so save it
            //notice the use of mysql_real_escape_string, keep everything safe!
            //also notice the sha1 function which hashes the password
            $sql = "SELECT
                        user_id,
                        user_name,
                        user_level
                    FROM
                        users
                    WHERE
                        user_name = '" . mysql_real_escape_string($_POST['user_name']) . "'
                    AND
                        user_pass = '" . sha1($_POST['user_pass']) . "'";

            $result = mysql_query($sql);
            if(!$result)
            {
                //something went wrong, display the error
                echo '
                <article class="container box style3">
                Something went wrong while signing in. Please try again later.
                </article>';
                //echo mysql_error(); //debugging purposes, uncomment when needed
            }
            else
            {
                //the query was successfully executed, there are 2 possibilities
                //1. the query returned data, the user can be signed in
                //2. the query returned an empty result set, the credentials were wrong
                if(mysql_num_rows($result) == 0)
                {
                    echo '
                    <article class="container box style3">
                    You have supplied a wrong user/password combination. Please try again.
                    </article>';
                }
                else
                {
                    //set the $_SESSION['signed_in'] variable to TRUE
                    $_SESSION['signed_in'] = true;

                    //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages
                    while($row = mysql_fetch_assoc($result))
                    {
                        $_SESSION['user_id']    = $row['user_id'];
                        $_SESSION['user_name']  = $row['user_name'];
                        $_SESSION['user_level'] = $row['user_level'];
                    }

                    echo '
                    <article class="container box style3">
                    Welcome, ' . $_SESSION['user_name'] . '. <a href="index.php">Proceed to the forum overview</a>.
                    </article>';
                }
            }
        }
    }
}

include 'footer.php';
?>
