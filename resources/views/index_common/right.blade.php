<div class="sidebar">
    <div class="sidebar-box">
        <h4>热门文章</h4>
        @inject('getHots', 'App\Http\Controllers\ArticleController')
        <ul class="latest-posts">
            @foreach($getHots->getHots() as $key => $hot)
                <li><span class="date"> <em class="month">{{ date('Y M d',$hot->updateTime) }}</em> </span> <a href="{{ route('article',['id'=>$hot->id]) }}">{{ $hot->title }}</a> </li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar-box">
        <h4>Search</h4>
        <div class="searchform">
            <div style="">
                <input type="text" id="KeyWord" name="s" value="KeyWord" onfocus="this.value=''" onblur="this.value='KeyWord'"/>
            </div>
        </div>
    </div>
    <div class="sidebar-box">
        <h4>Tags</h4>
        <div class="tag-list">
            <ul>
                <li><a href="#">journal</a></li>
                <li><a href="#">photography</a></li>
                <li><a href="#">design</a></li>
                <li><a href="#">inspiration</a></li>
                <li><a href="#">fun</a></li>
                <li><a href="#">casual</a></li>
                <li><a href="#">business</a></li>
                <li><a href="#">web</a></li>
                <li><a href="#">color</a></li>
                <li><a href="#">portfolio</a></li>
            </ul>
        </div>
    </div>
</div>