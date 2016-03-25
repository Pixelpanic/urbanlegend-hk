<?php

include("db_c.php");
include("phasedown.php"); //Markdown parser
$id = $_GET["id"];
$tid = $id;
?>
<html><head>
            <meta name="description" content="【怪人】每區都有怪人，你果區又有咩怪人呢？">
            <title>香港奇人&amp;都市傳說資料庫 Beta</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
            <script src='https://www.google.com/recaptcha/api.js?=hl=zh-HK'></script>
            <script>
                $(function () {

                    $('form').on('submit', function (e) {

                        e.preventDefault();

                        $.ajax({
                            type: 'post',
                            url: 'read.php',
                            data: $('form').serialize(),
                            success: function () {
                                alert('貼出了...如果你不是機械人');
                            },
                            error: function(){
                                alert('發貼失敗');
                            }
                        });

                    });

                });
            </script>

        </head><body>
            <div class="navbar navbar-default navbar-static-top">
                <div class="container">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-ex-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">香港奇人&amp;都市傳說資料庫 Beta</a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-ex-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="/">主頁</a>
                            </li>
                            <li>
                                <a href="newpost.php">我有料畀</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">


                            <?php

                            //Now we phase markdown

                            $id = $_GET["id"];
                            $tid = $id;

                            if ($id != null) {
                                $sql = <<<SQL
    SELECT * FROM `content`  WHERE id = '$id'
SQL;

                                //Prompt Error Query
                                if (!$result = $link->query($sql)) {
                                    die('There was an error running the query [' . $link->error . ']');
                                }

                                while ($row = $result->fetch_assoc()) {

                                    $imageid = $row['imageid'];

                                    if ($imageid != null) {
                                        echo "<img src=\"/images/" . $imageid . " \"class=\"img-responsive\">";
                                    }
                                    //We parse markdown here
                                    $markdown = Parsedown::instance()->text($row['content']);
                                    echo "<h1>" . $row['title'] . "</h1><p>" . $markdown . "</p><p class=\"text-right\" contenteditable=\"true\">by : " . $row['user'] . "/" . $row['time'] . "</p>";

                                }


                                echo "</div></div><div class=\"row\"><div class=\"col-md-12\"><h1>回覆</h1>";

                                $reply_sql = <<<SQL
SELECT * FROM comment WHERE tid = '$id'
SQL;

                                if (!$result = $link->query($reply_sql)) {
                                die('There was an error running the query [' . $link->error . ']');
                            }

                                while ($crow = $result->fetch_assoc()) {



                                    //We parse markdown here
                                    $markdown = Parsedown::instance()->text($row['content']);
                                    echo "<blockquote><p contenteditable=\"true\">". $crow['comment']."</p><footer contenteditable=\"true\">".$crow['cuser']." / ". $crow['ctime']."</footer></blockquote>";

                                }



                                mysqli_close($link);

                            } else {


                                echo "";
                            }
                            ?>



                        </div>
                    </div>
                </div>
            </div>
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well">
                                <h2>回覆文章</h2>
                                <form role="form">
                                    <div class="form-group"><label class="control-label"
                                                                   for="exampleInputEmail1">你個名</label><input
                                            class="form-control" id="exampleInputEmail1" name="cuser" placeholder="名..."
                                            type="text"></div>
                                    <div class="form-group"><label class="control-label"
                                                                   for="exampleInputPassword1">內文</label><textarea
                                            class="form-control" name="comment" rows="8" placeholder="是咁的..."
                                            type="text"></textarea></div>
                                    <div class="g-recaptcha" data-sitekey="6LeEghsTAAAAAMTu4uNGdaLX1ipxMOUZCKQpk8U2"></div>
                                    <button type="submit" class="btn btn-default">貼出</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="section section-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1>頭盔聲明</h1>
                            <p>本網站是以即時上載留言的方式運作，本網站對所有留言的真實性、完整性及立場等，不負任何法律責任。而一切留言之言論只代表留言者個人意 見，並非本網站之立場，讀者及用戶不應信賴內容，並應自行判斷內容之真實性。_</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-info text-right">
                                <br>
                                <br>
                            </p>
                            <div class="row">
                                <div class="col-md-12 hidden-lg hidden-md hidden-sm text-left">
                                    <a href="#"><i class="fa fa-3x fa-fw fa-instagram text-inverse"></i></a>
                                    <a href="#"><i class="fa fa-3x fa-fw fa-twitter text-inverse"></i></a>
                                    <a href="#"><i class="fa fa-3x fa-fw fa-facebook text-inverse"></i></a>
                                    <a href="#"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 hidden-xs text-right">
                                    <a href="https://github.com/Pixelpanic/urbanlegend-hk/"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        
    
    </body></html>

<?php
/**
 * Created by PhpStorm.
 * User: pixoria
 * Date: 22/3/2016
 * Time: 11:07 PM
 */
require_once "captcha.php"; //Verify with Google reCaptcha


// Server Key
$secret = "6LeEghsTAAAAAPwOPcmuoVg61qwahnYf5IVZXHvt";

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);

if (isset($_POST["cuser"])) {

    // if submitted check response
    if ($_POST["g-recaptcha-response"]) {
        $response = $reCaptcha->verifyResponse(
            $_SERVER["REMOTE_ADDR"],
            $_POST["g-recaptcha-response"]
        );
    }

    if ($response != null && $response->success) {

        //Escape all HTML to avoid JS/PHP injection
        $cuser = htmlspecialchars($_POST["cuser"]);
        $comment = htmlspecialchars($_POST["comment"]);
        $location = htmlspecialchars($_POST["location"]);
        $ip = $_SERVER['REMOTE_ADDR'];

        $escape = mysqli_real_escape_string($link, $content);


        $query_post = "INSERT INTO comment (tid, cuser, comment, cip, ctime) VALUES ('$tid','$cuser','$comment', '$ip', NOW())";


        //mysqli_query($link, "SELECT * FROM content");
        if (mysqli_query($link, $query_post)) {

            echo null;

        } else {

            echo mysqli_error($link);

        }


        mysqli_close($link);


    } else {
        return null;
    }
} else {
    return null;
}

?>