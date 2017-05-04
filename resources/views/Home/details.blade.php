
@extends('Home.parent')


@section('content')
   <!--  <link href="{{ asset('/Home/details/css/global_79a0974.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/details/css/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/details/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">


    <link href="{{ asset('/Home/details/css/prod-detail_a0bd3da.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/details/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css"> -->
    <style>
        .no_store{background:#ccc;border:1px solid #ccc;}
        em{font-style: italic}
    </style>

        <script src="%E6%89%8B%E6%9C%BA%E8%AF%A6%E6%83%85_files/hm.txt" async=""></script><script type="text/javascript" src="{{ asset('/Home/details/jd/065f0df8c3a79510e698e5de40c8fb71.js') }}"></script><!--[if lt IE 9]>
        <script src="https://swsdl.vivo.com.cn/vivoshop/web/dist/js/bower_components/html5shiv/dist/html5shiv.min_23e126e.js"></script>
        <![endif]-->

        <div class="wrapper">
            <div class="crumbs">您的位置:<a class="first" href="https://shop.vivo.com.cn/index.html">首页</a>
                <b></b>
                <a href="https://shop.vivo.com.cn/product/phone">手机产品</a>
                <b></b>
                @if($list->s_id  == 22)
                <span>Xplay系列</span>
                @elseif( $list->s_id  == 23)
                <span>X系列</span>
                @elseif( $list->s_id  == 24)
                <span>Y系列</span>
                @elseif( $list->s_id  == 25)
                <span>V系列</span>
                @elseif( $list->s_id  == 26)
                <span>其他</span>
                @endif

               
            </div>
        </div>
        <div class="prod-container">
            <div class="wrapper">
                <div class="prod-container-top cl">
                    <div class="prod-container-left">
                        <div id="j_SpecImgs" class="figure">
                            <ul id="bigImgUl">
                                <li style="display: block; opacity: 1; z-index: 9;"><img src="/Admin/uploads/{{ $list->g_image }}" alt="商品图片"></li>
                                @foreach($imgs as $v)
                                <li style="z-index: 1; opacity: 0; display: none;"><img src="/Admin/uploads/{{ $v }}" alt="商品图片"></li>
                                @endforeach
                            </ul>
                        </div>
                        <div id="j_SpecItems" class="spec-items">
                            <ul class="cl" id="smallImgUl">
                                <li class="current"><a href="javascript:;"><img src="/Admin/uploads/{{ $list->g_image }}"></a></li>
                                @foreach($imgs as $v)
                                <li><a href="javascript:;"><img src="/Admin/uploads/{{ $v }}"></a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="favor">
                            <ul class="cl">
                                <li class="collect"><a id="j_CollectTrigger" href="javascript:;">收藏商品（<span id="favCount">471</span>人收藏）</a></li>
                                <li class="share" id="J_Share">分享
                                    <div class="share-box hidden">
                                        <a title="分享到新浪微博" target="_blank" href="http://service.t.sina.com.cn/share/share.php?title=%E3%80%90%E3%80%90%E9%99%90%E9%87%8F%E9%A2%84%E5%AE%9A%E3%80%91Xplay6%E5%BA%93%E9%87%8C%E5%AE%9A%E5%88%B6%E7%89%88%E3%80%91%EF%BC%8C%E9%94%80%E5%94%AE%E4%BB%B7:%20%C2%A54998.00%EF%BC%88%E6%9D%A5%E8%87%AAvivo%E5%AE%98%E6%96%B9%E5%95%86%E5%9F%8E%EF%BC%89%E3%80%82&amp;url=https://shop.vivo.com.cn/product/10008&amp;pic=https://swsdl.vivo.com.cn/vivoshop/commodity/84/4284_1491785523827hd_530x530.png?1442932368#h" class="sina"><b></b></a>
                                        <a title="分享到腾讯微博" target="_blank" href="http://v.t.qq.com/share/share.php?title=%E3%80%90%E3%80%90%E9%99%90%E9%87%8F%E9%A2%84%E5%AE%9A%E3%80%91Xplay6%E5%BA%93%E9%87%8C%E5%AE%9A%E5%88%B6%E7%89%88%E3%80%91%EF%BC%8C%E9%94%80%E5%94%AE%E4%BB%B7:%20%C2%A54998.00%EF%BC%88%E6%9D%A5%E8%87%AAvivo%E5%AE%98%E6%96%B9%E5%95%86%E5%9F%8E%EF%BC%89%E3%80%82&amp;url=https://shop.vivo.com.cn/product/10008&amp;pic=https://swsdl.vivo.com.cn/vivoshop/commodity/84/4284_1491785523827hd_530x530.png?1442932368#h" class="tencent"><b></b></a>
                                        <a id="j_shareToRenren" title="分享到人人网" target="_blank" href="http://widget.renren.com/dialog/share?resourceUrl=https://shop.vivo.com.cn/product/10008;srcUrl=https://shop.vivo.com.cn/&amp;title=%E3%80%90%E3%80%90%E9%99%90%E9%87%8F%E9%A2%84%E5%AE%9A%E3%80%91Xplay6%E5%BA%93%E9%87%8C%E5%AE%9A%E5%88%B6%E7%89%88%E3%80%91%EF%BC%8C%E9%94%80%E5%94%AE%E4%BB%B7:%20%C2%A54998.00%EF%BC%88%E6%9D%A5%E8%87%AAvivo%E5%AE%98%E6%96%B9%E5%95%86%E5%9F%8E%EF%BC%89%E3%80%82&amp;pic=https://swsdl.vivo.com.cn/vivoshop/commodity/84/4284_1491785523827hd_530x530.png?1442932368#h" class="renren"><b></b></a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="prod-container-right">
                        <h1>{{ $list->g_title }}</h1>
                        <small class="promotion-words">{{ $list->g_info }}</small>
                        <ul class="summary-price">
                            <li>
                                <span class="now-price"><dfn>¥</dfn>{{ $list->g_price }}</span>
                            </li>
                            <li>
                                <div class="table-cell"><span class="label">V币</span></div>
                                <div class="table-cell">购买即送{{ $list->g_price }}V币</div>
                            </li>
                        </ul>
                        <form id="prod-detail-form" method="post" action="/home/ct">
                            {{ csrf_field() }}
                            <input type='hidden' name='g_id' value="{{ $list->g_id }}">
                        <dl class="prod-params cl" id="j_colors" marketable="1">
                            <dt>版本：</dt>
                            <dd>
                                <ul class="tags nettype-tags">
                                        
                                        @if($list->g_ver ==1)
                                        <li >全网通<i></i></li>
                                        @elseif($list->g_ver ==2)
                                        <li >移动4G<i></i></li>
                                        @elseif($list->g_ver ==3)
                                        <li >联通4G<i></i></li>
                                        @endif
                                </ul>
                            </dd>
                            <dt>容量：</dt>
                            <dd>
                                <ul class="tags storage-tags">
                                    @if($list->g_capa ==1)
                                        <li >16G<i></i></li>
                                    @endif
                                    @if($list->g_capa ==2)
                                        <li style="background-color:red">32G<i></i></li>
                                    @endif
                                    @if($list->g_capa ==3)
                                        <li style="background-color:#F2F2F2;">64G</li>
                                    @endif  
                                    @if($list->g_capa ==4)
                                        <li >128G<i></i></li>
                                    @endif
                                    
                                </ul>
                            </dd>                       
  <!--                           <dt>颜色：</dt>
                            <dd>
                                <ul class="tags color-box" spuinstallment="1">
                                    @if($list->g_color == 1)
                                         <li ><a class="color-002060" style="background: #002060" href="javascript:;"></a>流光白<i></i></li>
                                    @endif
                                    @if($list->g_color == 2)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>金色<i></i></li>
                                    @endif
                                    @if($list->g_color == 3)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>玫瑰金<i></i></li>
                                    @endif
                                    @if($list->g_color == 4)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>星空灰<i></i></li>
                                    @endif
                                    @if($list->g_color == 5)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>香槟金<i></i></li>
                                    @endif
                                    @if($list->g_color == 6)
                                        <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>磨砂黑<i></i></li>
                                    @endif
                                    @if($list->g_color == 7)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>X9磨砂黑<i></i></li>
                                    @endif
                                    @if($list->g_color == 8)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>冠军蓝<i></i></li>
                                    @endif
                                    @if($list->g_color == 10)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>黑色<i></i></li>
                                    @endif
                                    @if($list->g_color == 11)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>红色<i></i></li>
                                    @endif
                                    @if($list->g_color == 12)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>白色<i></i></li>
                                    @endif
                                    @if($list->g_color == 13)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>蓝色<i></i></li>
                                    @endif
                                    @if($list->g_color == 14)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>深空灰<i></i></li>
                                    @endif
                                    @if($list->g_color == 15)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>玫红色<i></i></li>
                                    @endif
                                    @if($list->g_color == 16)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>天青蓝<i></i></li>
                                    @endif
                                    @if($list->g_color == 17)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>透明<i></i></li>
                                    @endif
                                    @if($list->g_color == 18)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>米白<i></i></li>
                                    @endif
                                    @if($list->g_color == 19)
                                         <li><a class="color-002060" style="background: #002060" href="javascript:;"></a>蔷薇粉<i></i></li>
                                    @endif
                                </ul>
                            </dd> -->
                            <dt>数量：</dt>
                            <dd class="order-num">
                                <label id="dec" class="disabled">-</label>
                                <input id="add-num" maxlength="1" value="1" type="text" name="num">
                                <label id="inc">+</label>
                                <small class="order-num-msg" id="order-num-msg">(仅限购3部)</small>
                            </dd>
                            <dt id="installment_dt">支持分期付款：</dt>
                            <dd id="j_installment" class="installment">
                                <div class="installment-label">花呗分期最低价</div><div class="installment-price blue" id="min-perpay"><dfn>¥</dfn>{{ $list->g_price/12}}*12期</div><label class="btn-show-more">更多</label>
                                <div class="installment-popup">
                                    <div class="popup-container">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <th width="25%">每期金额</th>
                                                    <th width="20%">期数</th>
                                                    <th>手续费</th>
                                                </tr>
                                            </tbody>
                                            <tbody id="installment-tbd">
                                                <tr>
                                                    <td class="red"><dfn>¥</dfn>{{ $list->g_price/3 }}</td> <td>3期</td> <td>共计约<dfn>¥</dfn>{{ $list->g_price}} 含0%手续费</td>
                                                </tr>
                                                <tr>
                                                    <td class="red"><dfn>¥</dfn>{{ $list->g_price/6 }}</td> <td>6期</td> <td>共计约<dfn>¥</dfn>{{ $list->g_price}} 含0%手续费</td>
                                                </tr>
                                                <tr>
                                                    <td class="red"><dfn>¥</dfn>{{ $list->g_price/12}}</td> <td>12期</td> <td>共计约<dfn>¥</dfn>{{ $list->g_price}} 含0%手续费</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <div class="info-tip">此处仅查看，请在收银台选择分期方案</div>
                                    </div>
                                    <i class="icon-close"></i>
                                </div>
                            </dd>
                        </dl>
                        <div class="btns">
                            <button class="btn-next J_buy-button btn-appointment payall-order" type='submit' title="立即购买">立即购买</button>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="prod-main-info" style="padding-top: 61px;">
            <div class="prod-main-tab fixed">
                <div class="prod-tab-box">
                   <button class="btn-next btn-appointment payall-order" type="submit" title="立即购买" style="display: block;">立即购买</button>
                </form>
                    <div class="thumb-goods cl" style="display: block;">
                        <div class="figure">
                                <li> <img id="j_smallPic" src="/Admin/uploads/{{ $list->g_image }}" width="45" height="45"></li>
                        </div>
                        <h3 title="【限量预定】Xplay6库里定制版">{{ $list->g_title }}</h3>
                        <span>￥{{ $list->g_price }}</span>
                    </div>                
                    <ul>
                        <li class="tab-parameter" v="parameter"><a href="#">参数<b></b></a></li>
                        <li class="tab-evaluate" v="evaluate"><a href="#">评价<span> ( 0 ) </span><b></b></a></li>
                    </ul>
                </div>
            </div>
            
            <div class="prod-main-box">
                <div class="prod-main-parameter" style="display: block;">
                    <div class="prod-parameter-box">
                        <ul>
                            <li class="c"><h4>CPU</h4><p>高通骁龙MSM8996/骁龙820</p></li>
                            <li><h4>系统</h4><p>Funtouch OS 3.0(基于Android 6.0.1)</p></li>
                            <li class="c"><h4>屏幕尺寸</h4><p>5.46英寸</p></li>
                            <li><h4>屏幕分辨率</h4><p>2560*1440</p></li>
                            <li class="c"><h4>PPI</h4><p>537</p></li>
                            <li><h4>机身厚度</h4><p>8.25mm</p></li>
                            <li class="c"><h4>电池</h4><p>一体式内置电池</p></li>
                            <li><h4>容量</h4><p>4080mAh</p></li>
                            <li><h4>连接支持</h4><p>wifi、蓝牙4.2、USB2.0、GPS定位、OTG</p></li>
                            <li class="c"><h4>功能特色</h4><p>全曲面设计，后置双摄，专业虚化，4080mAh大电池+双引擎闪充，分屏多任务，应用分身</p></li>
                            <li><h4>摄像头类型</h4><p>前后摄像，后置双摄</p></li>
                            <li class="c"><h4>摄像头</h4><p>前置1600W/后置（1200W+500W），全像素双核对焦(2PD)</p></li>
                            <li><h4>视频拍摄</h4><p>支持</p></li>
                            <li class="c"><h4>包装清单</h4> <p> <br>主机 *1 <br>取卡针 *1 <br>有线耳机 *1<br>9V2.0A闪充充电头 *1<br>micro USB数据线<br>保护壳 *2<br>快速入门指南 *1<br>重要信息和保修卡</p></li>
                        </ul>
                    </div>
                </div>
                <div class="prod-main-evaluate" style="display: block;"><div class="wrapper">
                    <table class="evaluate-summary-table">
                        <colgroup>
                            <col width="140">
                            <col width="100">
                            <col width="150">
                            <col>
                            <col width="200">
                            <col width="110">
                            <col width="230">
                        </colgroup>
                        <tbody>
                            <tr>
                                <th class="title" rowspan="2">商品评分</th>
                                <th class="total-points" rowspan="2">4.7</th>
                                <td class="total-stars"><span class="star-box"><i style="width: 94%"></i></span></td>
                                <th>综合评分</th>
                                <td class="small-stars"><span class="star-box"><i style="width: 94%"></i></span>4.7</td>
                                <th>卖家的服务态度</th>
                                <td class="small-stars"><span class="star-box"><i style="width: 94%"></i></span>4.7</td>
                            </tr>
                            <tr>
                                <td class="evaluater-num"><span class="yellow">737</span>人评分</td>
                                <th>宝贝与描述相符</th>
                                <td class="small-stars"><span class="star-box"><i style="width: 96%"></i></span>4.8</td>
                                <th>卖家的发货速度</th>
                                <td class="small-stars"><span class="star-box"><i style="width: 94%"></i></span>4.7</td>
                            </tr>
                            <tr>
                                <th class="btn-box" colspan="7">您可以对已购买的产品进行评价 
                                    <form action="/home/comment/{{ $list->g_id }}/edit" method="get">
                                        <button type="submit" class="btn-evaluator">我要评价</button>
                                    </form>
                                </th>
                            </tr>
                        </tbody>
                    </table>
                <div class="prod-evaluate-box cl">
                    <div class="evaluate-toolbar cl">
                        <ul class="cl">
                            <li><a id="allRemarkChecked" class="current" href="javascript:void(0);"><b></b></a>
                                <p>全部</p></li>
                                <li><a id="onlyPicChecked" href="javascript:void(0);"><b></b></a>
                                    <p>图片</p></li>
                        </ul>
                    </div>
                    <div class="evaluate-grid">
                        <ul>
                            @foreach($data  as $k => $v)
                            <li class="cl">
                                <div class="evaluate-left">
                                    <div class="figure">
                                            <img src="/Admin/uploads/{{ $comment[$k]->u_pic }}">
                                    </div>
                                    <h3>{{ $comment[$k]->u_name }}</h3>

                                </div>
                                <div class="evaluate-right">
                                    <ul>
                                        <li class="top cl">
                                            <div class="date pull-left">{{ $v->c_time }}</div>
                                            <div class="stars pull-right"><span class="star-box"><i style="width:{{ $v->c_star }}%"></i></span>
                                            </div>
                                        </li>

                                        <li class="evaluate">
                                            <p>{{ $v->c_content }}</p>
                                        </li>
                                        @if($v->c_reply != null)
                                        <li class="evaluate">
                                            <p style='color:red'>老板回复：{{ $v->c_reply }}</p>
                                        </li>
                                        @endif

                                    </ul>
                                    <i></i>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                </div>
            </div>
                <div class="prod-main-evaluation" style="display: none;">
                    <div class="section">
                    </div>
                </div>
            <div class="prod-main-afterservice" style="display: none;">
                <div class="prod-afterservice-box wrapper">
                    <ul class="cl">
                        <li class="return">
                            <b></b>
                            <h3>30天无理由退换货</h3>
                            </p>
                        </li>
                        <li class="b1">
                            <b></b>
                            <h3>退机服务</h3>
                        </li>
                        <li class="b3">
                            <b></b>
                            <h3>换机服务</h3>
                        </li>
                        <li class="b2">
                            <b></b>
                            <h3>全国联网三包服务</h3>
                        </li>
                        <li class="b5">
                            <b></b>
                            <h3>vivo售后服务点查询</h3>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

<script>
    var webCtx = "";
    var passportLoginUrlPrefix = "https://passport.vivo.com.cn/v3/web/login/authorize?client_id=3&redirect_uri=";
</script>
<script src="{{ asset('/Home/details/js/jquery.js') }}"></script>
<script src="{{ asset('/Home/details/js/jquery_003.js') }}"></script>
<script src="{{ asset('/Home/details/js/jquery_002.js') }}"></script>
<script src="{{ asset('/Home/details/js/jquery-placeholder_fb6154c.js') }}"></script>
<script src="{{ asset('/Home/details/js/vivo-common_38aa2f0.js') }}"></script>
<script src="{{ asset('/Home/details/js/dialog_6a2b3fb.js') }}"></script>
<script src="{{ asset('/Home/details/js/vivo-stat_265b49b.js') }}"></script>
<script src="{{ asset('/Home/details/js/login_confirm_485e7b4.js') }}"></script>
<script>
    var imgHost = "https://swsdl.vivo.com.cn/vivoshop/";
    var skuImageJsonStr = '([{"bigPic":"commodity/84/4284_1491785523827hd_530x530.png","hdPic":"commodity/84/4284_1491785523827hd_1080x1080.png","imageNo":"1491785523827hd","imageType":"","skuId":"4284","smallPic":"commodity/84/4284_1491785523827hd_250x250.png","thumbnailPic":"commodity/84/4284_1491785523827hd_100x100.png"},{"bigPic":"commodity/84/4284_1491785524840hd_530x530.png","hdPic":"commodity/84/4284_1491785524840hd_1080x1080.png","imageNo":"1491785524840hd","imageType":"","skuId":"4284","smallPic":"commodity/84/4284_1491785524840hd_250x250.png","thumbnailPic":"commodity/84/4284_1491785524840hd_100x100.png"},{"bigPic":"commodity/84/4284_1491785525569hd_530x530.png","hdPic":"commodity/84/4284_1491785525569hd_1080x1080.png","imageNo":"1491785525569hd","imageType":"","skuId":"4284","smallPic":"commodity/84/4284_1491785525569hd_250x250.png","thumbnailPic":"commodity/84/4284_1491785525569hd_100x100.png"},{"bigPic":"commodity/84/4284_1491785526284hd_530x530.png","hdPic":"commodity/84/4284_1491785526284hd_1080x1080.png","imageNo":"1491785526284hd","imageType":"","skuId":"4284","smallPic":"commodity/84/4284_1491785526284hd_250x250.png","thumbnailPic":"commodity/84/4284_1491785526284hd_100x100.png"}])';
    var skuImageJson = eval(skuImageJsonStr);
    var fullpaySkuIdSet = "4284";
    var spuInstallment = "1";
    var isSecondBuy = false;
    var maxNumberPerUser = 3;
</script>
<script src="{{ asset('/Home/details/js/simpleStorage_f115cd4.js') }}"></script>
<script src="{{ asset('/Home/details/js/view_cbc6422.js') }}"></script>
<script src="{{ asset('/Home/details/js/view-hist_823c137.js') }}"></script>
<script src="{{ asset('/Home/details/js/dialog_6a2b3fb.js') }}" type="text/javascript"></script>

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


        <div style="height: 0px; width: 0px; overflow: hidden;">     
            <object tabindex="-1" style="height:0;width:0;overflow:hidden;" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
            codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" id="JSocket" width="0" height="0">
                <param name="allowScriptAccess" value="always"><param name="movie" value="https://aeu.alicdn.com/flash/JSocket.swf"> 
                <embed src="%E6%89%8B%E6%9C%BA%E8%AF%A6%E6%83%85_files/JSocket.swf" name="JSocket" allowscriptaccess="always"
                type="application/x-shockwave-flash" pluginspage="https://www.adobe.com/go/getflashplayer_cn" width="0" height="0">
            </object>
        </div>
        <div id="waf_nc_block" style="display: none;">     
            <div class="waf-nc-mask"></div>
            <div id="WAF_NC_WRAPPER" class="waf-nc-wrapper">     
                <img class="waf-nc-icon" src="%E6%89%8B%E6%9C%BA%E8%AF%A6%E6%83%85_files/TB1_3FrKVXXXXbdXXXXXXXXXXXX-129-128.png" alt="" width="20"
                height="20">
                <p class="waf-nc-title">安全验证</p>
                <div class="waf-nc-splitter"></div>
                <p class="waf-nc-description">请完成以下验证后继续操作：</p>     
                <div id="nocaptcha"></div>
            </div> 
        </div> 
  @endsection
