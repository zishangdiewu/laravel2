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
                <a href="#">友情链接管理</a>
            </li>
            <li class="active">链接列表</li>
        </ul>
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                链接信息
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
        <form action='/admin/links' method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
        </form>
        <form action='/admin/links' method='get'>
                <div class='medio-body'>
                    链接名称：<input type='text'name='l_name'>
                    <button type="submit" class="btn btn-purple btn-sm">
                        搜索<i class="icon-search icon-on-right bigger-110"></i>
                    </button>
                </div>
            </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>链接名称</th>
                    <th>链接描述</th>
                    <th>链接分类</th>
                    <th class="hidden-480">链接地址</th>
                    <th class="hidden-480">链接图像</th>
                    <th>链接开关</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $v)
                <tr>
                    <td>{{ $v->l_name }}</td>
                    <td>{{ $v->l_title }}</td>
                    @if($v->l_sort  == 1)
                        <td class="hidden-480">其他</td>
                    @endif
                    @if($v->l_sort  == 2)
                        <td class="hidden-480">媒体</td>
                    @endif
                    @if($v->l_sort  == 3)
                        <td class="hidden-480">新闻</td>
                    @endif
                    @if($v->l_sort  == 4)
                        <td class="hidden-480">活动</td>
                    @endif
                    <td class="hidden-480">{{ $v->url }}</td>
                    <td ><img width="60" height="60" src="/Admin/uploads/{{ $v->l_pic }}"></td>
                    <td>{{ ($v->l_switch == 1)?'开':'关' }}</td>
                    <td>
                        <a class="green" href="/admin/links/{{ $v->l_id }}/edit">编辑</a>
                        <a class="red" href="javascript:doDel({{ $v->l_id }})">删除</a>
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
                form.action = '/admin/links/'+id;
                form.submit();
            }
        }
</script>       
@endsection