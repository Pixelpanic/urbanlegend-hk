<html><head>
        <title>GitHub Flavored Markdown Parser Sandbox</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://pingendo.github.io/pingendo-bootstrap/themes/default/bootstrap.css" rel="stylesheet" type="text/css">
    </head><body>

<div class="section">
        <div class="container">
                <div class="row">
                        <div class="col-md-12">
                                <h1>Parse your Markdown syntax here!</h1>
                                <form  role="form" method="post" action="testrun.php">
                                        <div class="form-group"><label class="control-label"
                                                                      > Test Content </label><textarea
                                                    class="form-control" name="test" rows="20"
                                                    ></textarea></div>
                                        <button type="submit" class="btn btn-default">Submit</button>
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
                include("phasedown.php"); //Markdown parser

                if (isset($_POST["test"])) {


                         $content = htmlspecialchars($_POST["test"]);
                        //Now we phase markdown
                        $markdown = Parsedown::instance()
                            ->setBreaksEnabled(true) # enables automatic line breaks
                            ->text($content);



                        //$markdown = Parsedown::instance()->text($content);

                        echo $markdown;

                } else {
                        echo null;
                }

                ?>
        </div>
</div>
</body>
</html>
