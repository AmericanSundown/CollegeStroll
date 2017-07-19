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
//create_cat.php
include 'connect.php';


$sql = "SELECT *  FROM categories";

$result = mysql_query($sql);

if(!$result)
{
    echo 'The categories could not be displayed, please try again later.';
}
else
{
    if(mysql_num_rows($result) == 0)
    {
        echo 'No categories defined yet.';
    }
    else
    {
        //prepare the table
        echo '<h1>Courses</h1>';
        echo '<div class="tbl-header">
              <table cellpadding="0" cellspacing="0" border="0">
              <thread>
              <tr>
                <th><h1>Category</h1></th>
                <th><h1>Description</h1></th>

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
                echo '<td>';
                    echo '<h1><a href="category.php?id=' . $row['cat_id'] . '">' . $row['cat_name'] . '</a></h1>';
                echo '</td>';
                echo '<td><h1>' . $row["cat_description"] . '</h1></td>';


            echo '</tr>
                  </tbody>
                  </table>
                  </div>';
        }
    }
}


?>
