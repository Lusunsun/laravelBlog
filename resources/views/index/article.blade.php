@extends('index_common.basic')
@section('content')
    <div class="blog-post">
        <!-- Begin Posts -->
        <div class="content">
            <!-- Begin Post -->
            <div class="post">

                <!-- Begin Post Info -->
                <div class="post-info">
                    <!-- Begin Date -->
                    <div class="post-date"> <span class="day">{{ date('d',$article->updateTime) }}</span> <span class="month">{{ date('M',$article->updateTime) }}</span> <span class="year">{{ date('Y',$article->updateTime) }}</span> </div>
                    <!-- End Date -->
                    <!-- Begin Title -->
                    <div class="post-title">
                        <h1 >{{ $article->title }}</h1>
                        <div class="post-meta"> <span class="comments"><a href="#">{{ $article->comments }} Comments</a></span> <span class="categories"> {{ $article->views }} Views</span> </div>
                    </div>
                    <!-- End Title -->
                </div>
                <!-- End Post Info -->

                <div class="post-text">
                    {!! $article->htmlContent !!}
                </div>
                <!-- End Text -->
                <span class="tags">标签: {{ $article->tag }}</span> </div>
            <!-- End Post -->
        </div>
    </div>

@endsection
