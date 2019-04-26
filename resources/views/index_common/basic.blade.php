<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Zeences Design</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/index/style/images/favicon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/index/style/style.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/index/style/color/red.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('/index/style/css/prettyPhoto.css') }}"  />
    <link rel="stylesheet" type="text/css" href="{{ asset('/index/style/type/museo.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/index/style/type/ptsans.css') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/index/style/type/charis.css') }}" media="all" />
    <script type="text/javascript" src="{{ asset('/index/style/js/jquery-1.6.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/index/style/js/ddsmoothmenu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/index/style/js/transify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/index/style/js/jquery.prettyPhoto.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/index/style/js/jquery.superbgimage.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/index/style/js/jquery.slickforms.js') }}"></script>
</head>
<body>
<!-- Fullscreen backgrounds -->
<div id="thumbs">
    <a href="{{ asset('/index/style/images/art/a1.jpg') }}">1</a>
    <a href="{{ asset('/index/style/images/art/a2.jpg') }}">2</a>
    <a href="{{ asset('/index/style/images/art/a3.jpg') }}">3</a>
    <a href="{{ asset('/index/style/images/art/a4.jpg') }}">4</a>
    <a href="{{ asset('/index/style/images/art/a5.jpg') }}">5</a>
    <a href="{{ asset('/index/style/images/art/a6.jpg') }}">6</a>
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
            @yield('content')
        </div>
            @include('index_common.right')
    </div>

    <div id="copyright" class="opacity">
        <p>© 2011 Zeences Design. All Right Reserved.</p>
    </div>
</div>

<script type="text/javascript" src="{{ asset('/index/style/js/scripts.js') }}"></script>
</body>
</html>