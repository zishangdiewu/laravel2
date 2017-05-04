@extends('Home.parent')

@section('content')

<div class="container">
    <div class="wrapper">
            <div class="prod-list">
                <div class="no-result">
                    
                    <div class="fl">
                        <h2 class="title" style="padding-top:10px;">交易完成~ 谢谢.您的光临</h2>
                        <h4><em id="asd">5</em>s之后自动跳转回<a href="/home/mo">我的订单</a></h4>
                        </div>
                </div>
            </div>
    </div>

</div>
<script>
var n = 0;
var asd = document.getElementById('asd');
setInterval(function(){
    n++;
    asd.innerHTML = 5-n;
    if(n==5){
        window.location.href = '/home/mo';
    }
},1000)
</script>

@endsection
