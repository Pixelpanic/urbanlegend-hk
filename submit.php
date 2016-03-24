<?php
/**
 * Created by PhpStorm.
 * User: pixoria
 * Date: 22/3/2016
 * Time: 11:07 PM
 */
include("db_c.php");
require_once "captcha.php";

// Server Key
$secret = "6LeEghsTAAAAAPwOPcmuoVg61qwahnYf5IVZXHvt";

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);


// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}

if ($response != null && $response->success) {

    $title = htmlspecialchars($_POST["title"]);
    $user = htmlspecialchars($_POST["user"]);
    $content = htmlspecialchars($_POST["content"]);
    $location = htmlspecialchars($_POST["location"]);
    $ip = $_SERVER['REMOTE_ADDR'];

    mysqli_query($link, "SELECT * FROM content");
    mysqli_query($link, "INSERT INTO content (title,content,location,ip,user,time) VALUES ('$title', '$content', '$location','$ip' ,'$user', NOW() )");
    mysqli_close($link);

} else {
    return null;
}

?>