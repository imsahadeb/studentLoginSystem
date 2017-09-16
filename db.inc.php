<?php
$host = 'localhost';

$user = 'root';
$pass = '';
$db='student';

$link = mysqli_connect($host, $user, $pass);
$db_select = mysqli_select_db($link, $db);
if(!$db_select){
    echo 'Database Connection faild!';
}
?>
