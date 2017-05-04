@extends('Home.parent')

@section('content')
        <input name="pageNavMappingIndex" id="pageNavMappingIndex" value="0" type="hidden">

        <div class="wrapper">
            <div class="crumbs">您的位置:<a class="first" href="home/shop">首页</a><b></b>
                            手机产品
            </div>
        </div>


    <div class="container wrapper">
        <div class="filter">
            <div class="f-line">
                <dl>
                    <dt class="fl-title fl-item">分类：</dt>
                    <dd class="fl-item on"><a href="{{ url('/home/list') }}">全部</a></dd>
                    @foreach ($sort as $v)
                    @if($v->s_upid == 2)
                        <dd class="fl-item "  id='mid' ><a href="/home/st/{{ $v->s_id }}" >{{ $v->s_name }}</a></dd>
                    @endif
                    @endforeach  
                </dl>
            </div>
    <!--         <div class="f-line">
                <dl>
                    <dt class="fl-title fl-item">网络制式：</dt>
                    <dd class="fl-item on">
                        <a href="{{ url('/home/list') }}">全部</a>
                    </dd>
                        
                        <dd class="fl-item "> 

                            <a href="/home/ver/"></a>

                        </dd>
                      
                </dl>
            </div>
                -->
            <div class="f-line sort">
                <dl>
                    <dt class="fl-title fl-item">排序：</dt>
                    <dd class="fl-item on">
                        <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=&amp;hasStore=">默认</a>
                    </dd>
                    <dd class="fl-item ">
                        <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=&amp;sortType=price_asc&amp;hasStore=">价格<i class="icon-sort"></i></a>
                    </dd>
                    <dd class="fl-item ">
                        <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=&amp;sortType=market_time_asc&amp;hasStore=">上架时间<i class="icon-sort"></i></a>
                    </dd>
                    <dd class="fl-item">
                        <a href="https://shop.vivo.com.cn/product/phone?category=&amp;netType=&amp;sortType=&amp;hasStore=1">
                        <i class="icon-checkbox "></i>仅看有货</a>
                    </dd>
                </dl>
            </div>
        </div>
        @if(count($list) > 0) 
        <div class="list-box">                  
            <ul class="prod-list cl">
               @foreach($list as $v)
                <li class="prod-item">
                    <a target="_blank" href="/home/detail/{{ $v->g_id }}">
                    <div class="figure">
                        <img id='mid' src="/Admin/uploads/{{ $v->g_image }}" style="position: relative; top: -6.74729px;">
                    </div>
                    <h3 title="{{ $v->g_title }}">
                    {{ $v->g_title }}
                    </h3>
                    <p class="price">
                        <dfn>¥</dfn>{{ $v->g_price }}
                    </p>
                </a>
                </li>
                @endforeach  
            </ul>  
             {{ $list->appends($where)->links() }}         
        </div>
        @else
         <div class="no-goods">
                <img src="{{ url('Home/images/no-vcoins-icon_8ef9370.png') }}">
                <p>当前没有商品符合筛选条件，请查看全部商品</p>
            </div>
   
        @endif
    </div>
</div>
    <script src="http://www.lanrenzhijia.com/ajaxjs/jquery.min.js"></script>
    <script>
    $(function(){
        $('.list-box li').hover(function(){
            $(this).find('img').stop().animate({
                'margin-left':'-9px',
                'margin-right':'9px'
            })
        },function(){
            $(this).find('img').stop().animate({
                'margin-left':'0',
                'margin-right':'0px'
            })
        })
    })
    </script>
@endsection