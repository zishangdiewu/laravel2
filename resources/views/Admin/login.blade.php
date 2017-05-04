<!DOCTYPE html>
<html lang="CN" class="no-js">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>vivo</title>

    <link rel="stylesheet" href="css/style.css">

    <body>

        <div class="login-container">
            <div class="login_logo">
                <img src="images/logo.jpg" >
            </div>

            <form action="{{ url('/admin/dologin') }}" method="post" id="loginForm">
                 {{ csrf_field() }}
                @if(session('msg'))
                   <h2 class="m-t-0 m-b-15">{{ session('msg') }}</h2>
                   @else
                   <h2 class="m-t-0 m-b-15">登录</h2>
                @endif

                <div>
                    <input type="text" name="u_name" class="username" placeholder="用户名" autocomplete="off" required />
                </div>
                <div>
                    <input type="password" name="u_password" class="password" required  placeholder="密码" oncontextmenu="return false" onpaste="return false" />
                </div>
                <button id="submit" type="submit">登 陆</button>
                <a href="{{ url('/admin/change') }}">
                <!-- <button type="button" class="register-tis">还有没有账号？</button> -->
                </a>
            </form>
        </div>
        <script src="js/jquery.min.js"></script>
        <script src="js/common.js"></script>
        <!--背景图片自动更换-->
        <script src="js/supersized.3.2.7.min.js"></script>
        <script src="js/supersized-init.js"></script>
        <!--表单验证-->
        <script src="js/jquery.validate.min.js?var1.14.0"></script>

        <div style="text-align:center;margin:50px 0; font:normal 14px/24px 'MicroSoft YaHei';">

        </div>
    </body>
</html>