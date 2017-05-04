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
            <li class="active">修改管理员</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                修改管理员信息
            </h1>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <form class="form-horizontal" role="form" action='/admin/adminuser/{{ $ob->u_id }}' method='post' enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}   
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员 </label>
                        <div class="col-sm-9">
                            {{ $ob->u_name }}
                        </div>
                    </div>
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 权限 </label>
                        <div class="col-sm-9">
                            <input type='radio' name='u_power' value='2' @if($ob->u_power == 2) checked @endif>普通管理员
                            <input type='radio' name='u_power' value='3' @if($ob->u_power == 3) checked @endif>一级管理员
                            <input type='radio' name='u_power' value='4' @if($ob->u_power == 4) checked @endif>二级管理员
                            
                        </div>
                    </div>
                    
                    <div class="space-4"></div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 是否禁用 </label>
                        <div class="col-sm-9">
                            <input type='radio' name='u_status' value='1' @if($ob->u_status == 1) checked @endif>启用
                            <input type='radio' name='u_status' value='2' @if($ob->u_status == 2) checked @endif>禁用
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
