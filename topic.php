</<?php include 'header.php'; ?>
<!DOCTYPE HTML>
<!--
	Overflow by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Overflow by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>


<?php
//EDIT THISSSS!!!!!!!!!!!!!
//create_cat.php
include 'connect.php';


//first select the category based on $_GET['cat_id']
$sql = "SELECT
            col_id,
            col_name,
            col_location,
			col_phone,
			col_website
        FROM
            colleges
        WHERE
            col_id = " . mysql_real_escape_string($_GET['id']);

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
            echo '<article class="container box style3"><h2>Welcome to &#34;' . $row['col_name'] . '&#34; discussion forum</h2><hr>';




			echo '<table border="1">
                      <tr>
                        <th>College Name</th>
                        <th>Address</th>
						<th>Phone</th>
						<th>Website</th>
                      </tr>';
			echo '<tr>';
                        echo '<td>';
                            echo '<h3>' . $row['col_name'] .'<h3>';
                        echo '</td>';
                        echo '<td>';
                            echo($row['col_location']);
                        echo '</td>';
						echo '<td>';
							echo ($row['col_phone']);
						echo '</td>';
						echo '<td>';
							echo ($row['col_website']);
						echo '</td>';

                    echo '</tr>';
        }

        //do a query for the topics
        $sql = "SELECT
					posts.post_topic,
					posts.post_content,
					posts.post_date,
					posts.post_author,
					users.user_id,
					users.user_name
				FROM
					posts
				LEFT JOIN
					users
				ON
					posts.post_author = users.user_id
				WHERE
					posts.post_topic = " . mysql_real_escape_string($_GET['id']);

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
				//This is comment feed
				echo '<table border="1">
                      <tr>
                        <th>Username</th>
                        <th>College</th>
						<th>Date</th>
                      </tr>';

                while($row = mysql_fetch_assoc($result))
                {
                    echo '<tr>';
                        echo '<td>';
                            echo '' . $row['user_name'] . '';
                        echo '</td>';
                        echo '<td>';
                            echo($row['post_content']);
                        echo '</td>';
						echo '<td>';
                            echo($row['post_date']);
                        echo '</td>';
                    echo '</tr>';
				}


				//Replying section
				echo '<div class="row 50%">
					<form method="post" action="reply.php?id=' . htmlentities($_GET['id']) . '">
					<div class="12u$">
            <textarea name="reply-content" placeholder="Discuss"></textarea>
          <ul class="actions">

					       <li><input type="submit" value="Submit reply" /></li>
          </ul><div>
					</form>
          ';
                }
            }
        }
    }


include 'footer.php';
?>
