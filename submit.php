<?php
/**
 * Created by PhpStorm.
 * User: pixoria
 * Date: 22/3/2016
 * Time: 11:07 PM
 */
include("db_c.php");




$title = htmlspecialchars($_POST["title"]);
$user = htmlspecialchars($_POST["user"]);
$content = htmlspecialchars($_POST["content"]);
$location = htmlspecialchars($_POST["location"]);
$ip = $_SERVER['REMOTE_ADDR'];

mysqli_query($link,"SELECT * FROM content");
mysqli_query($link,"INSERT INTO content (title,content,location,ip,user,time) VALUES ('$title', '$content', '$location','$ip' ,'$user', NOW() )");
mysqli_close($link);

?>