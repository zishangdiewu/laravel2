@extends('Admin.base.parent')


@section('content')

    <div class="breadcrumbs" id="breadcrumbs">
        <script type="text/javascript">
            try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
        </script>

        <ul class="breadcrumb">
            <li>
                <i class="icon-home home-icon"> admin</i>              
            </li>
            <li>
                <a href="#">分类管理</a>
            </li>
            <li class="active">添加分类</li>
        </ul>
    </div>

    <div class="page-content">
        <div class="page-header">
            <h1>
                添加分类
            </h1>
        </div><!-- /.page-header -->

        <div class="row">
            <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal" role="form" action="{{ url('/admin/sortSon') }}" method='post'>
                    {{ csrf_field() }}  
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 父级名 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" disabled="" class="col-xs-10 col-sm-5" value="{{ $list->s_name }}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> 子级名 </label>
                        <div class="col-sm-9">
                            <input type="text" id="form-field-1" placeholder="请输入子类名" required class="col-xs-10 col-sm-5" name='s_name' />
                        </div>
                    </div>
                        <input type="hidden" name='s_upid' value="{{ $list->s_id }}">                   
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
