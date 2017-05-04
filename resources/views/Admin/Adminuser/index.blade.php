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
                <a href="#">管理员管理</a>
            </li>
            <li class="active">管理员列表</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                管理员信息
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
        <form action="{{ url('/admin/adminuser') }}" method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
        </form>   
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>姓名</th>
                    <th>权限</th>
                    <th>状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                @foreach($list as $v)
                <tr>                 
                    <td>{{ $v->u_name }}</td>
                    @if($v->u_power == 2)
                    <td>普通管理员</td>
                    @elseif($v->u_power == 3)
                    <td>一级管理员</td>
                    @elseif($v->u_power == 4)
                    <td>二级管理员</td>
                    @elseif($v->u_power == 5)
                    <td>超级管理员</td>
                    @endif
                    <td>{{ ($v->u_status == 1)?'正常':'禁用' }}</td>                 
                    <td>
                        <a class="green" href="/admin/adminuser/{{ $v->u_id }}/edit">编辑</a>
                        @if($v->u_power < 5)
                        <a class="red" href="javascript:doDel({{ $v->u_id }})">删除</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>  
    </div>
</div>  
<script type="text/javascript">
      function doDel(id){
            if(confirm('确定删除吗？')){
                var form = document.myform;
                form.action = 'adminuser/'+id;
                form.submit();
            }
        }
</script>       
@endsection