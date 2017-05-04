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
                <a href="#">评论管理</a>
            </li>
        </ul><!-- .breadcrumb -->
    </div>
    <div class="page-content">
        <div class="page-header">
            <h1>
                评论回复
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->

                <form class="form-horizontal" role="form" action='/admin/comment/{{ $ob->c_id }}' method='post'>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}   
                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 评论内容 </label>
                        <div class="col-sm-9">
                            <input  type="text" class="col-xs-10 col-sm-5" id="form-input-readonly" disabled="" required name='c_content' value='{{ $ob->c_content }}'/>
                        </div>
                    </div>
                    <div class="space-4"></div>

                     <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 回复内容 </label>
                        <div class="col-sm-9">
                            <input  type="text" class="col-xs-10 col-sm-5" id="form-input-readonly"required name='c_reply' value='{{ $ob->c_reply }}'/>
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
