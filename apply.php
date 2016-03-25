<html><head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
        <script src='https://www.google.com/recaptcha/api.js?=hl=zh-HK'></script>

</head><body>

<div class="navbar navbar-default navbar-static-top">
        <div class="container">
                <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                                data-target="#navbar-ex-collapse"><span class="sr-only">Toggle navigation</span><span
                                class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#"><span>癲佬台抽獎</span></a></div>
                <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                        <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="#">Home</a></li>
                        </ul>
                </div>
        </div>
</div>
<div class="section">
        <div class="container">
                <div class="row">
                        <div class="col-md-12"><h1 class="text-center">入你個名</h1></div>
                </div>
                <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                                <form role="form" action="apply.php" method="post">
                                        <div class="form-group">
                                                <div class="input-group"><input type="text" name="username" class="form-control"
                                                                                placeholder="Telegram @username"> <span
                                                        class="input-group-btn">  <button type="submit" class="btn btn-default">提交</button> </span></div>
                                                <div class="g-recaptcha" data-sitekey="6LeEghsTAAAAAMTu4uNGdaLX1ipxMOUZCKQpk8U2"></div>
                                        </div>
                                </form>
                        </div>
                </div>

                <?php
                /**
                 * Created by PhpStorm.
                 * User: pixoria
                 * Date: 22/3/2016
                 * Time: 11:07 PM
                 */

                require_once "captcha.php";



                // Server Key
                $secret = "6LeEghsTAAAAAPwOPcmuoVg61qwahnYf5IVZXHvt";

                // empty response
                $response = null;

                // check secret key
                $reCaptcha = new ReCaptcha($secret);

                $servername = "localhost";
                $user = "root";
                $password = "y043128a";
                $dbname = "urban";

                //Prompt Error Connection


                if (isset($_POST["username"])) {

                        // if submitted check response
                        if ($_POST["g-recaptcha-response"]) {
                                $response = $reCaptcha->verifyResponse(
                                    $_SERVER["REMOTE_ADDR"],
                                    $_POST["g-recaptcha-response"]
                                );
                        }

                        if ($response != null && $response->success) {

                                $username = htmlspecialchars($_POST["username"]);
                                $ip = $_SERVER['REMOTE_ADDR'];

// Create connection
                                $conn = new mysqli($servername, $user, $password, $dbname);
// Check connection
                                if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                }

                                $sql = "INSERT INTO luckdraw (username,ip)
VALUES ('$username','$ip')";

                                if ($conn->query($sql) === TRUE) {
                                        echo "Done" . $username . "  ";
                                } else {
                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                }

                                $conn->close();




                        } else {
                                return null;
                        }


                } else {
                echo null;
                }

                ?>


        </div>
</div>
</body>
</html>