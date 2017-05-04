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
                商品信息
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <form class="form-horizontal" role="form" action='/admin/image/{{ $ob->i_id }}' method='post' name='myform' enctype='multipart/form-data'>
                <!-- <input type="hidden" name='s_id' value=0> -->
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                   
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 轮播图位置 </label>
                        <div class="col-sm-9">{{ $ob->i_address }}
                           <!-- {{ ($ob->i_address) ==1 ?'官网首页':'商城首页' }} -->
                            <!-- @if(($ob->i_address) == 1)
                                官网首页
                            @endif
                            @if(($ob->i_address) == 2)
                                商城首页
                            @endif
                            @if($ob->i_address == 3)
                                明星单品
                            @endif -->
                        </div>
                    </div>  
 
                    <div class="space-4"></div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 图片 </label>
                        <div class="col-sm-9">
                            <input type="file" name='i_image'/>
                            <img weight='60' height="60" src="/Admin/uploads/{{ $ob->i_image }}">
                           
                        </div>
                    </div>
                    <div class="space-4"></div>

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

@endsection
