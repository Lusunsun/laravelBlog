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
                                        <th rowspan="1" colspan="1">名称</th>
                                        <th rowspan="1" colspan="1">是否热门</th>
                                        <th rowspan="1" colspan="1">浏览次数</th>
                                        <th rowspan="1" colspan="1">留言数</th>
                                        <th rowspan="1" colspan="1">时间</th>
                                        <th class="text-right" rowspan="1" colspan="1">Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key => $category)
                                        <tr role="row" class="{{ in_array($key,[1,3,5,7,9]) ? $trColor[$key] : ''}}">
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->isHot ? '热门':'非热门' }}</td>
                                            <td>{{ $category->views }}次</td>
                                            <td>{{ $category->comments }}个</td>
                                            <td>{{ date('Y-m-d H:i:s', $category->updateTime) }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('categoryUpdate',['id'=>$category->id]) }}" class="btn btn-simple btn-info btn-icon edit"><i class="fa fa-edit"></i></a>
                                                <a href="#" categoryId="{{ $category->id }}" class="btn btn-simple btn-danger btn-icon remove delete"><i class="fa fa-times"></i></a> </td>
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
                                        <li class="paginate_button first" id="datatables_first"><a href="{{ route('categoryLists',['page'=>1]) }}" aria-controls="datatables" data-dt-idx="0" tabindex="0">First</a></li>
                                        <li class="paginate_button previous" id="datatables_previous"><a href="{{ route('categoryLists',['page'=>$count]) }}" aria-controls="datatables" data-dt-idx="1" tabindex="0">Previous</a></li>
                                        @for ($i = 1; $i < $count+1; $i++)
                                            <li class="paginate_button active"><a href="{{ route('categoryLists',['page'=>$i]) }}" aria-controls="datatables" data-dt-idx="2" tabindex="0">{{ $i }}</a></li>
                                        @endfor
                                        <li class="paginate_button next {{ $page<$count ? 'next':'disabled' }}" id="datatables_next"><a href="{{ $page<$count ? route('categoryLists',['page'=>$page+1]):'' }}" aria-controls="datatables" data-dt-idx="6" tabindex="0">Next</a></li>
                                        <li class="paginate_button last {{ $page == 1 ? 'disabled':'' }}" id="datatables_last">
                                            <a href="{{ $page != 1 ? route('categoryLists',['page'=>$page-1]) :'#' }}" aria-controls="datatables" data-dt-idx="7" tabindex="0">Last</a></li>
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
            var categoryId = $(this).attr('categoryId');
            swal({  title: "确定要删除吗?",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn btn-info btn-fill",
                confirmButtonText: "删除",
                cancelButtonClass: "btn btn-danger btn-fill",
                cancelButtonText: "取消",
                closeOnConfirm: false,
            },function(){
                $.post('{{ route('categoryDelete') }}',{id:categoryId},function(data){
                        swal('', '删除失败 请检查当前分类下是否存在文章', data);
                    }
                );

            });
        });
    });



</script>
