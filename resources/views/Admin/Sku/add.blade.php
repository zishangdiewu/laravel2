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
            <li class="active">添加sku</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                添加sku信息
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form" action="{{ url('admin/sku') }}" method='post' enctype='multipart/form-data'>
                    {{ csrf_field() }}  
                <!--     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="请输入商品名" class="col-xs-10 col-sm-5" name='g_name' required  />
                        </div>
                    </div>
                     -->
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 网络制式 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="请输入网络制式名" class="col-xs-10 col-sm-5" name='sk_ver' required  />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                提交
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
