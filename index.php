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
                                        <li class="list-group-item">#香港</li>
                                        <li class="list-group-item">#九龍</li>
                                        <li class="list-group-item">#新界</li>
                                        <li class="list-group-item">#離島</li>
                                        <li class="list-group-item">#全部</li>
                                </ul>
                        </div>
                        <div class="col-md-8">
                                <ul class="media-list">
                                        <?php


                                        #spilt pages
                                        $requested_page = isset($_GET['page']) ? intval($_GET['page']) : 1;// Assume the page is 1

                                        $r = mysqli_query($link,"SELECT COUNT(*) FROM content");
                                        $d = mysqli_fetch_row($r);
                                        $thread_count = $d[0];

                                        $thread_per_page = 15;

                                        // 55 products => $page_count = 3
                                        $page_count = ceil($thread_count / $thread_per_page);

                                        // You can check if $requested_page is > to $page_count OR < 1,
                                        // and redirect to the page one.

                                        $first_thread_shown = ($requested_page - 1) * $thread_per_page;




                                        #SQL statement get 15 items per query
                                        $sql = <<<SQL
    SELECT *
    FROM `content`  ORDER BY time DESC LIMIT $first_thread_shown, $thread_per_page
SQL;


                                        #Prompt Error Query
                                        if(!$result = $link->query($sql)){
                                                die('There was an error running the query [' . $link->error . ']');
                                        }

                                        #Loop post entries & shut all mysql link
                                        while($row = $result->fetch_assoc()) {
                                            echo "<li class=\"media\">
    <a class=\"pull-left\" href=\"read.php?id=" . $row['id'] . "\"><img class=\"media-object\" src=\"http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png\" height=\"64\" width=\"64\"></a>
    <div class=\"media-body\">
        <h4 class=\"media-heading\"><a href=\"read.php?id=" . $row['id'] . "\" >" . $row['title'] . "</a></h4>
        <p>" . substr($row['content'], 0, 36) . "...</p><p class=\"text-right\" >由" . $row['user'] . "提供</p></div></li>";
                                        }
                                        mysqli_close($link);

                                        ?>

                                        <li class="media"></li>
                                </ul>
                        </div>
                    <?php




                    #Count total pages


                    $total_pages = ceil($row / 15);

                    #Generate list of links
                    echo '<p> Page:';
                    for($i=1; $i<=$page_count; $i++) {
                        if($i == $requested_page) {
                            echo $i;
                        } else {
                            echo '<a href="?page='.$i.'">'.$i.'</a> ';
                        }
                    }
                    echo '</p>';

                    ?>
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
                                        <a href="newpost.php" class="btn btn-primary">按我畀料</a>
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
                                                <a href="https://github.com/Pixelpanic/urbanlegend-hk"><i class="fa fa-3x fa-fw fa-github text-inverse"></i></a>
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
</body>

</html>