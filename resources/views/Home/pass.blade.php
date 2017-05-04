@extends('Home.parent')


@section('content')
    <link rel="shortcut icon" href="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/favicon_7761e1f.ico">
    <link href="{{ asset('/Home/css/global_79a0974.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/member-center_3bb3bfe.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/member-address_0ef63f5.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css"> 

    
    <!-- // <script src="%E6%94%B6%E8%B4%A7%E5%9C%B0%E5%9D%80_files/hm.txt" async=""></script> -->
   <!--  // <script type="text/javascript" src="{{ asset('Home/js/065f0df8c3a79510e698e5de40c8fb71.js') }}"></script> -->
    <!--[if lt IE 9]>
    <script src="https://swsdl.vivo.com.cn/vivoshop/web/dist/js/bower_components/html5shiv/dist/html5shiv.min_23e126e.js"></script>
    <![endif]-->


        <div class="wrapper">
            <div class="crumbs">
                您的位置：
                <a href="http://shop.vivo.com.cn/index.html">首页</a>
                <b></b>
                <a href="http://shop.vivo.com.cn/my/">会员中心</a>
                <b></b>个人资料
            </div>
        </div>
        <div class="wrapper">
            <aside class="menu-bar">
                <ul class="portrait-box">
                    <li>
                        <a href="" title="编辑资料">
                        <img src="/Admin/uploads/{{ session('u_pic') }}" width="160">
                        </a>
                    </li>
                    <li class="mem-name member-menu-nickName"><i class="icon-mem"></i>{{ session('u_name') }}</li>
                    <li class="vcoin-info">我的V币：<a href="http://shop.vivo.com.cn/my/vcoin"><span class="red member-vcoin-number">0</span></a> V币</li>
                </ul>
                <dl id="j_MyCenterMenus" class="menu">
                    <dt class="menu-title"><i class="icon-deal"></i>交易管理</dt>
                    <dd class="menu-item"><a href="/home/mo">我的订单</a></dd>
                    <dt class="menu-title"><i class="icon-evaluation"></i>评价管理</dt>
                    <dd class="menu-item"><a href="/home/comment">我的评论</a></dd>
                    <dt class="menu-title"><i class="icon-account"></i>我的账户</dt>
                    <dd class="menu-item "><a href="/home/user">个人资料</a></dd>
                    <dd class="menu-item on"><a href="/home/userpass">修改密码</a></dd>
                    <dt class="menu-title"><i class="icon-deal"></i>地址管理</dt>
                    <dd class="menu-item"><a href="/home/site">我的地址</a></dd>
                </dl>
            </aside>    
            <article class="content">
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $error)
                        <h3 style="color:red;text-align:center;font-size:30px;">
                            {{ $error }}
                        </h3> 
                    @endforeach
                @endif
                @if(session('error'))
                     <h3 style="color:red;text-align:center;font-size:30px;">
                        {{ session('error') }}
                    </h3>
                @endif

                    <dl>
                    <dt class="module-title">密码修改</dt>
                    <dd class="module-item">
                        <form class="information-form" action='/home/userpass' method='post'>
                        {{ csrf_field() }}
                        <table class="form-table">
                            <colgroup>
                                <col style="width: 150px;">
                                <col>
                            </colgroup>
                            <tbody>
                            <tr>
                                <th><span class="red">*</span>原密码：</th>
                                <td>
                                    <input type='password' name='pass' value='' required>
                                </td>
                            </tr>
                            <tr>
                                <th><span class="red">*</span>新密码：</th>
                                <td>
                                    <input type='password' name='u_pass' value='' required>
                                </td>
                            </tr>
                            <tr>
                                <th><span class="red">*</span>请再次确认：</th>
                                <td>
                                    <input type='password' name='u_password' value='' required>
                                </td>
                            </tr>
                            <tr>
                                <th></th>
                                <td>
                                    <button style="text-align:center;width:100px;height:30px;background:#f3f3f3;" type="submit">保存</button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </form>


                    </dd>
                </dl>
            </article>
        </div>


<script>
    var webCtx = "";
    var passportLoginUrlPrefix = "https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=";
</script>
<script src="{{ asset('Home/js/jquery.js') }}"></script>
<script src="{{ asset('Home/js/jquery_002.js') }}"></script>
<script src="{{ asset('Home/js/jquery_004.js') }}"></script>
<script src="{{ asset('Home/js/jquery-placeholder_fb6154c.js') }}"></script>
<script src="{{ asset('Home/js/vivo-common_38aa2f0.js') }}"></script>
<script src="{{ asset('Home/js/dialog_6a2b3fb.js') }}"></script>
<script src="{{ asset('Home/js/vivo-stat_265b49b.js') }}"></script>
<script src="{{ asset('Home/js/login_confirm_485e7b4.js') }}"></script>
<script src="{{ asset('Home/js/query-vcoin_32d1f89.js') }}"></script>
<script src="{{ asset('Home/js/jquery_003.js') }}"></script>
<script src="{{ asset('Home/js/dialog_6a2b3fb.js') }}" type="text/javascript"></script>
<script src="{{ asset('Home/js/region_a46b4bb.js') }}"></script>
<script src="{{ asset('Home/js/shipping-address_35a72a8.js') }}" type="text/javascript"></script>
<script src="{{ asset('/Home/js/jquery-1.8.3.min.js') }}"></script>
<script>
    //百度统计代码
    var _hmt = _hmt || [];
    (function() {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?0a38f90134ba281b974d46dfeec121e0";
        hm.async = true;
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script>

<div style="height: 0px; width: 0px; overflow: hidden;"><object tabindex="-1" style="height:0;width:0;overflow:hidden;" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" id="JSocket" width="0" height="0"><param name="allowScriptAccess" value="always"><param name="movie" value="http://aeu.alicdn.com/flash/JSocket.swf"> <embed src="%E6%94%B6%E8%B4%A7%E5%9C%B0%E5%9D%80_files/JSocket.swf" name="JSocket" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_cn" width="0" height="0"></object></div><div id="waf_nc_block" style="display: none;"><div class="waf-nc-mask"></div><div id="WAF_NC_WRAPPER" class="waf-nc-wrapper"><img class="waf-nc-icon" src="%E6%94%B6%E8%B4%A7%E5%9C%B0%E5%9D%80_files/TB1_3FrKVXXXXbdXXXXXXXXXXXX-129-128.png" alt="" width="20" height="20"><p class="waf-nc-title">安全验证</p><div class="waf-nc-splitter"></div><p class="waf-nc-description">请完成以下验证后继续操作：</p><div id="nocaptcha"></div></div></div></body></html>

  @endsection
