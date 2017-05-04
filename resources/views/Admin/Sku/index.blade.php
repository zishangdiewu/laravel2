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
                <a href="#">sku管理</a>
            </li>
            <li class="active">sku列表</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                sku信息
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
        <form action="{{ url('/admin/sku') }}" method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
        </form>
       <form action="{{ url('/admin/sku') }}" method='get'>
            <div class='medio-body'>
                关键字：<input type='text'name='sk_ver' style='line-height:19px'>
                <button type="submit" class="btn btn-purple btn-sm">
                    搜索<i class="icon-search icon-on-right bigger-110"></i>
                </button>
            </div>
        </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>商品</th>
                    <th>网络制式</th>
 
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $v)
                <tr>
                    <td></td>
                    <td>{{ $v->sk_ver }}</td>
                
                    <td>
                        <a class="green" href="/admin/sku/{{ $v->sk_id }}/edit">编辑 </a>&nbsp;
                        <a class="red" href="javascript:doDel({{ $v->sk_id }})">删除</a>&nbsp;
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
                form.action = 'sku/'+id;
                form.submit();
            }
        }
</script>       
@endsection