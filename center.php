<?php
require_once("conn.php");
$rs = $conn->query("select * from item where item_name = '中心简介'");
$rs2 = $conn->query("select * from item where item_name = '中心简介'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PATROS - HTML5 FREE TEMPLATE</title>

    <!-- Bootstrap Core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/patros.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-spy="scroll">
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="images/logo.png" alt="company logo"/></a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right custom-menu">
                <li><a href="index.php">首页</a></li>
                <li><a href="index.php#about">中心简介</a></li>
                <li><a href="index.php#services">Services</a></li>
                <li><a href="index.php#meet-team">Team</a></li>
                <li><a href="index.php#portfolio1">Portofolio</a></li>
                <li><a href="index.php#contact">Contact</a></li>
                <li class="active"><a href="blog.html">Blog</a></li>
                <li><a href="single-post.html">Single</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->

<section class="container blog">
    <div class="row">
        <!-- Blog Column -->
        <div class="col-md-8">
            <h1 class="page-header sidebar-title">
                中心简介
            </h1>
            <!-- First Blog Post -->
            <?php
            while ($row = mysqli_fetch_assoc($rs)){
                $var2 = $row['item_title'];
            ?>
            <div class="row blogu">
                <div class="col-sm-4 col-md-4 ">
                    <div class="blog-thumb">
                        <a href="<?php echo "center_1.php?title=".$var2 ?>">
                            <img class="img-responsive" src="<?php echo $row['item_file']?>" alt="photo">
                        </a>
                    </div>
                </div>
                <div class="col-sm-8 col-md-8">
                    <h2 class="blog-title">
                        <a href="<?php echo "center_1.php?title=".$var2 ?>"><?php echo $row['item_title']?></a>
                    </h2>
                    <p><?php echo $row['item_brief']?></p>
                </div>
            </div>
            <hr>
                <?php
                }
                ?>
        </div>

        <!-- Blog Sidebar Column -->
        <aside class="col-md-4 sidebar-padding">
            <div class="blog-sidebar">
                <div class="input-group searchbar">
                    <input type="text" class="form-control searchbar" placeholder="Search for...">
                    <span class="input-group-btn">
		                        <button class="btn btn-default" type="button">Search</button>
		                        </span>
                </div><!-- /input-group -->
            </div>
            <!-- Blog Categories -->
            <div class="blog-sidebar">
                <h4 class="sidebar-title"><i class="fa fa-list-ul"></i> Categories</h4>
                <hr>
                <ul class="sidebar-list">
                    <li><a href="center.php">目录</a></li>
                    <?php
                    while ($row2 = mysqli_fetch_assoc($rs2)){
                        $var = $row2['item_title'];
                    ?>
                    <li><a href="<?php echo "center_1.php?title=".$var ?>"><?php echo $row2['item_title']?></a></li>
                        <?php
                        }
                        ?>
                </ul>
            </div>
            <!-- Recent Posts -->
            <div class="blog-sidebar">
                <h4 class="sidebar-title"><i class="fa fa-align-left"></i> Recent Posts</h4>
                <hr style="margin-bottom: 5px;">

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive media-object" src="images/blog1.jpg" alt="Media Object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Post title 1</a></h4>
                        This is some sample text. This is some sample text. This is some sample text.
                    </div>
                </div>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive media-object" src="images/blog2.jpg" alt="Media Object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Post title 2</a></h4>
                        This is some sample text. This is some sample text. This is some sample text.
                    </div>
                </div>

                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive media-object" src="images/blog3.jpg" alt="Media Object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Post title 3</a></h4>
                        This is some sample text. This is some sample text. This is some sample text.
                    </div>
                </div>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="img-responsive media-object" src="images/blog1.jpg" alt="Media Object">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><a href="#">Post title 4</a></h4>
                        This is some sample text. This is some sample text. This is some sample text.
                    </div>
                </div>
            </div>

            <div class="blog-sidebar">
                <h4 class="sidebar-title"><i class="fa fa-comments"></i> Recent Comments</h4>
                <hr style="margin-bottom: 5px;">
                <ul class="sidebar-list">
                    <li><h5 class="blog-title">Author Name</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore</p>
                    </li>
                    <li><h5 class="blog-title">Author Name</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore</p>
                    </li>
                    <li><h5 class="blog-title">Author Name</h5>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore</p>
                    </li>
                </ul>
            </div>

        </aside>
    </div>
</section>

<footer id="footer">
    <div class="container">
        <div class="row myfooter">
            <div class="col-sm-6">
                <div class="pull-left">
                    © Copyright Company 2016 | <a href="#">Privacy Policy</a> | <a href="#">Terms of Use</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="pull-right">Designed by <a href="http://www.atis.al">ATIS</a></div>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>


<!--Jquery Smooth Scrolling-->
<script>
    $(document).ready(function () {
        $('.custom-menu a[href^="#"], .intro-scroller .inner-link').on('click', function (e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 900, 'swing', function () {
                window.location.hash = target;
            });
        });

        $('a.page-scroll').bind('click', function (event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top
            }, 1500, 'easeInOutExpo');
            event.preventDefault();
        });

        $(".nav a").on("click", function () {
            $(".nav").find(".active").removeClass("active");
            $(this).parent().addClass("active");
        });

        $('body').append('<div id="toTop" class="btn btn-primary color1"><span class="glyphicon glyphicon-chevron-up"></span></div>');
        $(window).scroll(function () {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function () {
            $("html, body").animate({scrollTop: 0}, 700);
            return false;
        });

    });
</script>

</body>
</html>