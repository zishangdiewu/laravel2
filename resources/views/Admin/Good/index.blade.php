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
                <a href="#">商品管理</a>
            </li>
            <li class="active">商品列表</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                商品信息
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
        <form action="{{ url('/admin/good') }}" method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <form action={{ url('/admin/good') }} method='get'>
                <div class='medio-body'>
                    分类名：<input type='text'name='g_name' style='line-height:19px'>
                    <button type="submit" class="btn btn-purple btn-sm">
                        搜索<i class="icon-search icon-on-right bigger-110"></i>
                    </button>
                </div>
            </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>图片</th>
                    <th>商品名</th>
                    <th>分类</th>
                    <th>价格</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $v)
                <tr>
                    <td><a href="/admin/good/{{ $v->g_id }}/edit"><img weight='60' height='60' src="/Admin/uploads/{{ $v->g_image }}"></a></td>
                    <td>{{ $v->g_name }}</td>
                    <td>{{ ($v->s_upid == 1)?'配件':'手机' }} </td>
                    <td>{{ $v->g_price }}</td>
                    <td>
                        <a class="green" href="/admin/good/{{ $v->g_id }}/edit">编辑</a>
                        <a class="red" href="javascript:doDel({{ $v->g_id }})">删除</a>
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
                form.action = '/admin/good/'+id;
                form.submit();
            }
        }
</script>       
@endsection