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
        </ul>
    </div>

    <div class="page-content">
        <div class="page-header">
            <h1>
                修改友情链接
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form" action='/admin/links/{{ $ob->l_id }}' method='post' enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}   
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接名称 </label>
                        <div class="col-sm-9">
                            <input  type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" required name='l_name' value='{{ $ob->l_name }}'/>
                        </div>
                    </div>
                    
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接描述 </label>
                        <div class="col-sm-9">
                            <input  type="text" class="col-xs-10 col-sm-5" id="form-input-readonly"required name='l_title' value='{{ $ob->l_title }}'/>
                        </div>
                    </div>
                    
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接地址 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name='url' required value="{{ $ob->url }}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接图片 </label>
                        <div class="col-sm-7">
                            <input type="file" id="form-field-1" class="col-xs-10 col-sm-5" name='l_pic' /><img width="60" height="60" src="/Admin/uploads/{{ $ob->l_pic }}">  
                        </div>
                    </div>
                    
                    <div class="space-4"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接开关 </label>
                        <div class="col-sm-9">
                            <div class="col-xs-12 col-sm-6">                    
                                <div>
                                    <label>
                                        <input  type="radio" class="ace" name='l_switch' value="1"  @if($ob->l_switch == 1)checked @endif/>
                                        <span class="lbl"> 开 </span>
                                    
                                        <input  type="radio" class="ace" name='l_switch' value="2"  @if($ob->l_switch == 2)checked @endif/>
                                        <span class="lbl"> 关 </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="space-4"></div>
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                修改
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
