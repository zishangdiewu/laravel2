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
        </ul>
    </div>

    <div class="page-content">
        <div class="page-header">
            <h1>
                修改网站配置
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
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
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="/admin/config/{{ $data->c_id }}" method='post' enctype='multipart/form-data'>
                    {{ csrf_field() }} 
                    {{ method_field('PUT')}}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 位置 </label>
                        <div class="col-sm-9">
                            <input type="radio" name='name' value='1' @if($data->name == 1)checked @endif>官网&nbsp;&nbsp;
                            <input type="radio" name='name' value='2'@if($data->name == 2)checked @endif>商城&nbsp;&nbsp;
                            <input type="radio" name='name' value='3'@if($data->name == 3)checked @endif>其他
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 网站标题 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" required name='title' value="{{ $data->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> logo </label>
                        <div class="col-sm-9">
                            <input type="file" id="form-field-1"  class="col-xs-10 col-sm-4" name='logo'/><img weight='90' height='60' src="/Admin/uploads/{{ $data->logo }}">
                        </div>
                    </div>
      
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 版权 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" required name='copy'value="{{ $data->copy }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 关键字 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" required name='keyword'value="{{ $data->keyword }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 联系我们 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" required name='phone'value="{{ $data->phone }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 网站开关 </label>
                        <div class="col-sm-9">
                            <input type="radio" name='switch' value="1"@if($data->switch == 1)checked @endif>开
                            &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                            <input type="radio" name='switch' value="2"@if($data->switch == 2)checked @endif>关
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
