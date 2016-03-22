<?php include("db_c.php"); ?>
<html>

<head>
        <meta name="description" content="【怪人】每區都有怪人，你果區又有咩怪人呢？">
        <title>香港奇人&amp;都市傳說資料庫 Beta</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css"
              rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css"
              rel="stylesheet" type="text/css">
</head>

<body>
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
                                <li class="active">
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
                        <div class="col-md-4">
                                <ul class="list-group">
                                        <li class="list-group-item">#奇人</li>
                                        <li class="list-group-item">#奇事</li>
                                        <li class="list-group-item">#都市傳說</li>
                                        <li class="list-group-item">#區議員柒事</li>
                                        <li class="list-group-item">#其他</li>
                                </ul>
                        </div>
                        <div class="col-md-8">
                                <ul class="media-list">
                                        <?php

                                        $sql = <<<SQL
    SELECT *
    FROM `content`
SQL;

                                        //Prompt Error Query
                                        if(!$result = $link->query($sql)){
                                                die('There was an error running the query [' . $link->error . ']');
                                        }

                                        while($row = $result->fetch_assoc()) {
                                                echo "<li class=\"media\">
    <a class=\"pull-left\" href=\"#\"><img class=\"media-object\" src=\"http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png\" height=\"64\" width=\"64\"></a>
    <div class=\"media-body\">
        <h4 class=\"media-heading\">" . $row['title'] . "</h4>
        <p>" . $row['content'] . "</p></div></li>";
                                        }


                                        ?>

                                        <li class="media"></li>
                                </ul>
                        </div>
                </div>
        </div>
</div>
<div class="section">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <div class="well">
                                        <h2>有料要爆？</h2>
                                        <p>即刻入黎畀料啦！</p>
                                        <a class="btn btn-primary">按我畀料</a>
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
                                                <a href="https://"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
</footer>
</body>

</html>