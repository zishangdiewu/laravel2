<!DOCTYPE html>
<html lang="zh-CN">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<title>vivo</title>
<link rel="stylesheet" href="css/style.css">
<body>

<div class="register-container">
     <div class="login_logo">
        <img src="images/logo.jpg" >
    </div>
    
    <form action="{{ url('/admin/doregister') }}" method="post" id="registerForm" name='myform'>
        <!-- <input type='hidden' name='u_power' value='2'> -->
         {{ csrf_field() }}
         <!-- {{ method_field('PUT') }} -->
        @if(session('msg'))
        <h2 class="m-t-0 m-b-15" style='color:red'>{{ session('msg') }}</h2>
   
        @endif
        <div>
            <input type="text" name="u_name" id='nid' onblur='checkName()' class="username" placeholder="您的用户名" autocomplete="off" required/>
            <span id='uid'></span>
        </div>
        <div>
            <input type="password" name="u_password" class="password" placeholder="输入密码" oncontextmenu="return false" onpaste="return false" id='psw' />
        </div>
        <div>
            <input type="password" name="u_repassword" onblur='checkPass()'class="confirm_password" placeholder="再次输入密码" oncontextmenu="return false" onpaste="return false" id='rpsd'/>
            <span id='pid'></span>
        </div>
        <div>
            <input type="text" name="u_tel" id='aid'  onblur='checkTel()' class="phone_number" placeholder="输入手机号码" autocomplete="off" />
             <span id='tid'></span>
        </div>
        <div>
            <input type="email" name="u_email" class="email" id='eid' onblur='checkEmail()' placeholder="输入邮箱地址" oncontextmenu="return false" onpaste="return false" />
             <span id='emid'></span>
        </div>

        <button id="submit" type="submit">注 册</button>
        <a href="{{ url('/admin/back') }}">
        <button type="button" class="register-tis">已经有账号？</button>
    </a>
    </form>
    

</div>

</body>
<script type="text/javascript">
    var uname = document.myform.u_name;
    var email = document.myform.u_email;
    var tel = document.myform.u_tel;
    var pass = document.myform.u_password;
    var repass = document.myform.u_repassword;
    nid = document.getElementById('nid');
    aid = document.getElementById('aid');
    eid = document.getElementById('eid');
    psw = document.getElementById('psw');
    rpsd = document.getElementById('rpsd');
    function checkName()
    {
        var uid = document.getElementById('uid');
        if(uname.value.match(/^\w{8,12}$/) == null)
        {
            uid.innerHTML = ' *请输入一个8-12的字符';
            return false;
        }else{
            uid.innerHTML = '';
            return true;
        }
    }
     function checkPass()
    {
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
    function checkTel()
    {
        var tid = document.getElementById('tid');
        if(tel.value.match(/^\d{11}+$/) == null){
            tid.innerHTML = ' *输入11位数字';
            return false;
        }else{
            tid.innerHTML = '';
            return true;
        }      
    }
  

</script>
<script src="js/jquery.min.js"></script>
<script src="js/common.js"></script>
<!--背景图片自动更换-->
<script src="js/supersized.3.2.7.min.js"></script>
<script src="js/supersized-init.js"></script>
<!--表单验证-->
<script src="js/jquery.validate.min.js?var1.14.0"></script>

</html>

