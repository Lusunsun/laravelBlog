<!DOCTYPE html>
<!-- saved from url=(0081)https://www.leavesongs.com/PENETRATION/javascript-prototype-pollution-attack.html -->
<html lang="en" class=""><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="HandheldFriendly" content="True">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="phith0n的小站，长期存在与分享关于网络安全与各种编程的原创文章。">
    <meta name="keywords" content="phith0n,网络安全,代码审计,信息安全,漏洞挖掘,php,C++,mysql,python">
    <link rel="shortcut icon" href="https://www.leavesongs.com/static/cactus/images/favicon.ico">
    <link rel="icon" type="image/png" href="https://www.leavesongs.com/static/cactus/images/favicon-192x192.png" sizes="192x192">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.leavesongs.com/static/cactus/images/apple-touch-icon.png">

    <title>深入理解 JavaScript Prototype 污染攻击 | 离别歌</title>
    <link rel="stylesheet" href="{{ asset('./index/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('./index/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('./index/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('./index/css/flexboxgrid.min.css') }}" integrity="sha256-/8+sU56ayrJGahG9mmcUaNEghbavaceGybkdqO96Kk0=" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('./index/css/code.css') }}">
    <link rel="stylesheet" href="{{ asset('./index/css/button.css') }}">
    <link rel="stylesheet" href="{{ asset('./index/css/pagination.css') }}">
    <link href="{{ asset('./index/css/jquery.fancybox.min.css" rel="stylesheet') }}">
<body>


<div id="header-post">
    <a id="menu-icon" href="https://www.leavesongs.com/PENETRATION/javascript-prototype-pollution-attack.html#" class="active"><i class="fa fa-bars fa-lg"></i></a>
    <a id="menu-icon-tablet" href="https://www.leavesongs.com/PENETRATION/javascript-prototype-pollution-attack.html#" class="active"><i class="fa fa-bars fa-lg"></i></a>

    <span id="menu" style="visibility: visible">
    <span id="nav">
      <ul>
          <li><a href="https://www.leavesongs.com/">主页</a></li>
          <li><a href="javascript:history.back(-1)">返回</a></li>
      </ul>
    </span>
    <br>
    <span id="actions">
      <ul>
      </ul>
      <span id="i-top" class="info" style="display:none;">Back to top</span>
      <span id="i-share" class="info" style="display:none;">Share post</span>
    </span>
    <br>
    <div id="share" style="display: none">

    </div>



  </span>
</div>
<div class="content index width mx-auto px2 my4">
    <article class="post" itemscope="" itemtype="http://schema.org/BlogPosting">
        <header>
            <h1 class="posttitle" itemprop="name headline">{{ $article->title }}</h1>
            <div class="meta">
          <span class="author" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
            <span itemprop="name">phithon</span>
          </span>

                <div class="postdate">
                    <time  itemprop="datePublished">
                        {{ date('Y-m-d H:i:s', $article->updateTime) }}
                    </time>
                </div>

                <div class="article-tag">
                    阅读：{{ $article->views }}
                </div>


                <div class="article-tag">
                    <i class="fa fa-bookmark"></i>
                    <a class="tag-link" href="">{{ $article->name }}</a>
                </div>




            </div>
        </header>
        <div >
            {!! $article->content !!}
        </div>
    </article>








</div>




{{--<script src="./深入理解 JavaScript Prototype 污染攻击 _ 离别歌_files/main.js.下载"></script>--}}
<script>
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "https://hm.baidu.com/hm.js?ad9ab5e37c2811b9f0979e46123fc898";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<script>
    $(document).ready(function () {
        $("article a").each(function (i, e) {
            if(e.host != 'www.leavesongs.com') {
                e.target = '_blank';
            }
        });
        $("article img").each(function (i, e) {
            if(e.parentNode.tagName.toUpperCase() != 'A') {
                $(e).wrap('<a href="'+escapeHtml(e.src)+'" class="fancybox"></a>');
            } else {
                $(e.parentNode).addClass('fancybox');
            }
        });
        $('.fancybox').fancybox();
    })
</script>


</body></html>