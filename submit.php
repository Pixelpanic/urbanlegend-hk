<?php
/**
 * Created by PhpStorm.
 * User: pixoria
 * Date: 22/3/2016
 * Time: 11:07 PM
 */
include("db_c.php"); // Connection details
require_once "captcha.php"; //Verify with Google reCaptcha


// Server Key
$secret = "YOUR KEY HERE";

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

    //Escape all HTML to avoid JS/PHP injection
    $title = htmlspecialchars($_POST["title"]);
    $user = htmlspecialchars($_POST["user"]);
    $content = htmlspecialchars($_POST["content"]);
    $location = htmlspecialchars($_POST["location"]);
    $ip = $_SERVER['REMOTE_ADDR'];

    $escape = mysqli_real_escape_string($link, $content);


    $query_post = "INSERT INTO content (title, content, location, ip, user, time) VALUES ('$title','$escape','$location', '$ip', '$user', NOW())" ;


    //mysqli_query($link, "SELECT * FROM content");
    if (mysqli_query($link, $query_post)){

        echo null;

    } else {

        echo mysqli_error($link) ;

    }


    mysqli_close($link);


} else {
    return null;
}

?>
