@extends('common.basic')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">标签列表</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <tr><th>ID</th>
                        <th>标签名称</th>
                        <th>热门</th>
                        <th>浏览数</th>
                        <th>留言数</th>
                        <th>更新时间</th>
                    </tr></thead>
                    <tbody>
                    @foreach ($tags as $key => $tag)
                        <tr class="{{ in_array($key, [1,3,5,7,9]) ? $trColor[$key]: ''}}">
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->name }}</td>
                            <td>{{ $tag->isHot }}</td>
                            <td>{{ $tag->views }}</td>
                            <td>{{ $tag->comments }}</td>
                            <td>{{ date('Y-m-d H:i:s', $tag->updateTime) }}</td>
                            <td class="td-actions text-right">
                                <a href="#" rel="tooltip" title="" class="btn btn-info btn-simple btn-xs" data-original-title="详情">
                                    <i class="fa fa-user"></i>
                                </a>
                                <a href="{{ route('tagUpdate',['id'=>$tag->id]) }}" rel="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="修改">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="#" rel="tooltip" title="" class="btn btn-danger btn-simple btn-xs delete" data-original-title="删除"  tagId="{{ $tag->id }}">
                                    <i class="fa fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
<script src="/admin/editor/examples/js/jquery.min.js"></script>
<script type="text/javascript">

    $(function() {
        $('.delete').click(function (){
            var tagId = $(this).attr('tagId');
            swal({  title: "确定要删除吗?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "删除",
                cancelButtonClass: "btn btn-danger btn-fill",
                cancelButtonText: "取消",
                closeOnConfirm: false,
            },function(){
                $.post('{{ route('tagDelete') }}',{id:tagId},function(data){
                        swal("", "", data);
                    }
                );

            });
        });
    });

</script>
