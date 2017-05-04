@extends('Admin.base.parent')


@section('content')

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="password/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">admin</a>
            </li>

            <li>
                <a href="#">密码管理</a>
            </li>
        </ul><!-- .breadcrumb -->
    </div>

    <div class="page-content">
        <div class="page-header">
            <h1>
                修改管理员密码
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
                <form class="form-horizontal" role="form" action="/admin/pass/{{ session('u_id') }}" method='post' enctype='multipart/form-data' name='myform'>
                    {{ csrf_field() }}  
                    {{ method_field('PUT') }}
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 管理员账号 </label>
                        <div class="col-sm-9" >
                            {{ $ob->u_name }}
                        </div>
                    </div>
            
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 原密码 </label>
                        <div class="col-sm-9">
                            <input type="password" id='nid' onblur='checkName()' class="col-xs-10 col-sm-5" required name='password'/>
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 新密码 </label>
                        <div class="col-sm-9">
                            <input type="password" class="col-xs-10 col-sm-5" required name='u_password' id='psw'/>
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 重新输入新密码 </label>
                        <div class="col-sm-9">
                            <input type="password" class="col-xs-10 col-sm-5"onblur='checkPass()' required name='u_repassword' id='rpsd'/>
                            <span id='pid'></span>
                        </div>
                    </div>

                
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                保存
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                恢复
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script type="password/javascript">
    var pass = document.myform.u_password;
    var repass = document.myform.u_repassword;
    psw = document.getElementById('psw');
    rpsd = document.getElementById('rpsd');
     function checkPass()
    {
        alert(1);
        var pid = document.getElementById('pid');
        if(repass.value != pass.value)
        {
            pid.innerHTML = ' *两次密码不一致';
            return false;
        }else{
            pid.innerHTML = '';
            return true;
        }
    }
</script>
@endsection
