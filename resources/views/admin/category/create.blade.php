@extends('common.basic')
@section('content')

    <div>
        <div class="card" >
            <div class="header">
                <legend>分类增加</legend>
            </div>
            <div class="content">
                <form method="get" action="/" class="form-horizontal">
                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">分类名称</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="" name="name" id="name">
                            </div>
                        </div>
                    </fieldset>
                    <input type="hidden"  id="id" value="" />

                    <fieldset>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">是否热门</label>
                            <div class="col-sm-10 ">
                                <label class="checkbox  " id="isHot">
                                    <span class="icons"><span class="first-icon fa fa-square-o"></span><span class="second-icon fa fa-check-square-o"></span></span><input type="checkbox" data-toggle="checkbox" value="0"  checked="">
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
    <button type="" class="btn btn-info btn-fill btn-wd" id="submit">添加</button>
@endsection
<script src="/admin/editor/examples/js/jquery.min.js"></script>
<script type="text/javascript">

    $(function() {

        $('body').addClass('text-align:center');
        $('#first_content').css('margin','0 auto');
        $('#first_content').css('width','80%');

        $('#submit').click(function (){
            var isHot = $('#isHot').hasClass('checked')?1:0;
            var name = $('#name').val();
            $.post('{{ route('categoryAdd') }}',{isHot:isHot,name:name},
                function(data){
                    swal('', '', data);
                }
            );
        });
    });
</script>