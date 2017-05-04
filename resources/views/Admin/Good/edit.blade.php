@extends('Admin.base.parent')


@section('content')

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"></i>
                <a href="#">admin</a>
            </li>

            <li>
                <a href="#">商品管理</a>
            </li>
            <li class="active">修改商品</li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                修改商品信息
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action="/admin/good/{{ $ob->g_id }}" method='post' name='myform' enctype='multipart/form-data'>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 选择分类 </label>
                        <div class="col-sm-9">
                            <select class="small" title="" name="s_id">
                                @foreach($sort as $v)
                                    @if($ob->s_id == $v->s_upid && $ob->s_upid == $v->s_id)
                                        <option value="{{$ob->s_id}}" selected>{{$v->s_name}}</option>
                                    @else
                                        <option value="{{$v->s_id}}">{{$v->s_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 商品名 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" required class="col-xs-10 col-sm-5" name='g_name' value="{{ $ob->g_name }}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 产品序列号 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name='g_series'required value="{{ $ob->g_series }}"/>
                        </div>
                    </div>

                    <div class="space-4"></div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 价格 (元)</label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" class="col-xs-10 col-sm-5" name='g_price' required value="{{ $ob->g_price }}"/>
                        </div>
                    </div>
<!-- 
                    <div class="space-4"></div>
                 
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 颜色 </label>
                        <div class="col-sm-9">
                            <select name='g_color' >
                            @if($ob->g_color == 1)
                                 <option value='{{ $ob->g_color }}'>流光白</option>
                            @endif
                            @if($ob->g_color == 2)
                                 <option value='{{ $ob->g_color }}'>金色</option>
                            @endif
                            @if($ob->g_color == 3)
                                 <option value='{{ $ob->g_color }}'>玫瑰金</option>
                            @endif
                            @if($ob->g_color == 4)
                                 <option value='{{ $ob->g_color }}'>星空灰</option>
                            @endif
                            @if($ob->g_color == 5)
                                 <option>香槟金</option>
                            @endif
                            @if($ob->g_color == 6)
                                 <option value='{{ $ob->g_color }}'>磨砂黑</option>
                            @endif
                            @if($ob->g_color == 7)
                                 <option>X9磨砂黑</option>
                            @endif
                            @if($ob->g_color == 8)
                                 <option>冠军蓝</option>
                            @endif
                            @if($ob->g_color == 10)
                                 <option>黑色</option>
                            @endif
                            @if($ob->g_color == 11)
                                 <option>红色</option>
                            @endif
                            @if($ob->g_color == 12)
                                 <option>白色</option>
                            @endif
                            @if($ob->g_color == 13)
                                 <option>蓝色</option>
                            @endif
                            @if($ob->g_color == 14)
                                 <option>深空灰</option>
                            @endif
                            @if($ob->g_color == 15)
                                 <option>玫红色</option>
                            @endif
                            @if($ob->g_color == 16)
                                 <option>天青蓝</option>
                            @endif
                            @if($ob->g_color == 17)
                                 <option>透明</option>
                            @endif
                            @if($ob->g_color == 18)
                                 <option>米白</option>
                            @endif
                            @if($ob->g_color == 19)
                                 <option>蔷薇粉</option>
                            @endif
                            </select>
                        </div>
                    </div>     
 -->
                    <div class="space-4"></div>

                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 容量 </label>
                        <div class="col-sm-9">
                            <input type="radio" name='g_capa' value="1" @if($ob->g_capa == 1) checked @endif/>16G
                            <input type="radio" name='g_capa' value="2" @if($ob->g_capa == 2) checked @endif/>32G
                            <input type="radio" name='g_capa' value="3" @if($ob->g_capa == 3) checked @endif/>64G
                            <input type="radio" name='g_capa' value="4" @if($ob->g_capa == 4) checked @endif/>128G
                        </div>
                    </div>     

                    <div class="space-4"></div>

                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 版本 </label>
                        <div class="col-sm-9">
                            <input type="radio" name='g_ver' value="1" @if($ob->g_ver =='1') checked @endif/>全网通
                            <input type="radio" name='g_ver' value="2" @if($ob->g_ver =='2') checked @endif/>移动4G
                            <input type="radio" name='g_ver' value="3" @if($ob->g_ver == '3') checked @endif/>联通4G
                            <input type="radio" name='g_ver' value="4" @if($ob->g_ver == '4') checked @endif/>电信4G
                           
                        </div>
                    </div>     

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 主图片 </label>
                        <div class="col-sm-9">
                            <input type="file" name='g_image' /><img width='120' height='80'src="/Admin/uploads/{{ $ob->g_image }}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 列表图 </label>
                        <div class="col-sm-9">
                        <!-- var_dump($imgs);
                        exit; -->
                            @foreach($imgs as $v)
                            <input type="file" name='g_imgs[]'/><img width='120' height='80'src="/Admin/uploads/{{ $v }}">
                            @endforeach 
                        </div>
                    </div>

                    <div class="space-4"></div>
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 标题 </label>
                        <div class="col-sm-9">
                            <input type="text"required name='g_title' value="{{ $ob->g_title }}" />
                        </div>
                    </div>     

                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 描述 </label>
                        <div class="col-sm-9">
                            <textarea name='g_info' cols='50'required rows='7'style='resize:none'>{{ $ob->g_info }}</textarea>
                        </div>
                    </div>    

                    <div class="space-4"></div>
                        
                    
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 状态 </label>
                        <div class="col-sm-9">
                            <input type="radio" name='g_status' value="1" @if($ob->g_status == 1) checked @endif/>上架
                            <input type="radio" name='g_status' value="2" @if($ob->g_status == 2) checked @endif/>下架
                        </div>
                    </div> 

                    <div class="space-4"></div>
                        
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right"required for="form-field-1"> 是否推荐 </label>
                        <div class="col-sm-9">
                            <input type="radio" name='g_suggest' value="1"  @if($ob->g_suggest == 1) checked @endif/>推荐
                            <input type="radio" name='g_suggest' value="2"  @if($ob->g_suggest == 2) checked @endif/>取消推荐
                        </div>
                    </div>

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                提交
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                重置
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src='{{ asset("js/jquery-1.8.3.min.js") }}'></script>
    <script type="text/javascript">
        // $.ajaxSetup({
        //     headers: {
        //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        //     }
        // });
        // $.ajax({
        //     url:'{{ url("admin/ajax") }}',
        //     type:'get',
        //     async:true,
        //     data:{'s_upid':0},
        //     // dataType:'json',

        //     success:function(data)
        //     {
        //         alert(data);
                // console.log(data);
                //遍历从数据库查出来的数据，生成option选项追加到select里
            //     for (var i = 0; i < data.length; i++) {
            //         $('#sid').append("<option value="+data[i].s_id+">"+data[i].s_name+"</option>");
            //     };
            // },
            // error:function()
            // {
            //     alert('ajax请求失败');
            // }
        });

        //给所有的select标签绑定change事件
       //给所有的select标签绑定change事件
        // $('select').live("change",function(){
        //     //干掉当前你选择的select标签后面的select标签
        //     $(this).nextAll('select').remove();
        //     //判断你选择是不是--请选择--
        //     if($(this).val() != '--请选择--'){
                //因为在ajax的回调函数中需要使用当前对象，但是$(this)在ajax的回调函数中用不了
                // var ob = $(this);
                // $.ajax({
                //     url:'{{ url("admin/ajax") }}',
                //     type:'post',
                //     async:true,
                //     // ,'_token':"{{ csrf_token() }}"
                //     data:{s_upid:$(this).val(),'_token':"{{ csrf_token() }}"},
                //     dataType:'json',
                //     success:function(data)
                //     {
                        // var_dump(data);
                        // console.log(data);
                        //判断是不是最后一级城市，最后一级城市查数据库length==0
                    //     if(data.length>0){
                    //         //生成一个新的select标签
                    //         var select = $("<select name='sort[]'><option>--请选择--</option></select>");
                    //     //     //遍历从数据库查出来的数据，生成option选项追加到select里
                    //         for (var i = 0; i < data.length; i++) {
                    //             $(select).append("<option value="+data[i].s_id+">"+data[i].s_name+"</option>");
                    //         };
                    //     //     //外部插入到前一个select后面
                    //         ob.after(select);
                    //     }
                    // },
                    // error:function()
                    // {
                    //     alert('ajax请求失败');
                    // }
                });
            }
        });
     
    </script>
@endsection
