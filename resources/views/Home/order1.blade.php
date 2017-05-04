@extends('Home.parent')


@section('content')
     <!-- <link href="{{ asset('Home/css/morder/global_79a0974.css') }}" rel="stylesheet" type="text/css"> -->
    <!-- <link href="{{ asset('Home/css/morder/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css"> -->
    <link href="{{ asset('Home/css/morder/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">


    <link href="{{ asset('Home/css/morder/member-center_3bb3bfe.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Home/css/morder/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Home/css/morder/buy-process_e40c238.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('Home/css/morder/member-order-detail_3f39f1e.css') }}" rel="stylesheet" type="text/css">
    <!-- // <script src="%E6%94%B6%E8%B4%A7%E5%9C%B0%E5%9D%80_files/hm.txt" async=""></script> -->
   <!--  // <script type="text/javascript" src="{{ asset('Home/js/065f0df8c3a79510e698e5de40c8fb71.js') }}"></script> -->
   


        <div class="wrapper">
            <div class="crumbs">
                您的位置：
                <a href="http://shop.vivo.com.cn/index.html">首页</a>
                <b></b>
                <a href="http://shop.vivo.com.cn/my/">会员中心</a>
                <b></b>订单详情
            </div>
        </div>
        <div class="wrapper">
            <aside class="menu-bar">
                <ul class="portrait-box">
                    <li>
                        <a href="http://shop.vivo.com.cn/my/information" title="编辑资料">
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
                    <dd class="menu-item "><a href="/home/userpass">修改密码</a></dd>
                    <dt class="menu-title"><i class="icon-deal"></i>地址管理</dt>
                    <dd class="menu-item on"><a href="/home/site">我的地址</a></dd>
                </dl>
            </aside>    
            <article class="content">
<dl>
    <dd class="module-item">
<!-- 
            <div class="order-closed">
                <img src="%E8%AE%A2%E5%8D%95%E8%AF%A6%E6%83%85_files/icon-warning_76e3890.png">

                <h2>订单已关闭</h2>

                <ul class="delivery-records">
                        <li>
                            <label>2017-04-21 00:14:49</label><label> 您提交的订单已经创建成功</label>
                        </li>
                        <li>
                            <label>2017-04-24 00:15:00</label><label> 订单已关闭。原因：超时系统关闭订单</label>
                        </li>
                </ul>
            </div> -->

        <div class="order-module order-overview">
            <h2 class="title">订单基本信息</h2>
            @foreach($ob as $v)
            <ul>
                <li class="overview-item">订单号：{{ $v->o_number }}</li>
                <li class="overview-item">订单金额：<span class="red"><dfn>¥</dfn>{{ $v->totalprice }}</span></li>
               
                @if($v->o_manage == 1)
                <li class="overview-item">订单状态：待付款</li>
                @elseif($v->o_manage == 2)
                <li class="overview-item">订单状态：待发货</li>
                @elseif($v->o_manage == 4)
                <li class="overview-item">订单状态：已完成</li>
                @endif
            </ul>
            @endforeach
            <div class="operation-box">
            </div>
        </div>

        <div class="order-module receiver-info">
            <h2 class="title">收货信息</h2>
            @foreach($add as $a)
            <ul>
                <li>收货人：{{ $a->buyername }}</li>
                <li>手机：{{ $a->buyerTel }}</li>
                <li>收货地址：{{ $a->buyeradress }}</li>
            </ul>
            @endforeach
        </div>
        <div class="order-module ">
            <h2 class="title">商品清单和结算信息</h2>
            <table  cellpadding="0" width='900' border='1' style="text-align: center"> 
             
                <tr>
                    <th width="155"></th>
                    <th width='300'>商品名称</th>
                    <th width="95">价格(元)</th>
                    <th width="66">数量</th>
                    <th width="95">优惠</th>
                    <th width="95">赠送V币</th>
                    <th width="95">小计(元)</th>
                </tr>
                @foreach($ob as $v)
                <tr>
                    <td><img width='100' height='90' src='/Admin/uploads/{{ $v->o_image }}'></td>
                    <td>{{ $v->o_title }}</td>
                    <td>{{ $v->o_price }}</td>
                    <td>{{ $v->o_count }}</td>
                    <td>00.00</td>
                    <td>{{ $v->totalprice }}</td>
                    <td>{{ $v->totalprice }}</td>

                </tr>
                <tr>
                    <td colspan="3">
                        <div class="left-box pull-left">
                            <ul>
                                <li class="order-remark cl">
                                    <div class="info-box">
                                        <label>订单备注：</label>{{ $v->o_meno }}
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </td>
                    
                    <td colspan="4">
                        <div class="right-box pull-right">
                            <ul>
                                <li class="order-sum">商品总金额：<label><span class="price"><dfn>¥</dfn>{{ $v->totalprice }}</span></label></li>
                                <li class="order-sum">运费：<label><span class="red"><dfn>¥</dfn>0.00</span></label></li>
                                <li class="order-sum">优惠：<label><span class="red">-<dfn>¥</dfn>0.00</span></label>
                                </li>
                                <li class="order-sum">总计：<label><span class="price red"><dfn>¥</dfn>{{ $v->totalprice }}</span></label></li>

                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>

            <!-- <div class="order-info-box cl">
                <div class="left-box pull-left">
                    <ul>
                        <li class="coupon-info cl">
                            <div class="info-box">
                                <label>订单优惠：</label><span class="red">【包邮】</span>订单满68元免运费
                            </div>
                        </li>
                        <li class="order-remark cl">
                            <div class="info-box">
                                <label>订单备注：</label>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="right-box pull-right">
                    <ul>
                        <li class="order-sum">商品总金额：<label><span class="price"><dfn>¥</dfn>2798.00</span></label></li>
                        <li class="order-sum">运费：<label><span class="red"><dfn>¥</dfn>0.00</span></label></li>
                        <li class="order-sum">优惠：<label><span class="red">-<dfn>¥</dfn>0.00</span></label>
                        </li>
                        <li class="order-sum">总计：<label><span class="price red"><dfn>¥</dfn>2798.00</span></label></li>

                    </ul>
                </div>
            </div> -->
        </div>

        <form id="orderPayform" method="post"></form>
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
