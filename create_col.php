<!DOCTYPE HTML>
<!--
    Overflow by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>CollegeStroll | Create College</title>
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
//create_cat.php
include 'connect.php';
include 'header.php';

if($_SESSION['signed_in'] == false)
{
    //the user is not signed in
    echo '
    <article class="container box style3">
    Sorry, you have to be <a href="http://localhost/collegestroll/signin.php">signed in</a> to create a topic.
    </article>';
}
else
{
    //the user is signed in
    if($_SERVER['REQUEST_METHOD'] != 'POST')
    {
        //the form hasn't been posted yet, display it
        //retrieve the categories from the database for use in the dropdown
        $sql = "SELECT * FROM categories";

        $result = mysql_query($sql);

        if(!$result)
        {
            //the query failed, uh-oh :-(
            echo '
            <article class="container box style3">
            Error while selecting from database. Please try again later.
            </article>';
        }
        else
        {
            if(mysql_num_rows($result) == 0)
            {
                //there are no categories, so a topic can't be posted
                if($_SESSION['user_level'] == 1)
                {
                    echo '
                    <article class="container box style3">
                    You have not created categories yet.
                    </article>';
                }
                else
                {
                    echo '
                    <article class="container box style3">
                    Before you can post a topic, you must wait for an admin to create some categories.
                    </article>';
                }
            }
            else
            {

                echo '<article class="container box style3">
                      <header>
                      <h2>Create College</h2>
                      <p>Enter the details to create a college</p>
                      </header>
                      <form method="post" action="">
                      <div class="row 50%">
                      <div class="6u 12u$(mobile)"><input type="text" name="topic_subject" placeholder="College"/></div>
                      <div class="6u 12u$(mobile)"><input type="text" name="topic_location" placeholder="Location"/></div>
                      <div class="6u 12u$(mobile)"><input type="text" name="topic_phone" placeholder="Phone"/></div>
                      <div class="6u 12u$(mobile)"><input type="text" name="topic_website" placeholder="Website"/></div>';



                echo '<div class="12u$"><select name="topic_cat">';
                    while($row = mysql_fetch_assoc($result))
                    {
                        echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option>';
                    }
                echo '</select></div>';

                echo '<div class="12u$"><textarea name="post_content" placeholder="Description"/></textarea></div>
                      <div class="12u$">
                      <ul class="actions">
                      <li><input type="submit" value="Create topic" /></li>
                      </ul>
                      </form>
                      </article>';
            }
        }
    }
    else
    {
        //start the transaction
        $query  = "BEGIN WORK;";
        $result = mysql_query($query);

        if(!$result)
        {
            //Damn! the query failed, quit
            echo '
            <article class="container box style3">
            An error occured while creating your topic. Please try again later.
            </article>';
        }
        else
        {

            //the form has been posted, so save it
            //insert the topic into the topics table first, then we'll save the post into the posts table
            $sql = "INSERT INTO
                        colleges(col_name,
                               col_location,
                               col_phone,
                               col_website,
                               col_cat,
                               col_author)
                    VALUES('" . mysql_real_escape_string($_POST['topic_subject']) ."',
                            '" . mysql_real_escape_string($_POST['topic_location']) ."',
                            '" . mysql_real_escape_string($_POST['topic_phone']) ."',
                            '" . mysql_real_escape_string($_POST['topic_website']) ."',
                            '" . mysql_real_escape_string($_POST['topic_cat']) ."',
                            '" . $_SESSION['user_id'] . "'
                            )";
            $result = mysql_query($sql);
            if(!$result)
            {
                //something went wrong, display the error
                echo '
                <article class="container box style3">
                An error occured while inserting your data. Please try again later.' . mysql_error().'</article>';
                $sql = "ROLLBACK;";
                $result = mysql_query($sql);
            }
            else
            {
                //the first query worked, now start the second, posts query
                //retrieve the id of the freshly created topic for usage in the posts query
                $topicid = mysql_insert_id();

                $sql = "INSERT INTO
                            posts(post_content,
                                  post_date,
                                  post_topic,
                                  post_author)
                        VALUES
                            ('" . mysql_real_escape_string($_POST['post_content']) . "',
                                  NOW(),
                                  " . $topicid . ",
                                  " . $_SESSION['user_id'] . "
                            )";
                $result = mysql_query($sql);

                if(!$result)
                {
                    //something went wrong, display the error
                    echo '
                    <article class="container box style3">
                    An error occured while inserting your post. Please try again later.' . mysql_error().'</article>';
                    $sql = "ROLLBACK;";
                    $result = mysql_query($sql);
                }
                else
                {
                    $sql = "COMMIT;";
                    $result = mysql_query($sql);

                    //after a lot of work, the query succeeded!
                    echo '
                    <article class="container box style3">
                    You have successfully created <a href="topic.php?id='. $topicid . '">your new College</a>.</article>';
                }
            }
        }
    }
}

include 'footer.php';
?>
