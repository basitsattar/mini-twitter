<?php

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db('exercise', $link);
if (!$db_selected) {
    die ('Can\'t use foo : ' . mysql_error());
}



$email = $_POST['email'];
$tweet = $_POST['tweet'];

echo $email."".$tweet;
$sql    = 'INSERT INTO tweets (email,tweets)
VALUES ("'.$email.'","'.$tweet.'");';
$result = mysql_query($sql, $link);
if (!$result) {
    echo "DB Error, could not query the database\n";
    echo 'MySQL Error: ' . mysql_error();
    exit;
}
header("Location: index.php");
die();
?>