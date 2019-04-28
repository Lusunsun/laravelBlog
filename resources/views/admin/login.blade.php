<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/normalize.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/demo.css') }}" />
    <!--必要样式-->
    <link rel="stylesheet" type="text/css" href=" {{ asset('admin/css/component.css') }}" />
    <!--[if IE]>
    <script src="js/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="container demo-1">
    <div class="content">
        <div id="large-header" class="large-header">
            <canvas id="demo-canvas"></canvas>
            <div class="logo_box">
                <h3>芦笋博客</h3>
                <form action="#" name="f" method="post">
                    <div class="input_outer">
                        <span class="u_user"></span>
                        <input name="logname" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户" id="loginName">
                    </div>
                    <div class="input_outer">
                        <span class="us_uer"></span>
                        <input name="logpass" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码" id="loginPassword">
                    </div>
                    <div class="mb2"><a class="act-but submit" href="javascript:;" style="color: #FFFFFF" id="login">登录</a></div>
                </form>
            </div>
        </div>
    </div>
</div><!-- /container -->
<script src="{{ asset('admin/js/TweenLite.min.js') }}"></script>
<script src="{{ asset('admin/js/EasePack.min.js') }}"></script>
<script src="{{ asset('admin/js/rAF.js') }}"></script>
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/demo-1.js') }}"></script>
<script src="{{ asset('admin/js/sweetalert2.js') }}"></script>
</body>
</html>

<script>
    $(function() {
        $('#login').click(function (){
            var passWord = $('#loginPassword').val();
            var userName = $('#loginName').val();
            $.post('{{ route('login') }}',{passWord:passWord,userName:userName},
                function(data){
                    if ('success' === data) {
                        window.location.href="{{ route('adminIndex') }}";
                    }
                }
            );
        });
    });
</script>