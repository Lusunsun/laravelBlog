<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Zeences Design</title>
    <link rel="shortcut icon" type="image/x-icon" href="./index/style/images/favicon.png" />
    <link rel="stylesheet" type="text/css" href="./index/style/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="./index/style/color/red.css" media="all" />
    <link rel="stylesheet" type="text/css" media="screen" href="./index/style/css/prettyPhoto.css"  />
    <link rel="stylesheet" type="text/css" href="./index/style/type/museo.css" media="all" />
    <link rel="stylesheet" type="text/css" href="./index/style/type/ptsans.css" media="all" />
    <link rel="stylesheet" type="text/css" href="./index/style/type/charis.css" media="all" />
    <!--[if IE 7]>
    <!--<link rel="stylesheet" type="text/css" href="./index/style/css/ie7.css" media="all" />-->
    <!--<![endif]&ndash;&gt;-->
    <!--&lt;!&ndash;[if IE 8]>-->
    <!--<link rel="stylesheet" type="text/css" href="./index/style/css/ie8.css" media="all" />-->
    <!--<![endif]&ndash;&gt;-->
    <!--&lt;!&ndash;[if IE 9]>-->
    <!--<link rel="stylesheet" type="text/css" href="./index/style/css/ie9.css" media="all" />-->
    <![endif]-->
    <script type="text/javascript" src="./index/style/js/jquery-1.6.2.min.js"></script>
    <script type="text/javascript" src="./index/style/js/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="./index/style/js/transify.js"></script>
    <script type="text/javascript" src="./index/style/js/jquery.prettyPhoto.js"></script>
    <script type="text/javascript" src="./index/style/js/jquery.superbgimage.min.js"></script>
    <script type="text/javascript" src="./index/style/js/jquery.slickforms.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function($){
            $('.forms').dcSlickForms();
        });
    </script>
</head>
<body>
<!-- Fullscreen backgrounds -->
<div id="thumbs">
    <a href="./index/style/images/art/bg1.jpg">1</a>
    <a href="./index/style/images/art/bg2.jpg">2</a>
    <a href="./index/style/images/art/bg3.jpg">3</a>
    <a href="./index/style/images/art/bg4.jpg">4</a>
    <a href="./index/style/images/art/bg5.jpg">5</a>
    <a href="./index/style/images/art/bg6.jpg">6</a>
</div>
<div id="superbgimage">
    <div class="scanlines"></div>
</div>
<!-- End Fullscreen backgrounds -->
<!-- Begin Wrapper -->
<div id="wrapper">
    @include('index_common.header')
    <!-- Begin Container -->
    <div id="container" class="opacity">
        <div class="content">
            @include('index_common.self')
            <div class="hr1"></div>
            <h3>文章列表</h3>
            @include('index_common.list')
        </div>
            @include('index_common.right')
    </div>

    <div id="copyright" class="opacity">
        <p>© 2011 Zeences Design. All Right Reserved.</p>
    </div>
</div>

<script type="text/javascript" src="./index/style/js/scripts.js"></script>
</body>
</html>