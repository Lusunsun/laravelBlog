<div class="sidebar" data-color="purple" data-image="../assets/img/full-screen-image-3.jpg">
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <div class="logo">
        <a href="http://www.creative-tim.com" class="logo-text">
            Creative Tim
        </a>
    </div>
    <div class="logo logo-mini">
        <a href="http://www.creative-tim.com" class="logo-text">
            Ct
        </a>
    </div>

    <div class="sidebar-wrapper">

        <div class="user">
            <div class="photo">
                <img src="picture/default-avatar.png" />
            </div>
            <div class="info">
                <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                    Tania Andrew
                    <b class="caret"></b>
                </a>
                <div class="collapse" id="collapseExample">
                    <ul class="nav">
                        <li><a href="#">My Profile</a></li>
                        <li><a href="#">Edit Profile</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <ul class="nav">
            <li>
                <a href="dashboard.html">
                    <i class="pe-7s-graph"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#componentsExamples">
                    <i class="pe-7s-plugin"></i>
                    <p>文章管理
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="componentsExamples">
                    <ul class="nav">
                        <li><a href="{{ route('articleLists') }}">文章列表</a></li>
                        <li><a href="{{ route('articleCreate') }}">添加文章</a></li>
                    </ul>
                </div>
            </li>


            <li>
                <a data-toggle="collapse" href="#tablesExamples">
                    <i class="pe-7s-news-paper"></i>
                    <p>分类管理
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="tablesExamples">
                    <ul class="nav">
                        <li><a href="{{ route('categoryLists') }}">分类列表</a></li>
                        <li><a href="{{ route('categoryCreate') }}">添加分类</a></li>
                    </ul>
                </div>
            </li>

            <li>
                <a data-toggle="collapse" href="#mapsExamples">
                    <i class="pe-7s-map-marker"></i>
                    <p>Maps
                        <b class="caret"></b>
                    </p>
                </a>
                <div class="collapse" id="mapsExamples">
                    <ul class="nav">
                        <li><a href="maps/google.html">Google Maps</a></li>
                        <li><a href="maps/vector.html">Vector Maps</a></li>
                        <li><a href="maps/fullscreen.html">Full Screen Map</a></li>
                    </ul>
                </div>
            </li>

            <li class="active">
                <a href="charts.html">
                    <i class="pe-7s-graph1"></i>
                    <p>浏览记录</p>
                </a>
            </li>


        </ul>
    </div>
</div>