@extends('Home.parent')

@section('content')

        <input name="pageNavMappingIndex" id="pageNavMappingIndex" value="0" type="hidden">

        <div class="wrapper">
            <div class="crumbs">您的位置:<a class="first" href="https://shop.vivo.com.cn/index.html">首页</a><b></b>
                            配件产品
            </div>
        </div>


    <div class="container wrapper">
        <div class="filter">
            <div class="f-line">
                <dl>
                    <dt class="fl-title fl-item">分类：</dt>
                    <dd class="fl-item on"><a href="{{ url('home/parts') }}">全部</a></dd>
                    @foreach ($sort as $v)
                    @if($v->s_upid == 1)
                        <dd class="fl-item "><a href="/home/pt/{{ $v->s_id }}">{{ $v->s_name }}</a></dd>
                    @endif
                    @endforeach  
                </dl>
            </div>
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
     
        <div class="list-box">

            
            <ul class="prod-list cl">
               @foreach($list as $v)
                <li class="prod-item ">
                    <a target="_blank" href="/home/detail/{{ $v->g_id }}">
                    <div class="figure">
                        <img src="/Admin/uploads/{{ $v->g_image }}" style="position: relative; top: -6.74729px;">
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

        </div>
        {{ $list->appends($where)->links() }}
    </div>
</div>
@endsection