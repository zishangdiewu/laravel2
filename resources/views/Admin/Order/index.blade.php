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
                <a href="#">订单管理</a>
            </li>
            <li class="active">订单列表</li>
        </ul>
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                订单信息
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
        <form action='/admin/order' method='post' name='myform'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
            </form>
            <form action='/admin/order' method='get'>
                <div class='medio-body'>
                    订单号：<input type='text'name='o_number'>
                    <button type="submit" class="btn btn-purple btn-sm">
                        搜索<i class="icon-search icon-on-right bigger-110"></i>
                    </button>
                </div>
                
            </form>
        <table id="sample-table-1" class="table table-striped table-bordered table-hover" >
            <thead>
                <tr>
                    <th>订单号</th>
                    <th>购买时间</th>
                    <th>收货人</th>
                    <th>联系方式</th>
                    <th>订单状态</th>
                    <th>操作</th>
                </tr>
            </thead>

            <tbody>
                @foreach($list as $v)
                <tr>
                    <td class="hidden-480">{{ $v->o_number }}</td>
                    <td class="hidden-480">{{ $v->create_time }}</td>
                    <td class="hidden-480">{{ $v->o_buyername }}</td>
                    <td class="hidden-480">{{ $v->o_buyerzip }}</td>
                    @if($v->o_manage  == 4)
                        <td class="hidden-480">交易完成</td>
                    @endif
                    @if($v->o_manage  == 1)
                        <td class="hidden-480">待付款</td>
                    @endif
                    @if($v->o_manage  == 2)
                        <td class="hidden-480">待发货</td>
                    @endif
                    @if($v->o_manage  == 3)
                        <td class="hidden-480">已发货</td>
                    @endif
                    <td>
                        <div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
                            @if($v->o_manage  == 2)
                                <a class="blue" href="/admin/order/{{ $v->o_id }}/edit">
                                    <b>发货操作</b>
                                </a>
                            @endif
                            @if($v->o_manage  != 2)
                                <b style='color:red'>禁止操作</b>
                            @endif

                        </div>
                        <div class="visible-xs visible-sm hidden-md hidden-lg">
                            <div class="inline position-relative">
                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-caret-down icon-only bigger-120"></i>
                                </button>

                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
                                    <!-- 修改用户信息 -->
                                    <li>
                                        <a href="" class="tooltip-success" data-rel="tooltip" title="Edit">
                                            <span class="green">
                                                <i class="icon-edit bigger-120"></i>
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $list->appends($where)->links() }}
    </div>
</div>  
@endsection