@extends('Admin.base.parent')

@section('content')

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">admin</a>
            </li>

            <li>
                <a href="#">评论管理</a>
            </li>
            <li class="active">评论列表</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                评论列表信息
            </h1>
        </div><!-- /.page-header -->
     @if(session('msg'))
            <div class="alert alert-success alert-icon">
            <i class="icon-ok"></i>  
            {{ session('msg') }}
            
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning alert-icon">
            <i class="icon-remove"></i>   
            {{ session('error') }}
            
            </div>
        @endif
   
    <div class="table-responsive">
        <form action="{{ url('/admin/comment') }}" method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
        </form>
       <form action='/admin/comment' method='get'>
            <div class='medio-body'>
                评论：<input type='text'name='c_content' style='line-height:19px'>
                <button type="submit" class="btn btn-purple btn-sm">
                    查找<i class="icon-search icon-on-right bigger-110"></i>
                </button>
            </div>
        </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>商品名</th>
                    <th>内容</th>
                    <th>发表人</th>
                    <th>评星</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $v)
                <tr>
                    <td>{{ $v->g_name }}</td>
                    <td>{{ $v->c_content }}</td>
                    <td>{{ $v->u_name }}</td>
                    <td>{{ $v->c_star }}</td>
                    <td>{{ $v->c_time }}</td>
                    <td>
                        <a class="green" href="/admin/comment/{{ $v->c_id }}/edit">回复</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $list->appends($where)->links() }}
    </div>
</div>      
@endsection