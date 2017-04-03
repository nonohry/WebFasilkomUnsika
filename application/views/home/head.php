<?php
error_reporting(0);
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> 
</html><![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" lang="en"> 
</html><![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" lang="en"> </html><![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="en"> <!--<![endif]-->
<head>
    <title><?=$title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?=$description ?>" />
    <meta name="keyword" content="<?=$keyword ?>">
    <meta name="author" content="Fasilkom Unsika" />
    <meta charset="UTF-8" />
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800' rel='stylesheet' type='text/css' />
    <!-- CSS Bootstrap & Custom -->
    <link href="<?php echo base_url();?>assets/themes/home/bootstrap/css/bootstrap.css" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url();?>assets/themes/home/css/animate.css" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url();?>assets/themes/home/style.css" rel="stylesheet" media="screen" />
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/themes/home/images/ico/favicon.png" />
    <!-- JavaScripts -->
    <script src="<?=base_url();?>assets/themes/home/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo base_url();?>assets/themes/home/js/modernizr.js"></script>
    <!--[if lt IE 8]>
	<div style=' clear: both; text-align:center; position: relative;'>
            <a href="http://www.microsoft.com/windows/internet-explorer/default.aspx?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" alt="" /></a>
        </div>
    <![endif]-->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "//connect.facebook.net/id_ID/all.js#xfbml=1&appId=246050762243714";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

    <!-- This one in here is responsive menu for tablet and mobiles -->
    <div class="responsive-navigation visible-sm visible-xs">
        <a href="#" class="menu-toggle-btn">
            <i class="fa fa-bars"></i>
        </a>
        <div class="responsive_menu">
            <ul class="main_menu">
                 
                <li <?php if($uri1==null){ } ?> >
                    <a href='<?php echo site_url(''); ?>'>Home</a>
                </li>
                 <?php foreach ($menu_foot as $m): ?>
                    <li>
                    <a href="<?php echo site_url(''); ?>pages/<?=$m['content_id']?>"><?=$m['menu_name']?></a>
                    </li>
                <?php endforeach ?>

            
            </ul> <!-- /.main_menu -->
            <ul class="social_icons">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            </ul> <!-- /.social_icons -->
        </div> <!-- /.responsive_menu -->
    </div> <!-- /responsive_navigation -->


    <header class="site-header">
        <div class="container">
            <div class="row">
                <div class="col-md-4 header-left">
                    <div class="logo">
                        <a href="<?php echo base_url();?>" title="" rel="home">
                            <img src="<?=$logo ?>" alt="" />
                        </a>
                    </div> <!-- /.logo -->
                    
                </div> <!-- /.header-left -->

                <div class="col-md-4">
                </div> <!-- /.col-md-4 -->

                <div class="col-md-4 header-right">
                    

                    <div class="search-form">
                        <form name="search_form" method="get" action="<?=site_url()?>search" class="search_form" />
                            <input type="text" name="s" placeholder="Pencarian..." title="Pencarian..." class="field_search" />
                        </form>
                    </div>
                </div> <!-- /.header-right -->
            </div>
        </div> <!-- /.container -->

        <div class="nav-bar-main" role="navigation">
            <div class="container">
                <nav class="main-navigation clearfix visible-md visible-lg" role="navigation">
                        <ul class="main-menu sf-menu">
                            <?php include 'menu.php'; ?>
                        </ul> <!-- /.main-menu -->
                </nav> <!-- /.main-navigation -->
            </div> <!-- /.container -->
        </div> <!-- /.nav-bar-main -->

    </header> <!-- /.site-header -->