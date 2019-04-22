@extends('common.basic')

@section('content')
    <div>
        <div class="card" >
            <div class="header">
                <legend>文章添加</legend>
            </div>
            <div class="content">
                <form method="get" action="/" class="form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="title" id="title">
                            </div>
                        </div>
                    </fieldset>
                    @inject('selects', 'App\Http\Controllers\admin\CategoryController')
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章分类</label>
                            <select name="category" class=" selectpicker col-sm-10 " data-title="Single Select" data-menu-style="dropdown-blue" tabindex="-98" id="categoryId">
                                @foreach ($selects->getSelect() as $key=>$category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </fieldset>

                    <fieldset>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否热门</label>
                            <div class="col-sm-10 ">
                                <label class="checkbox  " id="isHot">
                                    <span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span><input type="checkbox" data-toggle="checkbox" value=""  checked="">
                                </label>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">浏览量</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text"  class="form-control" value="0" name="views" id="views" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">留言数</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-md-10">
                                        <input type="text"  class="form-control" value="0" name="comments" id="comments" disabled="disabled">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>

            </div>
        </div>  <!-- end card -->

    </div>
    <div id="markdown">
        <textarea style="display:none;" id="content"></textarea>
    </div>

    <button type="" class="btn btn-info btn-fill btn-wd" id="submit">添加</button>

@endsection
<script src="/admin/editor/examples/js/jquery.min.js"></script>
<script src="/admin/editor/editormd.min.js"></script>
<script type="text/javascript">

    var testEditor;
    $(function() {
        $('body').addClass('text-align:center');
        $('#first_content').css('margin','0 auto');
        $('#first_content').css('width','80%');
        testEditor = editormd("markdown", {
            width   : "100%",
            height  : 500,
            syncScrolling : "single",
            path    : "http://www.blog.com/admin/editor/lib/"
        });
        $('.fa-close').remove();

        $('#submit').click(function (){
            var categoryId = $('#categoryId').val();
            var comments = $('#comments').val();
            var title = $('#title').val();
            var content = $('#content').val();
            var isHot = $('#isHot').hasClass('checked')?1:0;
            $.post('{{ route('articleAdd') }}',{categoryId:categoryId,comments:comments,title:title,content:content,isHot:isHot},
                function(data){
                    swal('', '', data);
                }
            );
        });
    });
</script>