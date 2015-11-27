<?php

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db('exercise', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}

$sql    = 'Select * from tweets';
$result = mysql_query($sql, $link);
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Mini Twitter
        </title>    
        <link href="style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <section class="main <?php echo !isset($result)?'center':''?>">
            <h1 class="center_heading">Add a new Tweet</h1>
             <form action="submit.php" method="post">
                <input type="email" name="email" class="email" placeholder="Enter Email" required/>
                <textarea name="tweet" class="tweet" placeholder="Enter Tweet" required></textarea>
                <input type="submit">
            </form>
        </section>
         <?php while ($row = mysql_fetch_assoc($result)) {?>
                <div class="result">
                    <div class="email" ><?php echo $row['email']; ?></div>   
                    <div class="tweet" ><?php echo $row['tweets']; ?></div> 
                </div>
         <?php   } ?>
    </body>
</html>