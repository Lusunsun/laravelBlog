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
        <li><a href="{{ route('home') }}">首页</a></li>
        @inject('selects', 'App\Http\Controllers\admin\CategoryController')
        <li><a href="">分类</a>
            <ul>
                @foreach($selects->getSelect() as $key => $select)
                    <li><a href="{{ route('home',['categoryId'=>$select->id]) }}">{{ $select->name }}</a></li>
                @endforeach
            </ul>
        </li>
        <li><a href="{{ route('home') }}">留言</a></li>
        <li><a href="{{ route('home') }}">在线简历</a></li>
    </ul>
    <br style="clear: left" />
</div>
<!-- End Menu -->