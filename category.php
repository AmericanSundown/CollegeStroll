<?php include 'header.php'; ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>CollegeStroll | Home</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script src="js/index.js"></script>

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
  <link rel="stylesheet" href="css/style.css">

</head>
<body>
  <section>
<?php
//EDIT THISSSS!!!!!!!!!!!!!
//create_cat.php
include 'connect.php';


//first select the category based on $_GET['cat_id']
$sql = "SELECT
            cat_id,
            cat_name,
            cat_description
        FROM
            categories
        WHERE
            cat_id = " . mysql_real_escape_string($_GET['id']);

$result = mysql_query($sql);

if(!$result)
{
    echo '<article class="container box style3">The category could not be displayed, please try again later.' . mysql_error().'</article>';
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo '<article class="container box style3">This category does not exist.</article>';
    }
    else
    {
        //display category data
        while($row = mysql_fetch_assoc($result))
        {
            echo '<h1>Topics in &#34;' . $row['cat_name'] . '&#34; category</h1>';
        }

        //do a query for the topics
        $sql = "SELECT
                    col_id,
                    col_name,
                    col_location,
                    col_phone,
                    col_website,
                    col_cat
                FROM
                    colleges
                WHERE
                    col_cat = " . mysql_real_escape_string($_GET['id']);

        $result = mysql_query($sql);

        if(!$result)
        {
            echo 'The topics could not be displayed, please try again later.';
        }
        else
        {
            if(mysql_num_rows($result) == 0)
            {
                echo 'There are no topics in this category yet.';
            }
            else
            {
                //prepare the table
                echo '<div class="tbl-header">
                      <table cellpadding="0" cellspacing="0" border="0">
                      <thread>
                      <tr>
                        <th><h1>Topic</h1></th>
                        <th><h1>Address</h1></th>
                      </tr>
                      </thread>
                      </table>
                      </div>';

                while($row = mysql_fetch_assoc($result))
                {
                    echo '<div class="tbl-content">';
                    echo '<table cellpadding="0" cellspacing="0" border="0">
                    <tbody>';
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h1><a href="topic.php?id=' . $row['col_id'] . '">' . $row['col_name'] . '</a><h1>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo "<h1>";
                            echo($row['col_location']);
                            echo "</h1>";
                        echo '</td>';
                    echo '</tr></tbody></table></div>';
                }
            }
        }
    }
}

?>
