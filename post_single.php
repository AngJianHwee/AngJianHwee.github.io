<?php include 'header.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">
    <title>Blog post | Initio - Free, multipurpose html5 template by GetTemplate</title>
    <link rel="shortcut icon" href="assets/images/gt_favicon.png">
    <!-- Bootstrap -->
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css" rel="stylesheet">
    <!-- Icon font -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alice|Open+Sans:400,300,700">
    <!-- Custom styles -->
    <link rel="stylesheet" href="assets/css/styles.css">
    <!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->
</head>

<body>
    <main id="main">
        <div class="container">
            <div class="row topspace">
                <div class="col-sm-8 col-sm-offset-2">
                    <article class="post">
<?php include 'Z_jupyter_Working_scraping.php';?>

                    </article><!-- #post-## -->
                </div>
            </div> <!-- /row post  -->
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                    <div id="comments">
                        <h3 class="comments-title">3 Comments</h3>
                        <a href="#comment-form" class="leave-comment">Leave a Comment</a>
                        <ol class="comments-list">
                            <li class="comment">
                                <div>
                                    <img src="assets/images/avatar_man.png" alt="Avatar" class="avatar">
                                    <div class="comment-meta">
                                        <span class="author"><a href="#">John Doe</a></span>
                                        <span class="date"><a href="#">January 22, 2011 at 4:55 pm</a></span>
                                        <span class="reply"><a href="#">Reply</a></span>
                                    </div>
                                    <div class="comment-body">
                                        Morbi velit eros, sagittis in facilisis non.
                                    </div>
                                </div>
                                <ul class="children">
                                    <li class="comment">
                                        <div>
                                            <img src="assets/images/avatar_man.png" alt="Avatar" class="avatar">
                                            <div class="comment-meta">
                                                <span class="author"><a href="#">John Doe</a></span>
                                                <span class="date"><a href="#">January 22, 2011 at 4:55 pm</a></span>
                                                <span class="reply"><a href="#">Reply</a></span>
                                            </div><!-- .comment-meta -->
                                            <div class="comment-body">
                                                Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus.
                                            </div><!-- .comment-body -->
                                        </div>
                                    </li>
                                </ul><!-- .children -->
                            </li>
                            <li class="comment">
                                <div>
                                    <img src="assets/images/avatar_woman.png" alt="Avatar" class="avatar">
                                    <div class="comment-meta">
                                        <span class="author"><a href="#">Jonnes</a></span>
                                        <span class="date"><a href="#">January 22, 2011 at 4:55 pm</a></span>
                                        <span class="reply"><a href="#">Reply</a></span>
                                    </div><!-- .comment-meta -->
                                    <div class="comment-body">
                                        Morbi velit eros, sagittis in facilisis non, rhoncus et erat. Nam posuere tristique sem, eu ultricies tortor imperdiet vitae. Curabitur lacinia neque non metus. </div><!-- .comment-body -->
                                </div>
                            </li>
                        </ol>
                        <div class="clearfix"></div>
                        <nav id="comment-nav-below" class="comment-navigation clearfix" role="navigation">
                            <div class="nav-content">
                                <div class="nav-previous">&larr; Older Comments</div>
                                <div class="nav-next">Newer Comments &rarr;</div>
                            </div>
                        </nav><!-- #comment-nav-below -->
                        <div id="respond">
                            <h3 id="reply-title">Leave a Reply</h3>
                            <form action="" method="post" id="commentform" class="">
                                <div class="form-group">
                                    <label for="inputName">Name</label>
                                    <input type="text" class="form-control" id="inputName" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email address <i class="text-danger">*</i></label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="inputWeb">Website</label>
                                    <input type="nane" class="form-control" id="inputWeb" placeholder="https://">
                                </div>
                                <div class="form-group">
                                    <label for="inputComment">Comment</label>
                                    <textarea class="form-control" rows="6"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="checkbox">
                                            <label> <input type="checkbox"> Subscribe to updates</label>
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <button type="submit" class="btn btn-action">Submit</button>
                                    </div>
                            </form>
                        </div> <!-- /respond -->
                    </div>
                </div>
            </div> <!-- /row comments -->
            <div class="clearfix"></div>
        </div> <!-- /container -->
    </main>
    <!-- JavaScript libs are placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="assets/js/template.js"></script>
</body>

</html>
<?php include 'footer.php';?>