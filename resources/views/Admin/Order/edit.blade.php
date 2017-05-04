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
        </ul>
    </div>

    <div class="page-content">
        <div class="page-header">
            <h1>
                订单发货信息
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="{{ url('/admin/order')."/".$ob->o_id }}" method='post'>
                    {{ csrf_field() }}  
                    {{ method_field('PUT') }}
                     <table id="sample-table-3" class="table table-striped table-bordered table-hover" >
                        <tr>
                            <th class='col-md-5' colspan='2' style='font-size:20px;color:red;'>订单信息</th>
                            <th class='col-md-5' style='font-size:20px;color:red;'>备注</th>
                        </tr>
                        <tr>
                            <th class='col-md-2' style='font-size:16px;'>订单号：</th>
                            <th class='col-md-5'>{{ $ob->o_number }}</th>
                            <th class='col-md-5' rowspan='8'>{{ $ob->o_meno }}</th>
                        </tr>
                        <tr>
                            <th class='col-md-2' style='font-size:16px;'>收货人：</th>
                            <th class='col-md-5'>{{ $ob->o_buyername }}</th>
                        </tr>
                        <tr>
                            <th class='col-md-2' style='font-size:16px;'>收货地址：</th>
                            <th class='col-md-5'>{{ $ob->o_buyeradress }}</th>
                        </tr>
                        <tr>
                            <th class='col-md-2' style='font-size:16px;'>邮编：</th>
                            <th class='col-md-5'>{{ $ob->o_buyerzip }}</th>
                        </tr>
                        <tr>
                            <th class='col-md-2' style='font-size:16px;'>联系方式：</th>
                            <th class='col-md-5'>{{ $ob->o_buyerTel }}</th>
                        </tr>
                        <tr>
                            <th class='col-md-2' style='font-size:16px;'>付款金额：</th>
                            <th class='col-md-5'>{{ $ob->o_price }}</th>
                        </tr>
                        <tr>
                            <th class='col-md-2' style='font-size:16px;'>发货方式</th>
                            <th class='col-md-5'>
                                <select name='o_ship'>
                                    <option value='1'>顺丰</option>
                                    <option value='2'>申通</option>
                                    <option value='3'>圆通</option>
                                    <option value='4'>京东</option>
                                    <option value='5'>天天</option>
                                    <option value='6'>韵达</option>
                                    <option value='7'>汇通</option>
                                </select>
                            </th>
                        </tr>
                    </table>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                发货
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
