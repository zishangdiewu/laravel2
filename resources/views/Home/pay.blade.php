<!DOCTYPE html>
<html><head>
    
<title>vivo收银台</title>
<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
<!-- <link rel="shortcut icon" type="image/x-icon" href="https://pay.vivo.com.cn/webpay/images/favicon.ico"> -->
<!-- <link rel="icon" type="image/x-icon" href="https://pay.vivo.com.cn/webpay/images/favicon.ico"> -->
<link rel="stylesheet" type="text/css" href="{{ url('Home/css/main.css') }}">

<script type="text/javascript" src="{{ url('Home/js/jquery-1.js') }}"></script>

<script type="text/javascript">

function vmallHome(){ //商城主页
    window.location.href="home/index";
}

function myInfoCenter(){ //个人中心
    window.location.href="https://shop.vivo.com.cn/my/";
}

function myOrders(){ //订单中心
    window.location.href="https://shop.vivo.com.cn/my/order/";
}

function helpCenter(){ //帮助中心
    window.open("https://shop.vivo.com.cn/helpcenter/alipay/");
}

function payHelpCenter(){ //支付帮助中心
    window.open("https://shop.vivo.com.cn/helpcenter/alipay/");
}

function exit(){ //退出登录
    window.location.href="https://shop.vivo.com.cn/member/logout";
}
</script>

</head>

<body>
    <div id="head">
        <!--页头登录订单信息-->
        <div class="login-bar">
            <ul class="p-right fr">
                <li style="margin-right: 15px; margin-left: 15px;">vivo欢迎您，<a onclick="myInfoCenter()">{{ session('u_name') }}</a></li>
                <li style="margin-right: 15px; margin-left: 15px;"><a onclick="exit()">退出登录</a></li>
                <li style="margin-right: 15px; margin-left: 15px;"><a onclick="myOrders()">我的订单</a></li>
                <li style="margin-right: 15px; margin-left: 10px;"><a onclick="helpCenter()">帮助中心</a></li>
            </ul>
        </div>
    </div>

    <!--收银台logo-->
    <div class="cash-logo"><div class="w"><img src="{{ url('Home/images/casher-logo.png') }}"></div></div>

    <div class="main w">
        <!--订单基本信息-->
        <div class="order-info clearfix">
            <div class="order-p-right">
            <form action='/home/pay' method='post' >

                <div class="order-info-less clearfix">
                    <div class="order-id fl">
                    
                        <p class="orderid-d">订单提交成功，请您尽快付款！</p>

                        @foreach($ob as $v)
                        <div><p class="orderid-d">订单号：{{ $v->o_number }}</p></div>
                        @endforeach
                        <p class="orderid-cancle">请您在提交订单后<span>72小时</span>内完成支付，否则订单自动会取消。</p>
                    </div>
                    <div class="order-total fr">
                        <p>应付金额<span>{{ $sum }}</span>元</p>
                        <a onclick="">订单详情<div class="triangle"></div></a>
                    </div>
                </div>

                <!--订单详情-->
                <div class="order-details">
                    @foreach($ob as $v)
                    <ul>
                        <li>商品名称：<span class="val">{{ $v->o_title }}  {{ $v->o_color }}  x{{ $v->o_count }}</span></li>
                        <li>交易金额：<span class="val">{{ $v->totalprice }}元</span></li>
                        <li>购买时间：<span class="val">{{ $v->create_time }}</span></li>
                        <li>收&nbsp;货&nbsp;人&nbsp;：<span class="val">{{ $v->o_buyername }}</span></li>
                        <li>联系方式：<span class="val">{{ $v->o_buyerTel }}</span></li>
                        
                        <li>收货地址：<span class="val">{{ $v->o_buyeradress }}</span></li>
                        
                    </ul>
                    @endforeach
                </div>
             </form>
            </div>
        </div>
        
        <form id="payChannelForm" action="/webpay/payorder/channel.oo" method="post">
            
            <input id="tradeOrderNum" name="tradeOrderNum" value="2017041112575724300017398606" type="hidden">
            <input id="payChannel" name="payChannel" value="1" type="hidden">
            <input id="hb_fq_num" name="hb_fq_num" value="" type="hidden">
            <input id="sp" name="sp" value="" type="hidden">
            <input id="eachPrinAndFee" name="eachPrinAndFee" value="" type="hidden">
        </form>
        
        <!--付款方式-->
        <div class="pay-way-outer">
            <!-- <div class="pay-wraper">
                <div class="other-paylist" align='center'>
                <div class="rec-alipay clearfix" >
                    <div class="p-alipay pay-item selected" ordertag="0"><a id="pay-alipay" onclick="changePayChannel(1)">支付宝扫码（推荐）</a></div>
                    <div class="other-pay"><span>其他支付方式</span></div>
                    <div class="order-total">支付<span>¥{{ $sum }}</span>元</div>
                </div>
                <div class="other-paylist" align='center'>
                    <ul class="clearfix">
                        <li class="p-alipay-qr pay-item" ordertag="1"><a id="pay-alipay-qr" onclick="changePayChannel(5)">支付宝</a></li>
                        <li class="p-weixin-qr pay-item" ordertag="2"><a id="pay-weixin-qr" onclick="changePayChannel(2)">支付宝扫码</a></li>
                        <li class="p-cft pay-item" ordertag="3"><a id="pay-cft" onclick="changePayChannel(3)">微信扫码</a></li>
                        <li class="p-yl pay-item" ordertag="4"><a id="pay-yl" onclick="changePayChannel(4)">在线支付</a></li>
                        
                        <li class="p-hb pay-item" ordertag="5"><a id="pay-hb" onclick="changePayChannel(6)">花呗分期</a></li>
                        
                    </ul>
                    
                </div>
            </div> -->
            <div><a href="/home/pp/{{ $v->o_number }}">
                <img  src="/Home/images/pay.jpg"></a>
            </div>
            <div class="pay-btn-wrap clearfix"><a class="pay-btn" onclick="redirectToChannel()">立即支付</a></div>
            
        </div>
    </div>

<div id="overlay">
    <div class="pay-in-progress-wrap">
    <div class="pay-in-progress">
        <div class="close-btn" onclick="closeOverlayDiv()"></div>
        <div class="notice">请您在新打开的支付平台页面进行支付，支付完成前请不要关闭该窗口</div>
        <div class="suc-other-wrap">
            <a class="paysuccess" onclick="myOrders()">已完成支付</a><a class="otherpayment" onclick="chooseOtherPayType()">选择其他支付方式</a>
        </div>
        <a class="paygowrong" onclick="payHelpCenter()" target="_blank">支付遇到问题？</a>
    </div>
    </div>
    
    
    <div class="huabei-block-wrap">
        <div class="huabei-block">
            <div class="close-btn"></div>
            <div class="hb-detail-title">分期购详情</div>
            <div class="hb-total-wrap">
                <span class="hb-total-label">已选分期金额：</span><span id="hb_total_amount" class="hb-total-amount">{{ $sum }}</span>&nbsp;元
                <span class="hb-fq-label">总手续费：</span><span id="hb_fq_amount" class="hb-fq-amount">0</span>&nbsp;元
            </div>
            <div class="fq-option-wrap">
                <ul>
                    
                      <li class="fq-item">
                        <div class="fq-qi">3期</div>
                        <div class="fq-type">¥1499.33 x 3</div>
                        
                        
                          
                          
                             <div class="fq-fee free">免手续费</div>
                          
                          
                        
                        
                        <input name="hbfqNum" value="3" type="hidden">
                        <input name="prinAndFee" value="4498.0" type="hidden">
                        <input name="fee" value="0.0" type="hidden">
                        <input name="esp" value="100" type="hidden">
                        <input name="eachPrinAndFee" value="1499.33" type="hidden">
                      </li>
                    
                      <li class="fq-item">
                        <div class="fq-qi">6期</div>
                        <div class="fq-type">¥749.66 x 6</div>
                        
                        
                          
                          
                             <div class="fq-fee free">免手续费</div>
                          
                          
                        
                        
                        <input name="hbfqNum" value="6" type="hidden">
                        <input name="prinAndFee" value="4498.0" type="hidden">
                        <input name="fee" value="0.0" type="hidden">
                        <input name="esp" value="100" type="hidden">
                        <input name="eachPrinAndFee" value="749.66" type="hidden">
                      </li>
                    
                      <li class="fq-item">
                        <div class="fq-qi">12期</div>
                        <div class="fq-type">¥374.83 x 12</div>
                        
                        
                          
                          
                             <div class="fq-fee free">免手续费</div>
                          
                          
                        
                        
                        <input name="hbfqNum" value="12" type="hidden">
                        <input name="prinAndFee" value="4498.0" type="hidden">
                        <input name="fee" value="0.0" type="hidden">
                        <input name="esp" value="100" type="hidden">
                        <input name="eachPrinAndFee" value="374.83" type="hidden">
                      </li>
                    
                </ul>
            </div>
            <div class="hbfqtip">提示：每期实际支付的手续费以支付宝账单为准</div>
            <div><div class="fq-confirm">确认</div></div>
        </div>
    </div>
    
    
</div>


<div id="footer" class="footer-copyright">
    <div class="copyright">
        COPYRIGHT © 1996-2015 vivo MOBILE COMMUNICATION CO.LTD.ALL RIGHTS RESERVED. 粤ICP备05100288号
    </div>
    <div class="sns-box">
                成为vivo粉丝:<a href="http://weibo.com/vivomobile" target="_blank" class="sina"><b></b></a>
                <a href="http://t.qq.com/vivomobile" target="_blank" class="tencent"><b></b></a>
                <a href="#" class="qzone" style="display:none"><b></b></a>
                <a href="http://page.renren.com/vivo?checked=true" target="_blank" class="renren"><b></b></a>
                <a href="#" class="weixin"><b></b><div class="vivo-weixin-overbox"><b></b></div></a>
    </div>
</div>






<script type="text/javascript">

$(document).ready(function() {
    
    //订单详情展开收起
    $('.order-total a').on('click', function() {
        $this = $(this);
        $orderDetails = $('.order-details');
        if ($this.hasClass("show")) {
            $this.removeClass("show");
            $orderDetails.slideUp();
        } else {
            $this.addClass("show");
            $orderDetails.slideDown();
        }
        $('.order-total a .triangle').toggleClass('up');
    });

    //其他支付方式
    $('.other-pay').on('click', function() {
        $(this).hide();
        $('.other-paylist').show();
    });

    $('.pay-item').on('click', function() {
        $('.pay-item').removeClass("selected");
        $(this).addClass("selected");
        
        var payWay = $(this).attr('ordertag');
        if(payWay != 5){ //花呗分期不需要记录
            $.cookie("lastPayWay", payWay, {
                expires: 90
            })
        }
    });

})

function changePayChannel(payChannel){
    $("#payChannel").val(payChannel);
}

function redirectToChannel(){
    var form = $("#payChannelForm");
    var payChannel = $("#payChannel").val();
    
    if(payChannel==2 ||payChannel==5 ){//微信扫码和支付宝扫码
        form.attr("target", "_self");
        form.submit();
    }else{
        form.attr("target", "_blank");
        form.submit();
        $('#overlay').show();
        $('.pay-in-progress-wrap').show();
    }
}

function finishPayment(){
    $('#overlay').hide();
    $('.pay-in-progress-wrap').hide();
}

function closeOverlayDiv(){
    chooseOtherPayType();
}

function chooseOtherPayType(){
    
    var tradeOrderNum = $("#tradeOrderNum").val();
    var data = {
        "tradeOrderNum": tradeOrderNum
    };
    
    $.ajax({
        url: "/webpay/payorder/checkstatus.oo",
        data: data,
        type: "POST",
        success: function (resultStr) {
            var result = eval('(' + resultStr + ')');
            if (result.code == 200) {
                if (result.success == 1) {
                    //已支付成功,跳转到支付成功界面
                    if (undefined == result.returnUrl || "" == result.returnUrl){
                        window.location = "/webpay/payorder/success.oo?tradeOrderNum="+tradeOrderNum;
                    }else{
                        location.href = result.returnUrl;
                    }
                } else {
                    //待支付,停留在收银台页面
                    $('#overlay').hide();
                }
            } else {
                //处理失败,跳转异常界面
                window.location = "/webpay/casher/exception.jsp";
            }
       }
    });
}

</script>



    <script type="text/javascript">
    $(document).ready(function() {
        
        $('.huabei-block .fq-option-wrap .fq-item').on('click',function(){
            $(this).siblings().removeClass('active');
            $(this).addClass('active');
            
            $('#hb_fq_amount').html($(this).find("input[name='fee']").val());
            $("#hb_fq_num").val($(this).find("input[name='hbfqNum']").val());
            $("#sp").val($(this).find("input[name='esp']").val());
            $("#eachPrinAndFee").val($(this).find("input[name='eachPrinAndFee']").val());
        });
        
        $('.p-hb').on('click',function(){
            $('#overlay').show();
            $('.huabei-block-wrap').show();
            $('.pay-in-progress-wrap').hide();
            
            //如果之前没有选择分期,则默认选择第一种
            var isSelectHbfqItem = 0;
            $('.fq-option-wrap .fq-item').each(function(index,element){
                if($(this).is(".active")){
                    isSelectHbfqItem = 1;
                }
            });
            if(isSelectHbfqItem == 0){
                $('.huabei-block .fq-option-wrap').find('.fq-item:first').addClass('active');
                $('#hb_fq_amount').html($('.huabei-block .fq-option-wrap').find('.fq-item:first').find("input[name='fee']").val());
                $("#hb_fq_num").val($('.huabei-block .fq-option-wrap').find('.fq-item:first').find("input[name='hbfqNum']").val());
                $("#sp").val($('.huabei-block .fq-option-wrap').find('.fq-item:first').find("input[name='esp']").val());
                $("#eachPrinAndFee").val($('.huabei-block .fq-option-wrap').find('.fq-item:first').find("input[name='eachPrinAndFee']").val());
            }
            
        });
    
        $('.huabei-block .close-btn').on('click',function(){
            $('.huabei-block-wrap').hide();
            $('#overlay').hide();
        });
    
        $('.huabei-block .fq-confirm').on('click',function(){
            $('.huabei-block-wrap').hide();
            redirectToChannel();
        });
    })
    </script>








    <script type="text/javascript">
    $(document).ready(function() {
      //默认选择用户上一次选择的支付方式
      var defaultPay = $.cookie("lastPayWay");
      if (defaultPay && defaultPay != 0) {
          $('.pay-item').each(function(index,element){
              if($(this).attr('ordertag') == defaultPay){
                  $('.pay-item').removeClass('selected');
                  $(this).addClass('selected');
                  $(this).find('a').click();
                  
                  $('.other-pay').hide();
                  $('.other-paylist').show();
              }
          })
      }
    })
    </script>





</body></html>