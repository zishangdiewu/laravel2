<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class ConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
        //
        //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('config');
        //判断是否有搜索条件
        if($request->has('title')){
            //获取搜索的条件
            $title = $request->input('title');
            //添加到将要携带到分页中的数组中
            $where['title'] = $title;
            //给查询添加where条件
            $ob->where('title','like',"%{$title}%");
        }
        //执行分页查询
        $list = $ob->paginate(3);
        // dd($list);
        return view('Admin.config.index',['list'=>$list,'where'=>$where]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('Admin.Config.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // 获取上传的图片文件对象
        $dat = $request->file('logo');
        // 若上传则获取后缀名，随机生成图片名
        if($dat != null){
            $ext = $dat->getClientOriginalExtension();
            $fileu_title = time().rand('1000','9999').'.'.$ext;

            // 将图片移入上传文件夹
            $dat->move('./admin/uploads',$fileu_title);
            // 获取所有表单填入数据
            $data = $request->except('_token'); 
            // 将新上传的图片放入表单数据   
            $data['logo'] = $fileu_title;
        }else{
            // 若没有上传图片，则直接添加其他表单项值
             $data = $request->except('_token');
        }
        
        $id = DB::table('config')->insertGetId($data);
        if($id>0){
            return redirect('admin/config')->with('msg','添加成功');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // 获取要修改的内容并显示
        $data = DB::table('config')->where('c_id',$id)->first();
        return view('Admin.Config.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        // 获取要修改的图片对象
        $dat = $request->file('logo');
        // 若有图片上传
        if($dat !== null){
            // 获取图片后缀名，随机产生图片名
            $ext = $dat->getClientOriginalExtension();
            $fileu_title = time().rand('1000','9999').'.'.$ext;
            // 将图片移入上传文件夹
            $dat->move('./admin/uploads',$fileu_title); 
            // 获取所有要修改的内容          
            $data = $request->except('_token','_method');
            // 将修改后的图片放入修改数据集合
            $data['logo'] = $fileu_title;
        }else{
             $data = $request->except('_token','_method');
        }
      // 修改该用户的信息，
        $row = DB::table('config')->where('c_id',$id)->update($data);
        if($row>0){
            return redirect('admin/config')->with('msg','修改成功');
        }else{
            return redirect('admin/config')->with('error','修改失败');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //接收 连接传过的 要删除的ID，执行删除
        $row = DB::table('config')->where('c_id',$id)->delete();
        // 判断是否有删除有则成功返回列表
        if($row>0){
            return redirect('admin/config')->with('msg','删除成功');
        }else{
            return redirect('admin/config')->with('error','删除失败');
        }
    }
}
