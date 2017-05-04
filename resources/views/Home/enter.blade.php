<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="{{ asset('/Home/css/login.css') }}" style="text/css">
        <script type="text/javascript" src="{{ asset('/Home/js/jquery-1.7.2.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/Home/js/jquery-md5-min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/Home/js/login.js') }}"></script>
        <title>vivo帐号登录</title>
    </head>
    <body >
        <a class="banner_bg" href="">
        </a>
        <div class="middle_box">
            <div class="hide_out">
                <div class="left">
                    <!-- 登录 -->
                    <div class="fieldset-section"  >
                    <form action="/home/doenter" method="post">
                        {{ csrf_field() }}
                        <ul class="slogin cl">
                            @if(session('msg'))
                               <h2 style='font-size:20px;color:red;'>{{ session('msg') }}</h2>
                            @endif
                            <li class="username li_input">
                                <em></em>
                                <input class="v_inp" type="text" placeholder="请输入用户名" name="u_name" id="_account"
                                 onfocus="inputFocus('_account')" onblur="inputBlur('_account','帐号不能为空')" value=""/>
                                <p class="tip" id="error_account"></p>
                                <b class="correct"></b>
                            </li>
                            <li class="psw li_input">
                                <em></em>
                                <input class="v_inp" type="password" autocomplete="off" placeholder="密码" id="u_password" name="u_password"
                                 onfocus="inputFocus('u_password')" onblur="inputBlur('u_password','密码不能为空')"/>
                                <p class="tip" id="error_pwd" ></p>
                                <b class="error"></b>
                            </li>
                            <li class="login-btn">
                                <input class="v_dark_btn sulong_btn" type="submit"  value="立即登录"/>
                            </li>
                            <li class="form-btn">
                                <a class="v_light_btn sulong_btn" href="{{ url('/home/enroll') }}">注册vivo帐号</a>     
                            </li>
                        </ul>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
