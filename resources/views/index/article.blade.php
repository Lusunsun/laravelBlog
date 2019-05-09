@extends('index_common.basic')

<link rel="stylesheet" type="text/css" href="{{ asset('/index/style/css/sweetalert.css') }}" media="all" />
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

            <div class="hr2"></div>

            <!-- Begin Comments -->

            <h3>留言</h3>

            <!-- Begin Comments -->
            <div id="comments">
                <ol id="singlecomments" class="commentlist">
                    @foreach($comments as $k => $v)
                        <li class= "clearfix">
                            <div class="message" style="float: left">
                                <div class="info">
                                    <h3 style="float: left">{{ $v->name }}</h3>
                                    <span class="date">{{ date('Y-m-d H:i:s', $v->createTime) }}</span>
                                </div>
                                <p>{{ $v->content }}</p>
                            </div>
                            <div class="clear"></div>
                        </li>
                    @endforeach
                </ol>
            </div>
            <!-- End Comments -->
            <input type="hidden" id="articleId" value="{{ $article->id }}"/>
            <div class="comment-form">
                <h3>Leave a Reply</h3>
                <div class="form-container">
                    <div class="forms cform" >
                        <fieldset>
                            <ol>
                                <li class="form-row text-input-row">
                                    <label>Name</label>
                                    <input type="text" name="name" value="" class="text-input required" id="name" title="" />
                                </li>
                                <li class="form-row text-input-row">
                                    <label>Email</label>
                                    <input type="text" name="email" value="" class="text-input required email" title="" id="email" />
                                </li>
                                <li class="form-row text-area-row">
                                    <label>Message</label>
                                    <textarea name="message" class="text-area required" id="content"></textarea>
                                </li>
                                <li class="button-row">
                                    <input type="submit" value="Submit" name="submit" class="btn-submit" id="submit"/>
                                </li>
                            </ol>
                        </fieldset>
                    </div>
                    <div class="response"></div>
                </div>
            </div>
        </div>
    </div>

@endsection
<script src="/admin/editor/examples/js/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('/index/style/js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('/index/style/js/sweetalert-dev.js') }}"></script>
<script src="/admin/js/sweetalert2.js"></script>
<script type="text/javascript">

var content ;
    $(function() {
        var ws_url = 'ws://127.0.0.1:2000';
        var conn = new WebSocket(ws_url);

        conn.onopen = function (ev) {
            console.log('已连接');
            alert(1);
        };


        $('#submit').click(function (){
            var articleId = $('#articleId').val();
            var email = $('#email').val();
            content = $('#content').val();
            var name = $('#name').val();

            $('#email').val('');
            $('#content').val('');
            $('#name').val('');

            $.post('{{ route('commentAdd') }}',{id:articleId,email:email,content:content,name:name},function(data){
                conn.send(content);
                conn.onmessage = function (ev) {
                    alert(ev.data);
                }
                    $('#singlecomments').append(data);
                }
            );
        });


        // connectedtoServer(ws_url);
    });

    function connectedtoServer(ws_url) {
        conn = new WebSocket(ws_url);
        conn.onopen = function (ev) {
            conn.send(content);
        };
        conn.onerror = function () {
            console.log('连接失败');
        },
            conn.onmessage = function (ev) {
                alert(ev.data);
            }
    }
</script>
