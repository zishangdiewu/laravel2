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
                <a href="#">网站管理</a>
            </li>
            <li class="active">配置位置列表</li>
        </ul>
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                配置信息
            </h1>
        </div><!-- /.page-header -->
     @if(session('msg'))
            <div class="alert alert-success alert-icon">
            <i class="icon-ok"></i>
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
        <form action='/admin/config' method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
        </form>
        <form action='/admin/config' method='get' >
                <div class='medio-body'>
                    标题名称：<input type='text'name='title'>
                    <button type="submit" class="btn btn-purple btn-sm">
                        搜索<i class="icon-search icon-on-right bigger-110"></i>
                    </button>
                </div>
            </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>位置名称</th>
                    <th>标题</th>
                    <th>logo</th>
                    <th>copy</th>
                    <th>开关</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $v)
                <tr>
                    @if($v->name ==1)
                    <td>官网</td>
                    @elseif($v->name == 2)
                    <td>商城</td>
                    @else
                    <td>其他</td>
                    @endif
                    <td>{{ $v->title }}</td>   
                    <td ><img width="60" height="60" src="/Admin/uploads/{{ $v->logo }}"></td>
                    <td>{{ $v->copy }}</td>
                    @if($v->switch == 1)
                    <td>开启</td>
                    @else
                    <td>关闭</td>
                    @endif
                    <td>
                        <a class="green" href="/admin/config/{{ $v->c_id }}/edit">编辑</a>
                        <a class="red" href="javascript:doDel({{ $v->c_id }})">删除</a>
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
                form.action = '/admin/config/'+id;
                form.submit();
            }
        }
</script>       
@endsection