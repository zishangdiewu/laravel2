<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" href="{{ asset('/Home/css/login.css') }}" style="text/css">
		<script type="text/javascript" src="{{ asset('/Home/js/jquery-1.7.2.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/Home/js/jquery-md5-min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('/Home/js/login.js') }}"></script>
		<script src="{{ asset('/Home/js/jquery-1.8.3.min.js') }}"></script>
		<title>vivo帐号注册</title>
	</head>
	<body >
		<a class="banner_bg" href="">
		</a>
		<div class="middle_box">
			<div class="hide_out">
				<div class="left">
					<!-- 注册 -->
					<div class="fieldset-section"  >
					<form id="login_form" name="form" action="/home/doenroll" method="post">
						{{ csrf_field() }}
						@if (count($errors) > 0)
					                    @foreach ($errors->all() as $error)
					                        <h2 style='font-size:20px;color:red;'>{{ $error }}</h2>
					                    @endforeach
					        @endif
						<!-- <input type="hidden" name="" value="5"/>  -->
						<!-- <input type="hidden" name="redirect_uri" value="http://www.vivo.com.cn/auth.php?referer=http%3A%2F%2Fwww.vivo.com.cn%2Fvivo%2Fx9i%2F"/> -->
						<ul class="slogin cl">
							@if(session('msg'))
					           <h2 style='font-size:20px;color:red;'>{{ session('msg') }}</h2>
					        @endif
							<li class="username li_input">
								<em></em>
								<input class="v_inp" type="text" required placeholder="请输入用户名" name="u_name" id="_account"
								 onfocus="inputFocus('_account')" onblur="inputBlur('_account','帐号不能为空')" value=""/>
								<p class="tip" id="error_account"></p>
								<b class="correct"></b>
							</li>
							<li class="psw li_input">
								<em></em>
								<input class="v_inp" type="password" required autocomplete="off" placeholder="密码" id="u_password" name="u_password"
								 onfocus="inputFocus('u_password')" onblur="inputBlur('u_password','密码不能为空')"/>
								<p class="tip" id="error_pwd" ></p>
								<b class="error"></b>
							</li>
							<!-- <li class="psw li_input">
								<em></em>
				                <input class="v_inp" type="text" autocomplete="off" placeholder="验证码" id="mycode" name="mycode"
								onfocus="inputFocus('mycode')" onblur="inputBlur('mycode','验证码不能为空')"/>
							</li>
							<div>
				                <img src="{{ url('/home/captch/'.time()) }}" onclick="this.src='{{ url('/home/captch') }}/'+Math.random()" />
			                </div>
 -->

							<li class="vercode li_input">
								<em></em>
								<input class="v_inp" name='mycode' placeholder="请输入图片验证码" id="_phoneiconcode" onfocus="inputFocus('_phoneiconcode')" onblur="checkIconCode('_phoneiconcode')" type="text">
								<span class="code-box">
									<img src="{{ url('/home/captch/'.time()) }}" alt="验证码" title=" 看不清楚？ 点击刷新" onclick="this.src='{{ url('/home/captch') }}/'+Math.random()"> 
								</span>
								<b class="correct" id="ct"></b>
								<p class="tip" id="error_phoneiconcode"></p>
							</li>


							<li class="login-btn">
								<input class="v_dark_btn sulong_btn" type="submit"  value="立即注册"/>
							</li>
						</ul>
					</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
