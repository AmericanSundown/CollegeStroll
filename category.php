<?php
//EDIT THISSSS!!!!!!!!!!!!!
//create_cat.php
include 'connect.php';
include 'header.php';

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
            echo '<article class="container box style3"><h2>Topics in ′' . $row['cat_name'] . '′ category</h2>';
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
                echo '<table border="1">
                      <tr>
                        <th>Topic</th>
                        <th>Address</th>
                      </tr>';

                while($row = mysql_fetch_assoc($result))
                {
                    echo '<tr>';
                        echo '<td class="leftpart">';
                            echo '<h3><a href="topic.php?id=' . $row['col_id'] . '">' . $row['col_name'] . '</a><h3>';
                        echo '</td>';
                        echo '<td class="rightpart">';
                            echo($row['col_location']);
                        echo '</td>';
                    echo '</tr>';
                }
            }
        }
    }
}

include 'footer.php';
?>
