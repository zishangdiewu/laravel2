@extends('Home.parent')


@section('content')
    <!-- <link rel="shortcut icon" href="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/favicon_7761e1f.ico"> -->
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
                <b></b>收货地址
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
                @if(session('msg'))
                    <h3 style="color:blue;text-align:center;font-size:30px;">
                        {{ session('msg') }}
                    </h3>   
                @endif
                @if(session('error'))
                     <h3 style="color:red;text-align:center;font-size:30px;">
                        {{ session('error') }}
                    </h3>
                @endif

                <dl>
                    <dt class="module-title cl">
                        
                        @if($i == null)
                            <?php $i=0; ?>
                        @endif
                        <p class="left">已有<strong>{{ $i }}</strong>收货地址<span class="small">（最多可添加10个收货地址）</span></p>
                        <p class="right"><span class="add">添加收货地址</span><a class="add-icon-open" href="/home/site/create"></a></p>
                    </dt>
                    @if($a == 2)
                    <dd>
                        <p>编辑收货地址</p>
                        <form  method="post" action="/home/site/{{ $data->id }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}   
                            <fieldset>
                                <table>
                                    <tbody>
                                    <tr>
                                        <th>
                                            <strong>*</strong>收货地区
                                        </th>
                                       
                                        <td>
                                         @foreach($data->city1 as $v)
                                            <select id='cid' name='city1[]'>
                                                <option value='{{ $v->id }}' selected>{{ $v->name }}</option>
                                            </select>
                                        @endforeach 
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <strong>*</strong>详细地址
                                        </th>
                                        <td>
                                            <input name="address" id="address" type="text" value="{{ $data->address }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <strong>*</strong>收货人姓名
                                        </th>
                                        <td>
                                            <input name="buyername" id="receiverName" type="text" value="{{ $data->buyername }}">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <strong>*</strong>手机
                                        </th>
                                        <td>
                                            <div>
                                                <input name="buyerTel" id="mobilePhone" type="tel" value="{{ $data->buyerTel }}">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <input value="确认" style="text-align:center;width:80px;height:25px;background:#f3f3f3;" type="submit">
                                            <input value="取消" style="text-align:center;width:80px;height:25px;background:#f3f3f3;" type="reset">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </form>
                    </dd>
                    @elseif($a == 1)
                    <dd>
                        <p>添加收货地址</p>

                        <form  method="post" action="/home/site">
                        <input type="hidden" name='uid' value="{{ session('u_id')  }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <table>
                                    <tbody>
                                    <tr>
                                        <th>
                                            <strong>*</strong>收货地区
                                        </th>
                                        <td>
                                            <select id='cid' name='city1[]'>
                                                <option>--请选择--</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <strong>*</strong>详细地址
                                        </th>
                                        <td>
                                            <input name="buyeradress" id="address" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <strong>*</strong>收货人姓名
                                        </th>
                                        <td>
                                            <input name="buyername" id="receiverName" type="text">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>
                                            <strong>*</strong>手机
                                        </th>
                                        <td class="phone">
                                            <div>
                                                <input name="buyerTel" id="mobilePhone" type="tel">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <input value="确认" style="text-align:center;width:80px;height:25px;background:#f3f3f3;" type="submit">
                                            <input value="取消" style="text-align:center;width:80px;height:25px;background:#f3f3f3;" type="reset">
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </fieldset>
                        </form>
                    </dd>

                   
                    @elseif(count($list) != 0)
                        <dd class="address-box">
                        <table class="common">
                            <thead>
                                <tr>
                                    <th class="address">地址</th>
                                    <th class="name">收货人</th>
                                    <th class="phone">联系电话</th>
                                    <th class="operation">操作</th>
                                </tr>
                            </thead> 
                            <form action="/home/site" method='post' name='myform'>
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                            </form>
                            @foreach($list as $v)
                                <tbody>
                                    <tr class="address-info">
                                        <td>
                                            <span name="address.province">{{ $v->buyeradress }}</span>
                                        </td>
                                        <td>
                                            <span name="address.receiverName">{{ $v->buyername }}</span>
                                        </td>
                                        <td>
                                            <span name="address.mobilePhone">{{ $v->buyerTel }}</span>
                                        </td>
                                        <td>
                                            <a href="/home/site/{{ $v->id }}/edit">编辑</a>
                                            <span>|</span>
                                            <a href="javascript:doDel({{ $v->id }})">删除</a>
                                            <span>|</span>
                                            @if($v->default == 1)
                                            <button class="default-address hover  select-address">默认地址</button>
                                            @else
                                           <a href="/home/adress/{{ $v->id }}"><button>默认地址</button></a> 
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                                <script type="text/javascript">
                                      function doDel(id){
                                            if(confirm('确定删除吗？')){
                                                var form = document.myform;
                                                form.action = '/home/site/'+id;
                                                form.submit();
                                            }
                                        }
                                </script>            
                            @endforeach
                        </table>
                        </dd>
                    @else
                    <dd class="address-box">
                            <table class="common">
                                <tbody>
                                    <tr>
                                        <td class="no-record no-address" colspan="5">
                                            <img src="{{ asset('/Home/images/订单地址.png') }}">
                                            <span>您还没有收货地址</span>
                                        </td>
                                    </tr>    
                                </tbody>                     
                            </table>
                        </dd>
                    @endif
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
<script type="text/javascript">
 
    $.ajax({
        url:'{{url("home/sites/get")}}',
        type:'get',
        async:true,
        data:{upid:0},
        dataType:'json',
        success:function(data)
            {
                
                // console.log(data);
                // alert(data);
                //遍历从数据库查出来的数据，生成option选项追加到select里
                for (var i = 0; i < data.length; i++) {
                    $('#cid').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                };
            },
        error:function()
        {
        }
    });

    //给所有的select标签绑定change事件
    $('select').live("change",function(){
        //干掉当前你选择的select标签后面的select标签
        $(this).nextAll('select').remove();
        //判断你选择是不是--请选择--
        if($(this).val() != '--请选择--'){
            //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
            var ob = $(this);
            $.ajax({
                url:'{{url("home/sitess/post")}}',
                type:'post',
                async:true,
                data:{upid:$(this).val(),'_token':"{{ csrf_token() }}"},
                dataType:'json',
                success:function(data)
                {
                    // alert(data);
                    // console.log(data);
                    //判断是不是最后一级城市，最后一级城市查数据库length==0
                    if(data.length>0){
                        //生成一个新的select标签
                        var select = $("<select name='city1[]'><option>--请选择--</option></select>");
                        //遍历从数据库查出来的数据，生成option选项追加到select里
                        for (var i = 0; i < data.length; i++) {
                            $(select).append("<option value="+data[i].id+">"+data[i].name+"</option>");
                        };
                        //外部插入到前一个select后面
                        ob.after(select);
                    }
                },
                error:function()
                {
                    
                }
            });
        }
    });
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

<div style="height: 0px; width: 0px; overflow: hidden;"><object tabindex="-1" style="height:0;width:0;overflow:hidden;" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab" id="JSocket" width="0" height="0"><param name="allowScriptAccess" value="always"><param name="movie" value="http://aeu.alicdn.com/flash/JSocket.swf"> <embed src="%E6%94%B6%E8%B4%A7%E5%9C%B0%E5%9D%80_files/JSocket.swf" name="JSocket" allowscriptaccess="always" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer_cn" width="0" height="0"></object></div><div id="waf_nc_block" style="display: none;"><div class="waf-nc-mask"></div><div id="WAF_NC_WRAPPER" class="waf-nc-wrapper"><img class="waf-nc-icon" src="%E6%94%B6%E8%B4%A7%E5%9C%B0%E5%9D%80_files/TB1_3FrKVXXXXbdXXXXXXXXXXXX-129-128.png" alt="" width="20" height="20"><p class="waf-nc-title">安全验证</p><div class="waf-nc-splitter"></div><p class="waf-nc-description">请完成以下验证后继续操作：</p><div id="nocaptcha"></div></div></div></body></html>

  @endsection
