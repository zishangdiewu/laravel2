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
                <a href="#">用户管理</a>
            </li>
            <li class="active">用户列表</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                用户信息
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
        <form action="{{ url('/admin/demo') }}" method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
        </form>
       <form action="{{ url('/admin/demo') }}" method='get'>
            <div class='medio-body'>
                用户名：<input type='text'name='u_name' style='line-height:19px'>
                <button type="submit" class="btn btn-purple btn-sm">
                    搜索<i class="icon-search icon-on-right bigger-110"></i>
                </button>
            </div>
        </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>年龄</th>
                    <th>性别</th>
                    <th>头像</th>
                    <th>权限</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $v)
                <tr>
                    <td>{{ $v->u_name }}</td>
                    <td>{{ $v->u_age }}</td>
                    <td>{{ ($v->u_sex == 1)?'男':'女' }}</td>
                    <td><img width="60" height="60" src="/Admin/uploads/{{ $v->u_pic }}"></td>
                    <td>{{ ($v->u_status == 1)?'正常':'禁用' }}</td>   
                    <td>
                        <a class="green" href="/admin/demo/{{ $v->u_id }}/edit">编辑 </a>&nbsp;
                        <a class="red" href="javascript:doDel({{ $v->u_id }})">删除</a>&nbsp;
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
                form.action = 'demo/'+id;
                form.submit();
            }
        }
</script>       
@endsection