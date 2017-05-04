@extends('Admin.base.parent')


@section('content')

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">分类管理</a>
            </li>
            <li class="active">添加分类</li>
        </ul>
    </div>

    <div class="page-content">
        <div class="page-header">
            <h1>
                添加分类信息
                <small>
                    <i class="icon-double-angle-right"></i>
                    Common form elements and layouts
                </small>
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="{{ url('/admin/sort')."/".$ob->s_id }}" method='post'>
                    {{ csrf_field() }}  
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 分类名 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="请输入用户名" class="col-xs-10 col-sm-5"required name='s_name' value="{{ $ob->s_name }}"/>
                        </div>
                    </div>

                    
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
