@extends('index_common.basic')
@section('content')
    <div class="content">
        <div class="tabbed-content">
            <div class="tab_container">
                <div style="display: none;" id="tab1" class="tab_content">
                    <h4>芦笋</h4>
                    <p><img src="./index/style/images/art/avatar.jpg" class="left" alt="" style="width: 20%; height: 30%;background-color: #2aa198" />Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Nulla facilisi. Class aptent taciti sociosqu ad litora torquent per conubia  </p>
                </div>
            </div>
        </div>
        <div class="hr1"></div>
        <h3>文章列表</h3>
        @foreach($articles as $key => $article)
        <div class="toggle">
        <h2 class="trigger"><a href="{{ route('article',['id'=>$article->id]) }}">{{ $article->name }}</a></h2>
        </div>
        @endforeach
    </div>
@endsection

