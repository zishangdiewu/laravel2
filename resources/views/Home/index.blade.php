@if($ob->switch == 1)
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" class="nojs gotop">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>{{ $ob->title }}</title>
        <meta name="keywords" content="vivo,vivo官网,vivo X7,vivo X7Plus，vivo X6S，vivo Xplay5,vivo手机官网,vivo X9,vivo X9Plus,Xplay6,vivo音乐手机,vivo闪充手机,vivo拍照手机">
        <meta name="description" content="vivo是一家专注于智能手机领域的手机品牌，vivo官网提供vivo智能手机包含vivo X9，vivo X9Plus，vivo Xplay6，vivo X7，vivo X7Plus等在内的产品资讯，产品服务，社区在线交流及资源下载等。">
                
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="author" content="uimix, http://uimix.com">
        <meta name="copyright" content="vivo.com.cn">
        <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">

        <link href="{{ asset('./Home/css/global_79a0974.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('./Home/css/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('./Home/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('./Home/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('./Home/css/home_d854362.css') }}" rel="stylesheet" type="text/css"/>

        <link href="{{ asset('./Home/css/base.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('./Home/css/vivo.layout.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('./Home/css/vivo.media.css') }}" rel="stylesheet" type="text/css" />
        <!--<link href="{{ asset('./Home/css/2016guoqing.css') }}" rel="stylesheet" type="text/css" />-->
        <!--[if lte IE 8]><link href="{{ asset('./Home/css/vivo.layout.fixed.css') }}" rel="stylesheet" type="text/css" /><![endif]-->

        <script src="{{ asset('./Home/js/jquery.js') }}" type="text/javascript"></script>
        <script src="{{ asset('./Home/js/vivo.main.js') }}" type="text/javascript"></script>
        <link href="{{ asset('./Home/css/vivo.highlight2016.layout.css') }}" rel="stylesheet" type="text/css" />
        
    </head> 

    <body class="vivomain-page">
        <div id="vivo-wrap">
            <div id="vivo-head-wrap">
                <div class="vivo-head cl">
                    <a class="vivo-h-logo" href="/"></a>
                    <ul class="vivo-h-nav">
                        <li class="nav-gb current"><a  onclick="_hmt.push(['_trackEvent', 'nav', 'click', 'nav/首页'])" href="/">首页</a></li>
                        <!-- <li class="nav-gb nav-h-products "><a href="/product.html" onclick="_hmt.push(['_trackEvent', 'nav', 'click', 'nav/产品'])">产品</a></li> -->
                        <li class="nav-gb"><a onclick="_hmt.push(['_trackEvent', 'nav', 'click', 'nav/商城'])" href="{{ url('/home/shop') }}" target="_blank" >商城</a></li>
                        <!-- <li class="nav-gb "><a href="/store" onclick="_hmt.push(['_trackEvent', 'nav', 'click', 'nav/体验中心'])">体验中心</a></li> -->
                        <!-- <li class="nav-gb "><a href="/funtouchos" onclick="_hmt.push(['_trackEvent', 'nav', 'click', 'nav/Funtouch OS'])">Funtouch OS</a></li> -->
                        <!-- <li class="nav-gb"><a href="https://bbs.vivo.com.cn/" target="_blank" onclick="_hmt.push(['_trackEvent', 'nav', 'click', 'nav/社区'])">社区</a></li> -->
                        <!-- <li class="nav-gb "><a href="/service.html" onclick="_hmt.push(['_trackEvent', 'nav', 'click', 'nav/服务'])">服务</a></li> -->
                    </ul>

                    <div class="nav-tool">
                        <a class="nav-t-kefu" target="_blank" href="https://kefu.vivo.com.cn/robot-vivo/" onclick="_hmt.push(['_trackEvent', 'nav', 'click', 'nav/小V在线客服'])"><b class="v-gb-ico"></b><em class="nav-t-kefu-pop">小V在线客服</em></a>
                        <a class="nav-t-search" href="#" onclick="_hmt.push(['_trackEvent', 'nav', 'click', 'nav/导航搜索'])"><b class="v-gb-ico"></b></a>
                        @if(session('adminuser') && session('u_power') >1)
                         <a class="nav-t-user" href="{{ url('./home/user') }}"><b><img src="/Admin/uploads/{{ session('u_pic') }}"></b></a>
                          <a class="nav-t-user" href="{{ url('./admin/login') }}"><b><img src="/Admin/uploads/logo.png"></b></a>
                        @elseif(session('adminuser'))
                        <a class="nav-t-user" href="{{ url('./home/user') }}"><b><img src="/Admin/uploads/{{ session('u_pic') }}"></b></a>
                        <!-- <a class="nav-t-user" href=""><b><img src="/Admin/uploads/{{ session('u_pic') }}"></b></a> -->
                        @else
                        <a class="nav-t-user" href="/home/enter"><b class="v-gb-ico"></b></a>
                        @endif
                        <a class="nav-t-menu" href="#"><b class="v-gb-ico"></b></a>
                    </div>
                </div>
            </div>
                          
            <div class="v_h_search v_h_searchq">
                <div class="search-box">
                    <div class="vh-sear-nav">
                        <div class="nav-box">
                            <a class="vh-sear-logo" href="/"></a>
                            <ul class="cl">
                                <li class="input">
                                    <form action='/search' method='get' onsubmit="if ($.trim($(this).find('input.data_q').val()) == '') {alert('请输入关键词'); return false;} return true;"><input type="text" placeholder="如: X6&X6Plus" name='q' class='data_q' autocomplete="off"/></form>
                                </li>
                                <li class="sear-tool"><a class="search v-gb-ico" href="javascript:;"></a><a class="close v-gb-ico" href="#"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="vh-sear-cont">
                        <div class="cont-box">
                            
                        </div>
                    </div>
                </div>
            </div>            
        
            <div id="vivo-high-wrap">
                <div id="vivo-high" data-duration1="8000" data-animate1="fade">
                    <div id="j_HomeBanner" class="home-banner">
                        <ul class="container">
                             @foreach($res as $v)
                             @if($v->i_status == 1 && $v->i_address == '官网首页')
                            <li class="banner-item"  >
                                <div class="structure-module full">
                                    <div class="sm-wrapper">
                                        <img class="j_bgImage" witch='1920' data-ratio="1.92" src="/Admin/uploads/{{ $v->i_image }}" usemap="#Mmodule_1491788834191">  
                                        </div>
                                </div>
                               
                            </li>
                            @endif
                            @endforeach
                        </ul>
                        <div id="j_bannerIndicator" class="indicator"></div>
                        <div class="vivo-h-dot"></div>
                    </div>
                </div>
            </div>

            <div id="vivo-contain">
                <div class="vc-main-promos">
                    <ul>
                        <li class="vc-p-pro">
                            <a href="" target="_blank">
                                <i><img data-x2="//files.vivo.com.cn/static/www/vivo2014/image/f48/3fe40a3c47c4bcae5a65f5583f4ae5f7.jpg" src="/Home/picture/3fe40a3c47c4bcae5a65f5583f4ae5f7_854x480!.jpg" alt="vivo Xplay6库里定制版炫酷来袭"  /></i>
                                <div class="title color-white">
                                    <h2>vivo Xplay6库里定制版炫酷来袭</h2>
                                    <h3></h3>
                                </div>
                            </a>
                        </li>
                        <li class="vc-p-pro">
                            <a href="" target="_blank">
                                <i><img data-x2="//files.vivo.com.cn/static/www/vivo2014/image/d18/3b0ce707bd8e3680a591d585bdabb837.jpg" src="/Home/picture/3b0ce707bd8e3680a591d585bdabb837_854x480!.jpg" alt="库里vivo Xplay6全新最新大片上映"  /></i>
                                <div class="title">
                                    <h2>库里vivo Xplay6全新最新大片上映</h2>
                                    <h3></h3>
                                </div>
                            </a>
                        </li>
                        <li class="vc-p-pro">
                            <a href="" target="_blank">
                                <i><img data-x2="//files.vivo.com.cn/static/www/vivo2014/image/9b8/5ae05cb6f8cf485557de7d413141aafa.jpg" src="/Home/picture/5ae05cb6f8cf485557de7d413141aafa_854x480!.jpg" alt="X9全网通高配版"  /></i>
                                <div class="title color-black">
                                    <h2>X9全网通高配版</h2>
                                    <h3>12期免息购买</h3>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- <div class="vc-main-events vc-ev-media"> -->
                <div class="vc-main-events vc-ev-pic">
                    <h2>活动</h2>
                    <a class="event-morelink v-gb-ico" href="" target="_blank">更多</a>
                    <div class="vc-ev-media-box">
                        <ul class="cl">
                            @foreach($list as $v)
                            @if($v->l_switch == 1 && $v->l_sort == 4)
                            <li class="v_sina">
                                <a href="http://{{ $v->url }}">
                                    <div class="vc-me-mediabox cl">
                                        <div class="figure">
                                            <img data-x2="//files.vivo.com.cn/static/www/vivo2014/image/6a8/1824a8482ddb26fb7aae8bebde60bcb9.jpg" src="/Admin/uploads/{{ $v->l_pic }}" width="125" height="105" alt="{{ $v->l_name }}" />
                                        </div>
                                        <div class="cont">
                                            <h3>{{ $v->l_name }}</h3>
                                            <p>{{ $v->l_title }}</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="vc-main-events vc-ev-text">
                    <h2>新闻</h2>
                    <a class="event-morelink v-gb-ico" href="" target="_blank">更多</a>
                    <div class="vc-ev-media-box">
                        <ul class="cl">
                                
                            @foreach($list as $v)
                            @if($v->l_switch == 1 && $v->l_sort == 3)
                            <li class="v_sina">
                                <a href="http://{{ $v->url }}" target="_blank">
                                    <div class="vc-me-mediabox cl">
                                        <div class="info">
                                            <img data-x2="//files.vivo.com.cn/static/www/vivo2014/image/368/635abd8f5c102f7491f1769c9b43e9f0.jpg" src="/Admin/uploads/{{ $v->l_pic }}" width="100" height="100" alt="{{ $v->l_name }}" />
                                        </div>
                                        <div class="int">
                                            <h3><em>新闻</em>{{ $v->l_name }}</h3>
                                            <p>{{ $v->l_title }}</p>
                                        </div>
                                    </div>
                                   </a>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="vc-main-events vc-ev-media">
                    <div class="vc-ev-media-box">
                        <h2>媒体</h2>
                        <ul class="cl">
                            @foreach($list as $v)
                            @if($v->l_switch == 1 && $v->l_sort == 2)
                            <li class="v_sina">
                                <a href="http://{{ $v->url }}" target="_blank">
                                    <div class="vc-me-mediabox cl">
                                        <div class="figure">
                                            <img data-x2="//files.vivo.com.cn/static/www/vivo2014/image/368/635abd8f5c102f7491f1769c9b43e9f0.jpg" src="/Admin/uploads/{{ $v->l_pic }}" width="125" height="105" alt="{{ $v->l_name }}" />
                                        </div>
                                        <div class="cont">
                                            <h3>{{ $v->l_name }}</h3>
                                            <p>{{ $v->l_title }}</p>
                                        </div>
                                    </div>
                                </a>
                                <strong><a class="v-gb-ico" target="_blank">媒体</a></strong>
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                
                
            </div>
            
            <div id="vivo-foot-wrap">
                <div id="vivo-foot">
                    <div class="vivo-f-logo"><img data-x2="/images/vivo-f-logo-x2.jpg" src="/Admin/uploads/{{ $ob->logo }}" width="125" height="50" /></div>
                    <div class="vivo-f-share">
                        
                    </div>
                    <div class="vf-f-sitelinks">
                        @foreach($list as $v)
                        @if($v->l_switch == 1 && $v->l_sort == 1)
                        <a href="http://{{ $v->url }}/" target="_blank">{{ $v->l_name }}</a>
                        @endif
                        @endforeach
                    </div>
                    <div class="vf-f-copyright">
                        <p>&copy{{ $ob->copy }} <br>ALL RIGHTS RESERVED. <a href="http://www.miitbeian.gov.cn/" target="_blank">{{ $ob->keyword }}</a></p>
                    </div>
                </div>
            </div>

        /</div>
        <script src="{{ asset('./Home/js/jquery.touchswipe.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('./Home/js/modules.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('./Home/js/libs.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('./Home/js/vivo.highlight.fn.min.js') }}" type="text/javascript" ></script>
        <script src="{{ asset('./Home/js/vivo.highlight.animate.min.js') }}" type="text/javascript"></script>

        <script src="{{ asset('./Home/js/jquery.min_6163309.js') }}"></script>
        <script src="{{ asset('./Home/js/jquery.cookie_a5283b2.js') }}"></script>
        <script src="{{ asset('./Home/js/jquery.lazyload_546c1da.js') }}"></script>
        <script src="{{ asset('./Home/js/jquery-placeholder_fb6154c.js') }}"></script>
        <script src="{{ asset('./Home/js/vivo-common_38aa2f0.js') }}"></script>
        <script src="{{ asset('./Home/j') }}s/dialog_6a2b3fb.js') }}"></script>
        <script src="{{ asset('./Home/js/vivo-stat_265b49b.js') }}"></script>
        <script src="{{ asset('./Home/js/login_confirm_485e7b4.js') }}"></script>
        <script src="{{ asset('./Home/js/dialog_6a2b3fb.js') }}"></script>
        <script src="{{ asset('./Home/js/jquery.validate.min_76c74f2.js') }}"></script>
        <script src="{{ asset('./Home/js/index_0f7e03e.js') }}"></script>
        <script src="{{ asset('./Home/js/index_e1bfc47.js') }}"></script>

    </body>
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js') }}?9ef7debb81babe8b94af7f2c274869fd";
            var s = document.getElementsByTagName("script")[0]; 
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</html>
@else
<h2>网站维护中，请稍后登录。。。</h2>
@endif