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
                <a href="#">用户管理</a>
            </li>
            <li class="active">添加用户</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                添加用户信息
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form" action="{{ url('admin/demo') }}" method='post' enctype='multipart/form-data'>
                    {{ csrf_field() }}  
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 用户名 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="请输入用户名" class="col-xs-10 col-sm-5" name='u_name' required  />
                        </div>
                    </div>
                    
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 密码 </label>

                        <div class="col-sm-9">
                            <input type="password" id="form-field-1" placeholder="请输入密码" class="col-xs-10 col-sm-5" name='u_password'  required/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 年龄 </label>

                        <div class="col-sm-9">
                            <input type="age" id="form-field-1" placeholder="请输入年龄" class="col-xs-10 col-sm-5" name='u_age' />
                        </div>
                    </div>

                    <div class="space-4"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 性别 </label>

                        <div class="col-sm-9">       
                            <div class="col-xs-12 col-sm-6">                    
                                <div>
                                    <label>
                                        <input type="radio" class="ace" name='u_sex' value="1" />
                                        <span class="lbl"> 男 </span>
                                    
                                        <input type="radio" class="ace" name='u_sex' value="2" />
                                        <span class="lbl"> 女 </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 头像 </label>

                        <div class="col-sm-7">
                            <input type="file" id="form-field-1" class="col-xs-10 col-sm-5" name='u_pic' /><img width="60" height="60" src="/Admin/uploads/user.jpg">  
                                                   
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
