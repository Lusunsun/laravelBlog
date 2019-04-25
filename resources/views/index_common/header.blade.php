<div id="header">
    <div class="logo"><a href="index.html"><img src="./index/style/images/logo.png" alt="" /></a></div>
    <div class="social">
        <ul>
            <li><a href="#"><img src="{{ asset('/index/style/images/icon-rss.png') }}" alt="RSS" /></a></li>
            <li><a href="#"><img src="{{ asset('index/style/images/icon-facebook.png') }}" alt="Facebook" /></a></li>
            <li><a href="#"><img src="{{ asset('index/style/images/icon-twitter.png') }}" alt="Twitter" /></a></li>
            <li><a href="#"><img src="{{ asset('index/style/images/icon-googleplus.png') }}" alt="Google+" /></a></li>
            <li><a href="#"><img src="{{ asset('index/style/images/icon-dribble.png') }}" alt="Dribble" /></a></li>
            <li><a href="#"><img src="{{ asset('index/style/images/icon-flickr.png') }}" alt="Flickr" /></a></li>
            <li><a href="#"><img src="{{ asset('index/style/images/icon-tumblr.png') }}" alt="Tumblr" /></a></li>
        </ul>
    </div>
</div>
<div class="clear"></div>
<!-- Begin Menu -->
<div id="menu" class="menu opacity">
    <ul>
        <li><a href="index.html">首页</a></li>
        <li><a href="portfolio.html">Portfolio</a>
            <ul>
                <li><a href="portfolio.html">Portfolio 5 Columns</a></li>
                <li><a href="portfolio-post.html">Portfolio Post</a></li>
            </ul>
        </li>
        @inject('selects', 'App\Http\Controllers\admin\CategoryController')
        <li><a href="blog.html">分类</a>
            <ul>
                @foreach($selects->getSelect() as $key => $select)
                    <li><a href="post.html">{{ $select->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="fullwidth.html">Pages</a>
            <ul>
                <li><a href="fullwidth.html">Full Width Page</a></li>
                <li><a href="pagewithsidebar.html">Page with Sidebar</a></li>
            </ul>
        </li>

        <li><a href="button-boxes-images.html" class="active">Styles</a>
            <ul>
                <li><a href="button-boxes-images.html">Buttons Boxes Images</a></li>
                <li><a href="columns.html">Columns</a></li>
                <li><a href="typography.html">Typography</a></li>
                <li><a href="tab-toggle-table.html">Tabs Toggle Tables</a></li>
                <li><a href="testimonials.html">Testimonials</a></li>
            </ul>
        </li>
        <li><a href="contact.html">Contact</a></li>
    </ul>
    <br style="clear: left" />
</div>
<!-- End Menu -->