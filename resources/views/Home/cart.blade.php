@extends('Home.parent')

@section('content')
<div class="wrapper">
    <div class="buy-steps"></div>
</div>
<div class="container">
    <div class="wrapper">
            <div class="prod-list">
                <div class="no-result">
                    <img src="{{ asset('/Home/images/购物车.png') }}">
                    <p class="comment">亲，您的购物车里还没有物品哦，赶紧去<a href="{{ url('home/list') }}">逛逛</a>吧</p>
                </div>
            </div>
    </div>

</div>



@endsection
