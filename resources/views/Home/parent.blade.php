@if($con->switch == 1)


<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="x-ua-compatible" content="IE=edge" >
    <title>vivo智能手机官方商城</title>
    <meta name="keywords" content='vivo智能手机官方商城'/>
    <meta name="description" content='vivo智能手机官方商城'/>
    <!-- <link rel="shortcut icon" href="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/favicon_7761e1f.ico"> -->

    <link href="{{ asset('./Home/css/css.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('./Home/css/global_79a0974.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('./Home/css/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('./Home/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css"/>
<!-- 购物车 -->
    <link href="{{ asset('./Home/css/global_79a0974.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('./Home/css/cart/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('./Home/css/cart/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('./Home/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('./Home/css/buy-process_e40c238.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('./Home/css/cart/order-detail_988f712.css') }}" rel="stylesheet" type="text/css">
    <!-- <link href="{{ asset('./Home/css/cart/shopcart_a8b5215.css') }}" rel="stylesheet" type="text/css"> -->
    <!-- 列表 -->
    <link rel="shortcut icon" href="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/favicon_7761e1f.ico">
    <link href="{{ asset('./Home/css/list/global_79a0974.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('./Home/css/list/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('./Home/css/list/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('./Home/css/list/prod-list_51dea72.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('Home/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('./Home/css/home_d854362.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('./Home/css/member-order_70818b2.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('./Home/css/buy-process_e40c238.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('./Home/css/member-center_3bb3bfe.css') }}" rel="stylesheet" type="text/css"/>
    <script src="{{ asset('Home/js/morder/my_order_44f932e.js') }}" type="text/javascript"></script>
    
    <link href="{{ asset('/Home/css/details/global_79a0974.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/details/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/details/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/details/prod-detail_a0bd3da.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/details/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
   

    <script type="text/javascript" src="{{ asset('./Home/js/065f0df8c3a79510e698e5de40c8fb71.js') }}" ></script>
    <!--[if lt IE 9]>
    <script src="{{ asset('./Home/js/html5shiv.min_23e126e.js') }}" ></script>
    <![endif]-->

</head>
<body class="">
<header id="header">
    <div class="head-search">
        <div class="search-box">
           
            <form action="/home/search" method="get"><input type="text" autocomplete="off" name="g_name" maxlength="20" placeholder="如:x9" /><button type="submit">搜索</button></form><a class="close"></a>
        </div>
    </div>
    <div class="wrapper">
        <nav id="navigator" class="cl">
            <a href="" class="vivo-logo"><img src="/Admin/uploads/{{ $con->logo }}" alt="vivo智能手机官方网站" /></a>
            <ul class="cl">
                <li><a href="{{ url('./home/list') }}">手机</a></li>
                <li><a href="{{ url('./home/parts') }}" >配件</a></li>
                <li><a href="" >V币商品</a></li>
                <li><a href="" >服务</a></li>
                <li><a href="" target="_blank">社区</a></li>
                <li><a href="{{ url('./home/index') }}" target="_blank">官网</a></li>
            </ul>
            <div class="search-user">
                <ul class="top-quick-menu">
                    <li id="j_SearchTrigger" class="search"><a href="javascript:void(0)" rel="nofollow"><b></b></a></li>

                    @if(session('u_name') && session('u_power') >1 )
                    <li id="j_UserMenuTrigger">
                        <a href='/home/user' class="user"><b><img src="/Admin/uploads/{{ session('u_pic') }}"></b></a>  
                        <ul class="user-menu" style="display: none;">
                            <li class="member-center"><a href='/home/user'><i></i>个人中心</a><span class="icon-angular"></span></li>
                            <li class="my-order"><a href="{{ url('/home/mo') }}"><i></i>我的订单</a></li>
                            <li class="logout"><a href="{{ url('/home/logout') }}"><i></i>退出登录</a></li>
                        </ul>
                    </li>
                    <li id="j_UserMenuTrigger">
                        <a href="{{ url('/admin/login') }}" class="user"><b><img src="/Admin/uploads/logo.png"></b></a>  
                    </li>
                    @elseif(session('u_name'))
                    <li id="j_UserMenuTrigger">
                        <a href="{{ url('/home/user') }}" class="user"><b><img src="/Admin/uploads/{{ session('u_pic') }}"></b></a>  
                        <ul class="user-menu" style="display: none;">
                            <li class="member-center"><a href="{{ url('/home/user') }}"><i></i>个人中心</a><span class="icon-angular"></span></li>
                            <li class="my-order"><a href="{{ url('/home/mo') }}"><i></i>我的订单</a></li>
                            <li class="logout"><a href="{{ url('/home/logout') }}"><i></i>退出登录</a></li>
                        </ul>
                    </li>
                    @else
                    <li id="j_UserMenuTrigger">
                        <a href="{{ url('/home/enter') }}" class="user"><b></b></a>  
                    </li>
                    @endif
                   
                    <li>
                        <a href="{{ url('/home/ct') }}" class="shoppingcart"><b></b>
                        <span class="shopcart-num">0</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>

<div id="content" class="cl">
 @yield('content')

</div>
<footer id="footer">
    <div class="shop-agree">
        <div class="wrapper cl">
            <ul class="cl">
                <li><a href="/helpcenter/transport-cost/" target="_blank">
                    <b class="b1"></b>
                    <p><span>0</span>运费购手机</p></a>
                </li>
                <li><a href="/helpcenter/after-service/" target="_blank">
                    <b class="b2"></b>
                    <p><span>30</span>天无理由退换货</p></a>
                </li>
                <li><a href="/helpcenter/invoice-declare/" target="_blank">
                    <b class="b3"></b>
                    <p>电子发票</p></a>
                </li>
                <li class="shop-agree-last"><a href="http://www.vivo.com.cn/service/map.html" target="_blank">
                    <b class="b4"></b>
                    <p><span>480</span>余家售后服务中心</p></a>
                </li>
            </ul>
        </div>
    </div>


    <div class="shop-help">
        <div class="wrapper cl">
            <dl>
                <dt><b class="b1"></b>购买流程</dt>
                <dd><a href="/helpcenter/alipay/" target="_blank">· 支付宝支付</a></dd>
                <dd><a href="/helpcenter/invoice-declare/" target="_blank">· 发票说明</a></dd>
                <dd><a href="/helpcenter/coupon-declare/" target="_blank">· 优惠券说明</a></dd>
                <dd><a href="/helpcenter/huabei-instalment/" target="_blank">· 花呗分期</a></dd>
            </dl>
            <dl>
                <dt><b class="b2"></b>配送方式</dt>
                <dd><a href="/helpcenter/transport-way/" target="_blank">· 配送方式</a></dd>
                <dd><a href="/helpcenter/transport-cost" target="_blank">· 配送费用</a></dd>
                <dd><a href="/helpcenter/sign-notice/" target="_blank">· 签收须知</a></dd>
            </dl>
            <dl>
                <dt><b class="b3"></b>服务支持</dt>
                <dd><a href="/helpcenter/service-promise/" target="_blank">· 服务保证</a></dd>
                <dd><a href="/helpcenter/after-service/" target="_blank">· 售后服务</a></dd>
                <dd><a href="http://www.vivo.com.cn/service/map.html" target="_blank">· 售后网点查询</a></dd>
                <dd><a href="/helpcenter/broken-screen/" target="_blank">· 碎屏宝</a></dd>
                <dd><a href="/helpcenter/extend-service/" target="_blank">· 手机延保</a></dd>
            </dl>
            <dl>
                <dt><b class="b4"></b>品牌服务</dt>
                <dd><a href="http://www.vivo.com.cn/service-faq_zhineng.html" target="_blank">· 常见问题</a></dd>
                <dd><a href="http://www.vivo.com.cn/service.html" target="_blank">· 相关下载</a></dd>
                <dd><a href="/helpcenter/contact-us/" target="_blank">· 联系我们</a></dd>
            </dl>
            <dl class="shop-help-last">
                <dt><b class="b5"></b>小V在线时段</dt>
                <dd>周一至周五 08:00-21:00</dd>
                <dd>周六、周日 09:00-18:00</dd>
                <dd class="online-service">
                    <a target="_blank" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4007161118&aty=0&a=0&curl=&ty=1"><img class="lazy" data-src="picture/online-service_1e5d0b6.png"/></a>
                </dd>
            </dl>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="wrapper cl">
            <div class="sns-box">
                成为vivo粉丝:<a href="http://weibo.com/vivomobile" target="_blank" class="sina"><b></b></a>
                <a href="http://t.qq.com/vivomobile" target="_blank" class="tencent"><b></b></a>
                <a href="http://page.renren.com/vivo?checked=true" target="_blank" class="renren"><b></b></a>
                <a href="javascript:;" class="weixin"><b></b><div class="vivo-weixin-overbox"><img src="picture/vivo-weixin-ico_f8c8800.jpg"><b></b></div></a>
            </div>
            <div class="copy-info">
                <a href="/index.html" class="footer-logo"></a>Copyright &copy;2011-2016 广东步步高电子工业有限公司<br/>版权所有 保留一切权利粤B2-20080267 | <a href="http://www.miitbeian.gov.cn/" target="_blank">粤ICP备05100288号</a>
            </div>
        </div>
    </div>
</footer>
<div id="side-bar">
    <ul>
        <li><a class="service" id="J_online-service" target="_blank" href="http://crm2.qq.com/page/portalpage/wpa.php?uin=4007161118&aty=0&a=0&curl=&ty=1"></a></li>
        <li>
            <a class="qrcode">
                <div class="qrcode-container">
                    <img src="picture/qrcode_6a6b792.png">
                    <p>支付宝扫码<br>关注享最新活动福利</p>
                </div>
            </a>
        </li>
        <li class="last">
            <a class="feedback" id="J_feedback">
                <div class="feedback-container" id="J_feedback-container">
                    <span class="close" id="J_feedback-close"></span>
                    <p class="title">意见反馈</p>
                    <div class="problem-container">
                        <p id="J_feedback-typeDesc" class="problem">请选择问题类型</p>
                        <select id="J_feedback-typeSelect">
                            <option value="0" disabled="disabled" selected="selected">请选择问题类型</option>
                            <option value="1">购物流程（页面浏览、下单、支付等）</option>
                            <option value="2">服务问题（物流时效、客服态度、退换货、售后维修等）</option>
                            <option value="3">商品质量（手机、配件问题）</option>
                            <option value="4">优化建议（活动、服务、购物体验等）</option>
                            <option value="5">其他问题</option>
                        </select>
                    </div>
                    <textarea id="J_feedback-content" class="" maxlength="200" placeholder="请输入您的建议或具体问题，我们将不断改进。"></textarea>
                    <input id="J_feedback-contact" class="contact-way" type="text" maxlength="50" placeholder="邮箱或者vivo账户 （选填）">
                    <span id="J_feedback-kaptchaButton" class="change-code">看不清，换一张</span>
                    <img id="J_feedback-kaptchaImage" class="code">
                    <input id="J_feedback-securityCode" class="code-input" type="text" placeholder="输入右侧验证码">
                    <p id="J_feedback-validateMsg" class="error">请输入正确的信息</p>
                    <button id="J_feedback-submitButton">提交</button>
                </div>
            </a>
        </li>
        <li class="hide" id="J_backtop"><a class="backtop"></a></li>
    </ul>
</div><script>
    var webCtx = "";
    var passportLoginUrlPrefix = "https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=";
</script>
<script src="{{ asset('./Home/js/jquery.min_6163309.js') }}" ></script>
<script src="{{ asset('./Home/js/jquery.cookie_a5283b2.js') }}" ></script>
<script src="{{ asset('./Home/js/jquery.lazyload_546c1da.js') }}" ></script>
<script src="{{ asset('./Home/js/jquery-placeholder_fb6154c.js') }}" ></script>
<script src="{{ asset('./Home/js/vivo-common_38aa2f0.js') }}" ></script>
<script src="{{ asset('./Home/js/dialog_6a2b3fb.js') }}" ></script>
<script src="{{ asset('./Home/js/vivo-stat_265b49b.js') }}" ></script>
<script src="{{ asset('./Home/js/login_confirm_485e7b4.js') }}" ></script>
<script src="{{ asset('./Home/js/dialog_6a2b3fb.js') }}" ></script>
<script src="{{ asset('./Home/js/jquery.validate.min_76c74f2.js') }}" ></script>
<script src="{{ asset('./Home/js/index_0f7e03e.js') }}" ></script>
<script src="{{ asset('./Home/js/index_e1bfc47.js') }}" ></script>
<script src="{{ asset('./Home/js/my_order_44f932e.js') }}" ></script>

<script src="{{ asset('./Home/js/view_1c5c771.js') }}"></script>
<script src="{{ asset('Home/js/jquery_002.js') }}"></script>
<script src="{{ asset('Home/js/jquery.js') }}"></script>
<script src="{{ asset('Home/js/jquery_003.js') }}"></script>
<script src="{{ asset('Home/js/jquery-placeholder_fb6154c.js') }}"></script>
<script src="{{ asset('Home/js/vivo-common_38aa2f0.js') }}"></script>
<script src="{{ asset('Home/js/dialog_6a2b3fb.js') }}"></script>
<script src="{{ asset('Home/js/vivo-stat_265b49b.js') }}"></script>
<script src="{{ asset('Home/js/login_confirm_485e7b4.js') }}"></script>
<script src="{{ asset('Home/js/morder/query-vcoin_32d1f89.js') }}"></script>
<script src="{{ asset('Home/js/morder/dialog_6a2b3fb.js') }}"></script>
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
</body>
</html>
@else
    <h2>服务器维护中。。。。</h1>
@endif