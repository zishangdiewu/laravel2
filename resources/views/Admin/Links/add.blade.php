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
                添加链接
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form" action='/admin/links' method='post' enctype='multipart/form-data'>
                    {{ csrf_field() }}  
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接名称 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name='l_name' required />
                        </div>
                    </div>
                    
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接介绍 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name='l_title'required/>
                        </div>
                    </div>
                    
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接地址 </label>

                        <div class="col-sm-9">
                            <input type="text" id="form-field-1"  class="col-xs-10 col-sm-5" name='url' required />
                        </div>
                    </div>

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接图片 </label>

                        <div class="col-sm-7">
                            <input type="file" id="form-field-1" class="col-xs-10 col-sm-5" name='l_pic' />  
                        </div>
                    </div>
                    
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接分类 </label>

                        <div class="col-sm-7">
                            <select name='l_sort'>
                                <option value='1'>其他</option>
                                <option value='2'>媒体</option>
                                <option value='3'>新闻</option>
                                <option value='4'>活动</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 链接开关 </label>

                        <div class="col-sm-9">
                            <div class="col-xs-12 col-sm-6">                    
                                <div>
                                    <label>
                                        <input type="radio" class="ace" name='l_switch' value="1" checked />
                                        <span class="lbl"> 开 </span>
                                    
                                        <input type="radio" class="ace" name='l_switch' value="2" />
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
                                添加
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
