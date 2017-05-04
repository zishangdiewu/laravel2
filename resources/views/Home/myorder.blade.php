@extends('Home.parent')

@section('content')
    <!-- <link rel="shortcut icon" href="https://swsdl.vivo.com.cn/vivoshop/web/dist/img/favicon_7761e1f.ico"> -->

    <link href="{{ asset('/Home/css/global_79a0974.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/layout_3a0d4d9.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('/Home/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">


    <link href="{{ asset('/Home/css/member-center_3bb3bfe.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/Home/css/dialog_523c50b.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/Home/css/buy-process_e40c238.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/Home/css/member-order_70818b2.css') }}" rel="stylesheet" type="text/css">
<link href="{{ asset('/Home/css/huiyi8.css') }}" rel="stylesheet" type="text/css">

<div class="wrapper">
<div class="crumbs">您的位置：<a href="https://shop.vivo.com.cn/index.html">首页</a><b></b><a href="https://shop.vivo.com.cn/my/">会员中心</a><b></b>我的订单</div>
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
        <li class="vcoin-info">我的V币：<a href=""><span class="red member-vcoin-number">0</span></a> V币</li>
    </ul>
    <dl id="j_MyCenterMenus" class="menu">

        <dd class="menu-item on"><a href="/home/mo">我的订单</a></dd>
        <dt class="menu-title"><i class="icon-evaluation"></i>评价管理</dt>
        <dd class="menu-item"><a href="/home/comment">我的评论</a></dd>
        <dt class="menu-title"><i class="icon-account"></i>我的账户</dt>
        <dd class="menu-item"><a href="/home/user">个人资料</a></dd>
        <dd class="menu-item "><a href="/home/userpass">修改密码</a></dd>
        <dt class="menu-title"><i class="icon-deal"></i>地址管理</dt>
        <dd class="menu-item"><a href="/home/site">我的地址</a></dd>
    </dl>
</aside>    
<article class="content">
<form action='/home/mo' methos='get'>
{{ csrf_field() }}

</form>
<dl id="member-order-list">
    <dt class="module-title">我的订单</dt>
    <dd class="module-item">
        <ul class="statistic-tags"  id='tags'>
            <li >全部</li>
            <li>待付款({{ $list1->where('o_manage',1)->count() }})</li>
            <li>待发货({{ $list2->where('o_manage',2)->count() }})</li>
            <li>待收货({{ $list3->where('o_manage',3)->count() }})</li>
            <li>已完成({{ $list4->where('o_manage',4)->count() }})</li>
        </ul>
     
        <div class="list-caption">
            <div class="col col0">商品</div>
            <div class="col col1">数量</div>
            <div class="col col2">价格</div>
            <div class="col col3">状态</div>
            <div class="col col4">操作</div>
        </div>


            <script src="{{ asset('Home/js/jquery-1.8.3.min.js') }}" type="text/javascript"></script>
            
            <script>
            $(document).ready(function(){

                $("#tags li").click(function(){
                    // alert(123);
                   // var lis = document.getElementById("tags").getElementsByTagName("li");
                   // var tables = document.getElementById("tab").getElementsByTagName("table");

                   // alert(tables.length);
                   // 获取tags中 li的集合
                    var lis=$("#tags li");
                    // alert(lis.length);
                    // 获取tab 下的table 集合
                    // var tables=$("#tab table");
                    // alert(tables);
                   // alert(tables.length);
                   // 确定点击第几个li
                    var count=$(this).index();
                  // alert(count)
                  // $("#tab #table").css("display","block");
                   // $("#tab").css("display","");
                  switch(count){
                    case 0:
                        $("#tab  div").css("display","block");
                    break;
                    case 1:
                        $("#tab #table1").css("display","block").siblings().css("display","none");
                    break;
                    // 代发货
                    case 2:
                        $("#tab #table2").css("display","block").siblings().css("display","none");
                    break;
                    // 待收货
                    case 3:
                        $("#tab #table3").css("display","block").siblings().css("display","none");
                    break;
                    // 交易完成
                    case 4:
                        $("#tab #table4").css("display","block").siblings().css("display","none");
                    break;
                  }
                   
                          // tables.eq(count).css("display","block");
                          // tables.eq(count).siblings().css("display","none");

                })
            })
       
            </script>
        <div id='tab'>
           
           <!-- 待付款订单   待付款-->
            <div id='table1'>
                @foreach($list1 as $v1)   
                <table class="order-table" >
                    <colgroup>
                        <col width="155">
                        <col>
                        <col class="col1">
                        <col class="col2">
                        <col class="col3">
                        <col class="col4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th colspan="6" class="order-title">
                            <ul>
                                <li class="order-number">订单号：<a href="">{{ $v1->o_number }}</a>
                                </li>
                                <li class="order-time">成交时间:
                                    {{ $v1->create_time }}
                                </li>
                            </ul>
                        </th>
                    </tr>
                    </tbody>

                    <tbody>
                    <tr class="order-line">
                        <td colspan="4">
                            <table class="order-sub-table">
                                <colgroup>
                                    <col width="155">
                                    <col>
                                    <col class="col1">
                                    <col class="col2">
                                </colgroup>
                                <tr class="prod-line">
                                    <td class="prod-pic">
                                        <a class="figure" href="" target="_blank"><img src="/Admin/uploads/{{ $v1->o_image }}" alt=""></a>
                                    </td>
                                    <td colspan="3">
                                        <table class="prods-info-table">
                                            <colgroup>
                                                <col width="80">
                                                <col>
                                                <col width="66">
                                                <col width="108">
                                            </colgroup>
                                            <tr class="prod-info">
                                                <td class="prod-name" colspan="2">
                                                    <a href="" target="_blank" title="{{ $v1->o_title }}">{{ $v1->o_title }}</a> <br><br>
                                                </td>
                                                <td>{{ $v1->o_count }}</td>
                                                <td>
                                                        {{ $v1->o_price }}
                                                </td>
                                            </tr>
                                                <tr class="empty-line">
                                                    
                                                </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="status">待付款</td>
                        <td class="operation">
                            <ul>
                                <li><a href="/home/look/{{ $v1->o_id }}">查看订单</a></li>
                                <li><a class="link-cancel btn-href" href='javascript:doDel({{ $v1->o_id }})'  ordertype="01">取消订单</a></li>
                            </ul>
                        </td>
                    </tr>
                    <form action='/home/mo' method='post' name='myform'>
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                   
                    </form>
                    <tr class="operation-line">
                        <td colspan="6">
                            总计：<span class="red">
                                <dfn>¥</dfn>{{$v1->totalprice }}
                               </span>
                            (含运费：<dfn>¥</dfn>0.00
                            优惠：
                            <dfn>¥</dfn>0.00
                            )
                            <form action='/home/pa/{{ $v1->o_id }}' method='post'>
                            {{ csrf_field() }}
                            <!-- <input type='hidden' name='o_number' value="{{ $v1->o_id }}"> -->
                            <button type="submit" class="btn btn-confirm btn-highlight"  >去结算</button>
                            </form>
                        </td>
                    </tr>
                

                    </tbody>
                </table>
                @endforeach
            </div>
            <!-- 待收货     待收货 -->
            <div id='table2'>
                @foreach($list2 as $v2)   
                <table class="order-table" >
                    <colgroup>
                        <col width="155">
                        <col>
                        <col class="col1">
                        <col class="col2">
                        <col class="col3">
                        <col class="col4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th colspan="6" class="order-title">
                            <ul>
                                <li class="order-number">订单号：<a href="">{{ $v2->o_number }}</a>
                                </li>
                                <li class="order-time">成交时间:
                                    {{ $v2->create_time }}
                                </li>
                            </ul>
                        </th>
                    </tr>
                    </tbody>

                    <tbody>
                    <tr class="order-line">
                        <td colspan="4">
                            <table class="order-sub-table">
                                <colgroup>
                                    <col width="155">
                                    <col>
                                    <col class="col1">
                                    <col class="col2">
                                </colgroup>
                                <tr class="prod-line">
                                    <td class="prod-pic">
                                        <a class="figure" href="" target="_blank"><img src="/Admin/uploads/{{ $v2->o_image }}" alt=""></a>
                                    </td>
                                    <td colspan="3">
                                        <table class="prods-info-table">
                                            <colgroup>
                                                <col width="80">
                                                <col>
                                                <col width="66">
                                                <col width="108">
                                            </colgroup>
                                            <tr class="prod-info">
                                                <td class="prod-name" colspan="2">
                                                    <a href="" target="_blank" title="Xplay6 全网通【旗舰精品】">{{ $v2->o_title }}</a> <br><br>
                                                </td>
                                                <td>{{ $v2->o_count }}</td>
                                                <td>
                                                        {{ $v2->o_price }}
                                                </td>
                                            </tr>
                                                <tr class="empty-line">
                                                    
                                                </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        @if($v2->o_manage == 2)
                        <td class="status">待发货</td>
                        @elseif($v2->o_manage == 3)
                        <td class="status">已发货</td>
                        @endif
                        
                        <td class="operation">
                            <ul>
                                <li><a href="/home/look/{{ $v2->o_id }}">查看订单</a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="operation-line">
                        <td colspan="6">
                            总计：<span class="red">
                                <dfn>¥</dfn>{{$v2->totalprice }}
                               </span>
                            (含运费：<dfn>¥</dfn>0.00
                            优惠：
                            <dfn>¥</dfn>0.00
                            )
                        </td>
                    </tr>
                    </tbody>
                </table>
                @endforeach
            </div>
          
            <!-- 已关闭  已关闭 -->
             <div id='table3'>
                 @foreach($list3 as $v3)   
                <table class="order-table" >
                    <colgroup>
                        <col width="155">
                        <col>
                        <col class="col1">
                        <col class="col2">
                        <col class="col3">
                        <col class="col4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th colspan="6" class="order-title">
                            <ul>
                                <li class="order-number">订单号：<a href="">{{ $v3->o_number }}</a>
                                </li>
                                <li class="order-time">成交时间:
                                    {{ $v3->create_time }}
                                </li>
                            </ul>
                        </th>
                    </tr>
                    </tbody>

                    <tbody>
                    <tr class="order-line">
                        <td colspan="4">
                            <table class="order-sub-table">
                                <colgroup>
                                    <col width="155">
                                    <col>
                                    <col class="col1">
                                    <col class="col2">
                                </colgroup>
                                <tr class="prod-line">
                                    <td class="prod-pic">
                                        <a class="figure" href="" target="_blank"><img src="/Admin/uploads/{{ $v3->o_image }}" alt=""></a>
                                    </td>
                                    <td colspan="3">
                                        <table class="prods-info-table">
                                            <colgroup>
                                                <col width="80">
                                                <col>
                                                <col width="66">
                                                <col width="108">
                                            </colgroup>
                                            <tr class="prod-info">
                                                <td class="prod-name" colspan="2">
                                                    <a href="" target="_blank" title="{{ $v3->o_title }}">{{ $v3->o_title }}</a> <br><br>
                                                </td>
                                                <td>{{ $v3->o_count }}</td>
                                                <td>
                                                        {{ $v3->o_price }}
                                                </td>
                                            </tr>
                                                <tr class="empty-line">
                                                    
                                                </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="status">已发货</td>
                        <td class="operation">
                            <ul>
                                <li><a href="/home/mo/{{ $v3->o_id }}">收货</a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="operation-line">
                        <td colspan="6">
                            总计：<span class="red">
                                <dfn>¥</dfn>{{ $v3->totalprice }}
                               </span>
                            (含运费：<dfn>¥</dfn>0.00
                            优惠：
                            <dfn>¥</dfn>0.00
                            )
                    </tr>
                    </tbody>
                </table>
                @endforeach
            </div>
            <div id='table4'>
                 @foreach($list4 as $v4)   
                <table class="order-table" >
                    <colgroup>
                        <col width="155">
                        <col>
                        <col class="col1">
                        <col class="col2">
                        <col class="col3">
                        <col class="col4">
                    </colgroup>
                    <tbody>
                    <tr>
                        <th colspan="6" class="order-title">
                            <ul>
                                <li class="order-number">订单号：<a href="">{{ $v4->o_number }}</a>
                                </li>
                                <li class="order-time">成交时间:
                                    {{ $v4->create_time }}
                                </li>
                            </ul>
                        </th>
                    </tr>
                    </tbody>

                    <tbody>
                    <tr class="order-line">
                        <td colspan="4">
                            <table class="order-sub-table">
                                <colgroup>
                                    <col width="155">
                                    <col>
                                    <col class="col1">
                                    <col class="col2">
                                </colgroup>
                                <tr class="prod-line">
                                    <td class="prod-pic">
                                        <a class="figure" href="" target="_blank"><img src="/Admin/uploads/{{ $v4->o_image }}" alt=""></a>
                                    </td>
                                    <td colspan="3">
                                        <table class="prods-info-table">
                                            <colgroup>
                                                <col width="80">
                                                <col>
                                                <col width="66">
                                                <col width="108">
                                            </colgroup>
                                            <tr class="prod-info">
                                                <td class="prod-name" colspan="2">
                                                    <a href="" target="_blank" title="{{ $v4->o_title }}">{{ $v4->o_title }}</a> <br><br>
                                                </td>
                                                <td>{{ $v4->o_count }}</td>
                                                <td>
                                                        {{ $v4->o_price }}
                                                </td>
                                            </tr>
                                                <tr class="empty-line">
                                                    
                                                </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td class="status">交易已完成</td>
                        <td class="operation">
                            <ul>
                                <li><a href="/home/look/{{ $v4->o_id }}">查看订单</a></li>
                            </ul>
                        </td>
                    </tr>
                    <tr class="operation-line">
                        <td colspan="6">
                            总计：<span class="red">
                                <dfn>¥</dfn>{{ $v4->totalprice }}
                               </span>
                            (含运费：<dfn>¥</dfn>0.00
                            优惠：
                            <dfn>¥</dfn>0.00
                            )
                    </tr>
                    </tbody>
                </table>
                @endforeach
            </div>





        </div>
       
       
      
    </dd>
</dl>

<div>
    <form id="orderPayform" method="post"></form>
</div>


<div class="span12 clearfix">

</div>
    </article>
</div>
<script type="text/javascript">
      function doDel(id){
            if(confirm('确定删除吗？')){
                var form = document.myform;
                form.action = 'mo/'+id;
                form.submit();
            }
        }
</script> 
@endsection



