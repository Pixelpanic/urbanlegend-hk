<?php

include("db_c.php");
include("phasedown.php"); //Markdown parser
#Get post id
$id = $_GET["id"];
#If id is not int then will set as 0(Default 404)
if ( is_int($id) == false ){

    $id = 0;

}


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
                            url: 'reply.php',
                            data: $('form').serialize(),
                            success: function () {
                                //alert('貼出了...如果你不是機械人');

                                setTimeout(
                                    function()
                                    {
                                        location.reload();
                                    }, 0001);
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

                            $id = mysqli_real_escape_string($link, $id);


                            #Get post thread
                            if ($id != null) {
                                $sql = <<<SQL
    SELECT * FROM `content`  WHERE id = '$id'
SQL;

                                #Prompt Error Query
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

                                #Get Reply thread
                                $reply_sql = <<<SQL
SELECT * FROM comment WHERE tid = '$id'
SQL;

                                #Prompt Error
                                if (!$result = $link->query($reply_sql)) {
                                die('There was an error running the query [' . $link->error . ']');
                            }

                                while ($crow = $result->fetch_assoc()) {


                                    //We parse markdown here
                                    $cmarkdown = Parsedown::instance()->text($crow['comment']);
                                    echo "<blockquote><p contenteditable=\"true\">". $cmarkdown ."</p><footer contenteditable=\"true\">".$crow['cuser']." / ". $crow['ctime']."</footer></blockquote>";

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
                                            type="text"></textarea>
                                    </div>
                                    <div class="form-group">
                                    <input readonly="readonly" name="tid" type="text" id="disabledInput" class="form-control" placeholder="<?php echo $id; ?>" value="<?php echo $id; ?>">
                                    </div>
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
                                    <a href="https://github.com/Pixelpanic/urbanlegend-hk/"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
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

