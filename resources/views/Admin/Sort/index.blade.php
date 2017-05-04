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
                <a href="#">分类管理</a>
            </li>
            <li class="active">分类列表</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                分类信息
            </h1>
        </div><!-- /.page-header -->
     @if(session('msg'))
            <div class="alert alert-success alert-icon">
            {{ session('msg') }}
            <i class="icon"></i>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning alert-icon">
            {{ session('error') }}
            <i class="icon"></i>
            </div>
        @endif
    <div class="table-responsive">
        <form action={{ ('/admin/sort') }} method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <form action={{ url('/admin/sort') }} method='get'>
                <div class='medio-body'>
                    分类名：<input type='text'name='s_name' style='line-height:19px'>
                    <button type="submit" class="btn btn-purple btn-sm">
                        搜索<i class="icon-search icon-on-right bigger-110"></i>
                    </button>
                </div>
            </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>分类名</th>
                    <th>路径</th>
                    <th>所属产品类别</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $v)
                <tr>
                    <td>{{ $v->s_name }}</td>
                    <td>{{ $v->s_path }}</td>
                    <td>
                        @if($v->s_upid == 0)
                            顶级分类
                        @elseif($v->s_upid == 1)
                            配件
                        @elseif($v->s_upid == 2)
                            手机
                        @endif                          
                    </td>
                    <td>
                        <a class="blue" href="/admin/sortSon/{{ $v->s_id }}">添加子分类</a>&nbsp;
                        <!-- 修改 -->
                        <a class="green" href="/admin/sort/{{ $v->s_id }}/edit"> 编辑</a>&nbsp;
                        <!-- 删除 -->
                        <a class="red" href="javascript:doDel({{ $v->s_id }})">删除</a>&nbsp;
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
                form.action = '/admin/sort/'+id;
                form.submit();
            }
        }
</script>       
@endsection