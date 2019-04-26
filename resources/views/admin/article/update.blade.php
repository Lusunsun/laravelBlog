@extends('common.basic')

@section('content')
    <div>
        <div class="card" >
            <div class="header">
                <legend>文章修改</legend>
            </div>
            <div class="content">
                <form method="get" action="/" class="form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标题</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ $articleData->title or '' }}" name="title" id="title">
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden"  id="id" value="{{ $articleData->id }}" />
                    @inject('selects', 'App\Http\Controllers\admin\CategoryController')
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">文章分类</label>
                                <select name="category" class=" selectpicker col-sm-10 " data-title="Single Select" data-menu-style="dropdown-blue" tabindex="-98" id="categoryId">
                                    @foreach ($selects->getSelect() as $key=>$category)
                                        <option value="{{ $category->id }}" selected="{{ $category->name==$articleData->name? 'selected':''}}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </fieldset>

                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否热门</label>
                            <div class="col-sm-10 ">
                                <label class="checkbox {{ $articleData->isHot == 1 ? 'checked':''}}" id="isHot">
                                    <span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span><input type="checkbox" data-toggle="checkbox" value="">
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
                                        <input type="text"  class="form-control" value="{{ $articleData->views or 0 }}" name="views" id="views">
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
                                        <input type="text"  class="form-control" value="{{ $articleData->comments or 0 }}" name="comments" id="comments">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                    <div class="row">
                        <label class="col-sm-2 control-label">标签</label>
                        <div class="form-group" style="height: 10%">
                            <div class="col-md-5" >
                                <input name="tagsinput" id="tags" class="tagsinput tag-azure tag-fill" value="{{ $articleData->tag }}" />
                            </div>
                        </div>
                    </div>
                    </fieldset>
                </form>


            </div>
        </div>  <!-- end card -->

    </div>
    <div id="markdown">
        <textarea style="display:none;" id="content">{{ $articleData->content or '' }}</textarea>
    </div>

    <button type="" class="btn btn-info btn-fill btn-wd" id="submit">修改</button>

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
            var id = $('#id').val();
            var categoryId = $('#categoryId').val();
            var comments = $('#comments').val();
            var title = $('#title').val();
            var content = $('#content').val();
            var tags = $('#tags').val();
            var htmlContent = $('.editormd-preview-container').html();
            var isHot = $('#isHot').hasClass('checked')?1:0;
            $.post('{{ route('articleEdit') }}',{id:id,categoryId:categoryId,comments:comments,title:title,content:content,isHot:isHot,htmlContent:htmlContent,tag:tags},
                function(data){
                    swal('', '', data);
                }
            );
        });
    });








</script>