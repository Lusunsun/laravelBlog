@extends('common.basic')

@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="content">
                <div class="toolbar">
                    <!--        Here you can write extra buttons/actions for the toolbar              -->
                </div>
                <div class="fresh-datatables">
                    <div id="datatables_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatables" class="table table-striped table-no-bordered table-hover dataTable dtr-inline" cellspacing="0" width="100%" style="width: 100%;" role="grid" aria-describedby="datatables_info">
                                    <thead>
                                    <tr>
                                        <th rowspan="1" colspan="1">ID</th>
                                        <th rowspan="1" colspan="1">邮箱</th>
                                        <th rowspan="1" colspan="1">昵称</th>
                                        <th rowspan="1" colspan="1">留言文章</th>
                                        <th rowspan="1" colspan="1">分类</th>
                                        <th rowspan="1" colspan="1">内容</th>
                                        <th rowspan="1" colspan="1">对方地址</th>
                                        <th rowspan="1" colspan="1">对方IP</th>
                                        <th rowspan="1" colspan="1">网络类型</th>
                                        <th class="text-right" rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comments as $key => $value)
                                        <tr role="row" class="{{ in_array($key,[1,3,5,7,9]) ? $trColor[$key] : ''}}">
                                            <td tabindex="0" class="sorting_1">{{ $value->id }}</td>
                                            <td tabindex="0" class="sorting_1">{{ $value->email }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->title}}</td>
                                            <td>{{ $value->categoryName }}</td>
                                            <td>{{ $value->content }}</td>
                                            <td>{{ $value->address or '暂无' }}</td>
                                            <td>{{ $value->ip or '暂无' }}</td>
                                            <td>{{ $value->networkType or '暂无' }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('articleUpdate',['id'=>$value->id]) }}" class="btn btn-simple btn-info btn-icon edit"><i class="fa fa-edit"></i></a>
                                                <a href="#" articleId="{{ $value->id }}" class="btn btn-simple btn-danger btn-icon remove delete"><i class="fa fa-times"></i></a> </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="dataTables_info" id="datatables_info" role="status" aria-live="polite" style="float: left">
                                    Showing {{ $page }} of {{ $count }}
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="dataTables_paginate paging_full_numbers" id="datatables_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button first" id="datatables_first"><a href="{{ route('articleLists',['page'=>1]) }}" aria-controls="datatables" data-dt-idx="0" tabindex="0">First</a></li>
                                        <li class="paginate_button previous" id="datatables_previous"><a href="{{ route('articleLists',['page'=>$count]) }}" aria-controls="datatables" data-dt-idx="1" tabindex="0">Previous</a></li>
                                        @for ($i = 1; $i < $count+1; $i++)
                                            <li class="paginate_button active"><a href="{{ route('articleLists',['page'=>$i]) }}" aria-controls="datatables" data-dt-idx="2" tabindex="0">{{ $i }}</a></li>
                                        @endfor
                                        <li class="paginate_button next {{ $page<$count ? 'next':'disabled' }}" id="datatables_next"><a href="{{ $page<$count ? route('articleLists',['page'=>$page+1]):'' }}" aria-controls="datatables" data-dt-idx="6" tabindex="0">Next</a></li>
                                        <li class="paginate_button last {{ $page == 1 ? 'disabled':'' }}" id="datatables_last">
                                            <a href="{{ $page != 1 ? route('articleLists',['page'=>$page-1]) :'#' }}" aria-controls="datatables" data-dt-idx="7" tabindex="0">Last</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end content-->
        </div>
        <!--  end card  -->
    </div>
@endsection
<script src="/admin/editor/examples/js/jquery.min.js"></script>
<script type="text/javascript">

    $(function() {
        $('.delete').click(function (){
            var articleId = $(this).attr('articleId');
            swal({  title: "确定要删除吗?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "删除",
                cancelButtonClass: "btn btn-danger btn-fill",
                cancelButtonText: "取消",
                closeOnConfirm: false,
            },function(){
                $.post('{{ route('articleDelete') }}',{id:articleId},function(data){
                        swal('', '', data);
                    }
                );

            });
        });
    });



</script>
