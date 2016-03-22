<html><head>
            <meta name="description" content="【怪人】每區都有怪人，你果區又有咩怪人呢？">
            <title>香港奇人&amp;都市傳說資料庫 Beta</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
            <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
            <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
            <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
            <script>
                $(function () {

                    $('form').on('submit', function (e) {

                        e.preventDefault();

                        $.ajax({
                            type: 'post',
                            url: 'submit.php',
                            data: $('form').serialize(),
                            success: function () {
                                alert('成功！');
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
                            <li class="active">
                                <a href="#">我有料畀</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            
            
            <div class="section">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center">有料爆？多謝晒！</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <form role="form" >
                                <div class="form-group" >
                                    <label class="control-label" for="exampleInputEmail1">你個名</label>
                                    <input class="form-control" name="user" placeholder="十八座大王？" type="text">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="exampleInputEmail1">大標題</label>
                                    <input class="form-control" name="title" placeholder="[突發]乜乜乜乜乜.." type="text" />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="exampleInputEmail1">有咩事</label>
                                    <textarea rows="5" class="form-control" name="content" placeholder="是咁的..." type="text" ></textarea>
                                </div>
                                <div class="form-group"><label class="control-label"
                                                               for="exampleInputEmail1">係邊度</label><select
                                        class="form-control" name="location">
                                        <option value="HK">香港</option>
                                        <option value="KL">九龍</option>
                                        <option value="NT">新界</option>
                                        <option value="OI">離島</option>
                                        </select>
                                </div>
                                <button type="submit" class="btn btn-default">提交</button>
                            </form>
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

    </body></html>