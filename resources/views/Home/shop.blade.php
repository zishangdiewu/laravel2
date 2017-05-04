   
 @extends('Home.parent')

@section('content')

    <link href="{{ asset('Home/css/shop/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('Home/css/shop/home_d854362.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('Home/css/shop/prod-list_51dea72.css') }}" rel="stylesheet" type="text/css"/>


    <div id="j_HomeBanner" class="home-banner">
        <ul class="container">
                @foreach($ob as $v)
                <li class="banner-item"  >
                    <a class="banner-link" target="_blank" href="">&nbsp;</a>
                    <div class="structure-module full">
                        <div class="sm-wrapper">
                            <img class="j_bgImage" data-ratio="1.92" src="/Admin/uploads/{{ $v->i_image }}" usemap="#Mmodule_1491788834191">
                            
                        </div>
                    </div>
                </li>
                @endforeach
        </ul>
        <div id="j_bannerIndicator" class="indicator"></div>
    </div>

    <div class="home-content-wrapper">
        <div class="structure-module full">
            <div class="sm-wrapper">
                <img class="j_bgImage" data-ratio="1.92" src="picture/20170409212708894403_original.jpg" usemap="#Mmodule_1491744429568">
                
            </div>
        </div>
        <div class="structure-module full">
            <div class="sm-wrapper">
                <img class="j_bgImage" data-ratio="1.92" src="picture/20170408181631287518_original.jpg" usemap="#Mmodule_1491646634638">
                <map class="j_map" name="Mmodule_1491646634638"><area class="j_link" data-coords="239,68,486,383" coords="458.88,130.56,933.12,735.36" href="https://shop.vivo.com.cn/product/10008" target="_blank"><area class="j_link" data-coords="503,180,588,222" coords="965.76,345.59999999999997,1128.96,426.24" activity-id="39" href="javascript:void(0);"><area class="j_link" data-coords="591,176,691,226" coords="1134.72,337.91999999999996,1326.72,433.91999999999996" href="https://shop.vivo.com.cn/product/10008" target="_blank"></map>
            </div>
        </div>

    </div>

        <div class="container wrapper" >          
            <div class="list-box" style='width:100%;overflow:hidden;'>
                <h2>推荐</h2>
                <ul class="prod-list cl" id='did' style='width:2670px'>
                    @foreach($list as $a)
                    <li class="prod-item " >
                        <a target="_blank" href="/home/detail/{{ $a->g_id }}">
                        <div class="figure">
                            <img src="/Admin/uploads/{{ $a->g_image }}" style="position: relative; top: -6.74729px;">
                        </div>
                        <h3 title="{{ $a->g_title }}">
                        {{ $a->g_title }}
                        </h3>
                        <p class="price">
                            <dfn>¥</dfn>{{ $a->g_price }}
                        </p>
                    </a>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
<script type="text/javascript">
        setInterval(function(){
            //获取最后一张图片，让他的宽度变为0px，把他插入到div的前面，用动画的效果把宽度变成267px
            $("#did li:last").css('width','0px').prependTo('#did').animate({width:'250px'},1000);
        },2000);
    </script>
<script>
    var webCtx = "";
    var passportLoginUrlPrefix = "https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=";
</script>


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
<script src="{{ asset('Home/js/shop/jquery.min_6163309.js') }}"></script>
<script src="{{ asset('Home/js/shop/index_e1bfc47.js') }}"></script>
@endsection