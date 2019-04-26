<div class="sidebar">
    <div class="sidebar-box">
        <h4>热门文章</h4>
        @inject('getHots', 'App\Http\Controllers\ArticleController')
        <ul class="latest-posts">
            @foreach($getHots->getHots() as $key => $hot)
                <li><span class="date"> <em class="month">{{ date('Y M d',$hot->updateTime) }}</em> </span> <a href="{{ route('article',['id'=>$hot->id]) }}">{{ $hot->title }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar-box">
        <h4 id="search">Search</h4>
        <div class="searchform">
            <div style="">
                <input type="text" id="KeyWord" name="s"  placeholder="KeyWord"/>
            </div>
        </div>
    </div>
    <div class="sidebar-box">
        <h4>Tags</h4>
        @inject('Tags', 'App\Http\Controllers\ArticleController')
        <div class="tag-list">
            <ul>
                @foreach($Tags->getHotTags() as $key => $tag)
                    {{--<li><a href="{{ route('home',['tagId'=>$tag->id]) }}">{{ $tag->name }}</a></li>--}}
                    <li><a href="{{ route('home',['tag'=>$tag]) }}">{{ $tag }}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function() {
         $("#search").click(function(){
             var keyWord = $('#KeyWord').val();
             window.location.href = '{{ route('home') }}'+'?keyWord='+keyWord;
         })
    });


</script>