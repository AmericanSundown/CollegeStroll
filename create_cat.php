<!DOCTYPE HTML>
<!--
    Overflow by HTML5 UP
    html5up.net | @ajlkn
    Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
    <head>
        <title>CollegeStroll | Create Categories</title>
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

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo '
        <article class="container box style3">
          <header>
            <h2>Create Category</h2>
            <p>Enter the details to create a category</p>
          </header>
          <form method="post" action="">
            <div class="row 50%">
            <div class="12u$"><input type="text" name="cat_name" placeholder="Category Name"/></div>
            <div class="12u$"><textarea name="cat_description" placeholder="Description"/></textarea></div>

            <div class="12u$">
              <ul class="actions">
                <li><input type="submit" value="Add category" /></li>
              </ul>
            </div>
            </div>
          </form>
        </article>';
}
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO categories(cat_name, cat_description)
       VALUES('" . mysql_real_escape_string($_POST['cat_name']) ."',
             '" . mysql_real_escape_string($_POST['cat_description']) . "')";
    $result = mysql_query($sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo '
        <article class="container box style3">Error' . mysql_error().'</article>';
    }
    else
    {
        echo '
        <article class="container box style3">
          New category successfully added.
        </article>';
    }
}
?>
