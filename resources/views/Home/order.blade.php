@extends('Home.parent')

@section('content')
<!--  <link href="Home/css/global_79a0974.css" rel="stylesheet" type="text/css">
<link href="Home/css/buy-process_e40c238.css" rel="stylesheet" type="text/css"> -->

        @if(session('msg'))
            <div class="alert alert-success alert-icon">
            {{ session('msg') }}
            <i class="icon"></i>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-warning alert-icon">
            {{ session('error') }}
            <i class="icon"></i>
            </div>
        @endif
    <div class="wrapper">
        <!--购物车购买流程展示进度条 -->
        <div class="buy-steps no-spcart step1"></div>
    </div>
    <input id="buyMode" value="2" type="hidden">
    <input id="requestUuid" value="51fd42e681964b2ea536e7459cedfe55" type="hidden">

    <div class="container">
        <div class="wrapper">
       
            <dl class="module-list">
                <dt class="module-title">收货人信息</dt>
                    <div class="Caddress">
                        <div class="open_new">
                            <button class="open_btn" onclick="javascript:onclick_open();">使用新地址</button>
                        </div>
                        @foreach($data as $v)
                        <div class="add_mi">
                            <div><input type="hidden" name = 'id' value="{{ $v->id }}" ></div>
                            <p class='user' style="border-bottom:1px dashed #ccc;line-height:28px;">{{ $v->buyername }}</p>
                            <p >{{ $v->buyerTel }} </p>
                            <p class='address'>{{ $v->buyeradress }} </p>
                        </div>
                        @endforeach        
                    </div>
                </dt> 
            </dl> 
              <div class="shade_content">
            <div class="col-xs-12 shade_colse">
                <button onclick="javascript:onclick_close();">x</button>
            </div>
            <div class="nav shade_content_div">
                <div class="col-xs-12 shade_title">
                    新增收货地址
                </div>
                <div class="col-xs-12 shade_from">
                    <form action="/home/order" method="post">
                    {{ csrf_field() }}
                    
                        <div class="col-xs-12">
                            <span class="span_style" class="span_sty" id="">地区</span>
                             <select class="select_style" id='cid' name='city1[]' >
                                <option>--请选择--</option>
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <span class="span_style" class="span_sty" id="">详细地址</span>
                            <input class="input_style" type="text" name="buyeradress" id="name_" value="" placeholder="&nbsp;&nbsp;请输入详细地址" />
                        </div>
                        <div class="col-xs-12">
                            <span class="span_style" class="span_sty" id="">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名</span>
                            <input class="input_style" type="text" name="buyername" id="name_" value="" placeholder="&nbsp;&nbsp;请输入您的姓名" />
                        </div>
                        <div class="col-xs-12">
                            <span class="span_style" id="">手机号码</span>
                            <input class="input_style" type="text" name="buyerTel" id="phone" value="" placeholder="&nbsp;&nbsp;请输入您的手机号码" />
                        </div>
                        <div class="col-xs-12">
                            <input class="btn_remove" type="submit" id="" onclick="javascript:onclick_close();" value="取消" />
                            <input type="submit" class="sub_set" id="sub_setID" value="提交" />
                        </div>
                    </form>
                </div>
            </div>
        </div> 
           
            <!-- 商品信息  -->
            <form action='/home/pay' method='post'>
            {{ csrf_field() }}
            <input type="hidden" name = 'id' value="@if(isset($v->id)) {{ $v->id }} @else 0 @endif " >

                <div class="shopping_content">
                    <div class="shopping_table">
                        <table border="1" bordercolor="#cccccc" cellspacing="0" cellpadding="0" style="width: 100%; text-align: center;">
                            <tr>
                                <th width='180' height='220'>商品图片</th>
                                <th>商品名称</th>
                                <th>价格(元)</th>
                                <th>商品数量</th>
                                <th>优惠</th>
                                <th>赠送V币</th>
                                <th>小计(元)</th>
                                <th>商品操作</th>
                            </tr>
                          
                            @foreach($ob as $a)
                            <input type="hidden" name='ca_id[]' value="{{ $a->ca_id }}">
                            <tr>
                                <td>
                                    <a><img width='150' height='200' src="/Admin/uploads/{{ $a->ca_image }}
                                    " /></a>
                                </td>
                                <td>
                                    <div>
                                        <span>{{ $a->ca_title }}
                                        </span>
                                    </div>
                                    <div>
                                        <span >颜色</span>：{{ $a->ca_color }}<span>
                                        </span>
                                    </div>
                                </td>
                                <td>
                                    <span class="span_momey">{{ $a->ca_price }}
                                    </span>
                                </td>
                                <td>
                                    <span>{{ $a->ca_num }}
                                    </span>
                                </td>
                                <td>
                                    <span>00.00
                                    </span>
                                </td>
                                 <td>
                                    <span>{{ $a->totprice }}
                                    </span>
                                </td>
                                <td>
                                    <span>{{ $a->totprice }}
                                    </span>
                                </td>
                                <td>
                                    <a  href="javascript:doDel({{ $a->ca_id }})">删除</a>
                                </td>
                            </tr>
                            @endforeach                   
                        </table>
                    </div>
                </div>
                  <div class="order-info-box cl">
                        <ul>
                            <li class="order-remark cl">
                                <div class="info-box">
                                    <label><i></i>订单备注：</label>
                                    <textarea id="order-memo" class="tta-order-remark" placeholder="限300字（若有特殊需求，请联系商城在线客服）" rows="1" name='o_meno'></textarea>
                                </div>
                            </li>
                        </ul>
                        <div class="other-info right-box pull-right">
                            <ul>
                                <li class="order-sum"><label>商品:&nbsp;&nbsp;<em class="red">{{ $snum }}</em>件
                                   
                                </li>
                                <li class="order-sum"><label>优惠：</label><span class="red">-<dfn>¥</dfn><span id="privilege">0.00</span></span>
                                </li>
                                <li class="order-sum"><label>运费：</label><span class="red"><dfn>¥</dfn><span id="postAmount">0.00</span></span></li>
                            </ul>
                        </div>
                    </div>
                <dt class="real-price-box">
                    <ul class="delivery-address" id='res'>
                        <li class="item">
                            <label>地址：</label><span id="receivePerson"></span></li>
                        <li class="item receiver-name"><label>收件人：</label><span id="receiveAddress"></span>
                        </li>
                    </ul>
                     
                </dt>
               
                <div class="btn-box">
                     <label>应付总额</label><span  class="real-price red"><dfn>¥</dfn>{{ $sum }}
                        </span>
                    <button id="btn-submit-order" class="btn-confirm" title="提交订单">提交订单</button>
                </div>
            </form>           
        </div>
    </div>
    <form action='/home/ct' name='myform' method='post'>
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                
    </form>

    <!--content end -->
    <script type="text/javascript" src='{{ asset("Home/js/jquery-1.8.3.min.js") }}'></script>
   <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url:'{{ url("/home/ajaxo") }}',
            type:'get',
            async:true,
            data:{'upid':0},
            dataType:'json',

            success:function(data)
            {
                // alert(data);
                // console.log(data);
                // 遍历从数据库查出来的数据，生成option选项追加到select里
                for (var i = 0; i < data.length; i++) {
                    $('#cid').append("<option value="+data[i].id+">"+data[i].name+"</option>");
                };
            },
            error:function()
            {
                alert('ajax请求失败');
            }
        });

        // 给所有的select标签绑定change事件
       // 给所有的select标签绑定change事件
        $('select').live("change",function(){
            //干掉当前你选择的select标签后面的select标签
            $(this).nextAll('select').remove();
            //判断你选择是不是--请选择--
            if($(this).val() != '--请选择--'){
                //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
                var ob = $(this);
                $.ajax({
                    url:'{{ url("/home/ajaxo") }}',
                    type:'post',
                    async:true,
                    // ,'_token':"{{ csrf_token() }}"
                    data:{'upid':$(this).val(),'_token':"{{ csrf_token() }}"},
                    dataType:'json',
                    success:function(data)
                    {
                        // var_dump(data);
                        // console.log(data);
                        //判断是不是最后一级城市，最后一级城市查数据库length==0
                        if(data.length>0){
                            //生成一个新的select标签
                            var select = $("<select name='city1[]'><option>--请选择--</option></select>");
                        //     //遍历从数据库查出来的数据，生成option选项追加到select里
                            for (var i = 0; i < data.length; i++) {
                                $(select).append("<option value="+data[i].id+">"+data[i].name+"</option>");
                            };
                        //     //外部插入到前一个select后面
                            ob.after(select);
                        }
                    },
                    error:function()
                    {
                        alert('ajax请求失败');
                    }
                });
            }
        });
     
    </script>
    <script type="text/javascript">
        
            $(function() {
                var region = $("#region");
                var address = $("#address");
                var number_this = $("#number_this");
                var name = $("#name_");
                var phone = $("#phone");
                $("#sub_setID").click(function() {
                    var input_out = $(".input_style");
                    for (var i = 0; i <= input_out.length; i++) {
                        if ($(input_out[i]).val() == "") {
                            $(input_out[i]).css("border", "1px solid red");
                            
                            return false;
                        } else {
                            $(input_out[i]).css("border", "1px solid #cccccc");
                        }
                    }
                });
                var span_momey = $(".span_momey");
                var b = 0;
                for (var i = 0; i < span_momey.length; i++) {
                    b += parseFloat($(span_momey[i]).html());
                }
                $(".shade_content").hide();
                $(".shade").hide();
                $('.nav_mini ul li').hover(function() {
                    $(this).find('.two_nav').show(100);
                }, function() {
                    $(this).find('.two_nav').hide(100);
                })
                $('.left_nav').hover(function() {
                    $(this).find('.nav_mini').show(100);
                }, function() {
                    $(this).find('.nav_mini').hide(100);
                })
                $('#jia').click(function() {
                    $('input[name=num]').val(parseInt($('input[name=num]').val()) + 1);
                })
                $('#jian').click(function() {
                    $('input[name=num]').val(parseInt($('input[name=num]').val()) - 1);
                })
                $('.Caddress .add_mi').click(function() {
                    // 给点击实行添加选中属性
                    $(this).toggleClass('selected').siblings().removeClass('selected');
                    // 添加效果
                    $(this).css('background', 'url("images/mail_1.jpg") no-repeat').siblings('.add_mi').css('background', 'url("images/mail.jpg") no-repeat')
                   // 通过选中属性实现 数据迁移
                    var user = $('.selected .user').text();
                    $('#receiveAddress').text(user);
                    var address = $('.selected .address').text();
                    $('#receivePerson').text(address);
                });
            })

            // 打开新增地址
            function onclick_open() {
                $(".shade_content").show();
                $(".shade").show();
                var input_out = $(".input_style");
                for (var i = 0; i <= input_out.length; i++) {
                    if ($(input_out[i]).val() != "") {
                        $(input_out[i]).val("");
                    }
                }
            }
            // 删除商品及数据库中商品
             function doDel(id){
                if(confirm('确定删除吗？')){
                    var form = document.myform;
                    form.action = 'ct/'+id;
                    form.submit();
                }
            }

           
            // 关闭添加地址
            function onclick_close() {
                var shade_content = $(".shade_content");
                var shade = $(".shade");
                if (confirm("确认关闭么！此操作不可恢复")) {
                    shade_content.hide();
                    shade.hide();
                }
            }
        </script>


@endsection
