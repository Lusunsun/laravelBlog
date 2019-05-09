<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="/admin/editor/examples/css/style.css" />
    <link rel="stylesheet" href="/admin/editor/css/editormd.css" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>LuSun Blog</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Canonical SEO -->
    <link rel="canonical" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro"/>

    <!--  Social tags      -->
    <meta name="keywords" content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap dashboard, bootstrap, css3 dashboard, bootstrap admin, light bootstrap dashboard, frontend, responsive bootstrap dashboard">

    <meta name="description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful.">

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta itemprop="description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful.">

    <meta itemprop="image" content="http://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
    <!-- Twitter Card data -->

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Light Bootstrap Dashboard PRO by Creative Tim">

    <meta name="twitter:description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image" content="http://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg">
    <meta name="twitter:data1" content="Light Bootstrap Dashboard PRO by Creative Tim">
    <meta name="twitter:label1" content="Product Type">
    <meta name="twitter:data2" content="$29">
    <meta name="twitter:label2" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="Light Bootstrap Dashboard PRO by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://demos.creative-tim.com/light-bootstrap-dashboard-pro/examples/dashboard.html" />
    <meta property="og:image" content="http://s3.amazonaws.com/creativetim_bucket/products/34/original/opt_lbd_pro_thumbnail.jpg"/>
    <meta property="og:description" content="Forget about boring dashboards, get an admin template designed to be simple and beautiful." />
    <meta property="og:site_name" content="Creative Tim" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Dashboard core CSS    -->
    <link href="css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href='css/685fd913f1e14aebad0cc9d3713ee469.css' rel='stylesheet' type='text/css'>
    <link href="css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body >
<div class="wrapper">
    @include('common.left')
    <div class="main-panel">
        @include('common.top')

        <div class="content" id="first_content">
            @yield('content')
        </div>
        @include('common.footer')
    </div>
</div>

</body>
<!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
<script src="/admin/js/jquery.min.js" type="text/javascript"></script>
<script src="/admin/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="/admin/js/bootstrap.min.js" type="text/javascript"></script>


<!--  Forms Validations Plugin -->
<script src="/admin/js/jquery.validate.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="/admin/js/moment.min.js"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="/admin/js/bootstrap-datetimepicker.js"></script>

<!--  Select Picker Plugin -->
<script src="/admin/js/bootstrap-selectpicker.js"></script>

<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
<script src="/admin/js/bootstrap-checkbox-radio-switch-tags.js"></script>

<!--  Charts Plugin -->
<script src="/admin/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="/admin/js/bootstrap-notify.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="/admin/js/sweetalert2.js"></script>

{{--<!-- Vector Map plugin -->--}}
{{--<script src="/admin/js/jquery-jvectormap.js"></script>--}}

{{--<!--  Google Maps Plugin    -->--}}
{{--<script src="/admin/js/aa743e8f448a4792bad10d201a7080f6.js"></script>--}}

<!-- Wizard Plugin    -->
<script src="/admin/js/jquery.bootstrap.wizard.min.js"></script>

<!--  Bootstrap Table Plugin    -->
<script src="/admin/js/bootstrap-table.js"></script>

<!--  Plugin for DataTables.net  -->
<script src="/admin/js/jquery.datatables.js"></script>


<!--  Full Calendar Plugin    -->
<script src="/admin/js/fullcalendar.min.js"></script>

<!-- Light Bootstrap Dashboard Core javascript and methods -->
<script src="/admin/js/light-bootstrap-dashboard.js"></script>

<!--   Sharrre Library    -->
<script src="/admin/js/jquery.sharrre.js"></script>
<script src="/admin/js/websockets.js"></script>

<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="/admin/js/demo.js"></script>

<script>
    // $().ready(function(){
    //     demo.initCharts();
    // });
</script>

<script>

    $(function () {
        var ws_url = 'ws://127.0.0.1:2000';
        connectedtoServer(ws_url);
    });

    function connectedtoServer(ws_url) {
        conn = new WebSocket(ws_url);
        console.log(conn);
        conn.onopen = function (ev) {
            console.log('已连接');
        };
        conn.onerror = function () {
            setTimeout(connectedtoServer, 2000);
        },
        conn.onmessage = function (ev) {
           alert(ev.data);
        }
    }

</script>

</html>
