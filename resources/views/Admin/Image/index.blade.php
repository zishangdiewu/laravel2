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
                <a href="#">轮播图管理</a>
            </li>
            <li class="active">轮播图列表</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                轮播图信息
            </h1>
        </div><!-- /.page-header -->
     @if(session('msg'))
            <div class="alert alert-success alert-icon">
            {{ session('msg') }}
            <i class="icon"></i>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning alert-icon">
            {{ session('error') }}
            <i class="icon"></i>
            </div>
        @endif
    <div class="table-responsive">
        <form action="{{ url('/admin/image') }}" method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
        </form>
        <form action="{{ url('/admin/image') }}" method='get'>
            <div class='medio-body'>
                轮播图位置：<input type='text'name='i_address' style='line-height:19px'>
                <button type="submit" class="btn btn-purple btn-sm">
                    搜索<i class="icon-search icon-on-right bigger-110"></i>
                </button>
            </div>
        </form>   
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>位置</th>
                    <th>展示</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $v)
                <tr>
                    <td>{{ ($v->i_address) }}</td>
                    <!-- @if($v->i_address  == 1)
                        <td>官网首页</td>
                    @endif
                    @if($v->i_address  == 2)
                        <td>商城首页</td>
                    @endif
                    @if($v->i_address  == 3)
                        <td>明星单品</td>
                    @endif -->
                    <!-- <td>{{ $v->i_image }}</td> -->
                    <td><img name='i_image' width='60' height='60' src="/Admin/uploads/{{ $v->i_image }}"></td>
                    <td>{{ ($v->i_status == 1)?'使用中':'禁用' }} </td>
                    <td>
                        <a class"green" href="/admin/image/{{ $v->i_id }}/edit">编辑</a>
                        <a class="red" href="javascript:doDel({{ $v->i_id }})">删除</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $list->appends($where)->links() }}
    </div>
</div>  
<script type="text/javascript">
      function doDel(id){
            if(confirm('确定删除吗？')){
                var form = document.myform;
                form.action = '/admin/image/'+id;
                form.submit();
            }
        }
</script>       
@endsection