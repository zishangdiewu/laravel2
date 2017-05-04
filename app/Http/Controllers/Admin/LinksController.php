<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class LinksController extends Controller
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
        $ob = DB::table('links');
        //判断是否有搜索条件
        if($request->has('l_name')){
            //获取搜索的条件
            $name = $request->input('l_name');
            //添加到将要携带到分页中的数组中
            $where['l_name'] = $name;
            //给查询添加where条件
            $ob->where('l_name','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(3);
        // dd($list);
        return view('Admin.Links.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Links.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //获取友情链接图片
        $dat = $request->file('l_pic');
        if($dat != null){
            // 存在就获取图片后缀生成随机文件名
            $ext = $dat->getClientOriginalExtension();
            $fileu_name = time().rand('1000','9999').'.'.$ext;
            $dat->move('./admin/uploads',$fileu_name);
            // 获取要添加的内容
            $data = $request->except('_token'); 
            // 新文件名赋给要存的文件字段   
            $data['l_pic'] = $fileu_name;
        }else{
             $data = $request->except('_token');
        }
        执行添加
        $id = DB::table('links')->insertGetId($data);
        if($id>0){
            return redirect("/admin/links")->with('msg','添加成功');
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
        //获取要修改的内容并显示
        $data = DB::table('links')->where('l_id',$id)->first();
        return view('Admin.Links.edit',['ob'=>$data]);
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // 获取要修改的图片
        $dat = $request->file('l_pic');
        if($dat != null){
            // 要修改图片则获取图片后缀生成随机文件名
            $ext = $dat->getClientOriginalExtension();
            $fileu_name = time().rand('1000','9999').'.'.$ext;
            // 获取要修改的内容并将新图片名赋给图片字段
            $dat->move('./admin/uploads',$fileu_name);
            $data = $request->except('_token','_method');    
            $data['l_pic'] = $fileu_name;
        }else{
             $data = $request->except('_token','_method');
        }
        // 执行修改、
        $row = DB::table('links')->where('l_id',$id)->update($data);
        if($row>0){
            return redirect('admin/links')->with('msg','修改成功');
        }else{
            return redirect('admin/links')->with('error','修改失败');
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
        //获取要修改的友情链接内容并执行删除
        $row = DB::table('links')->where('l_id',$id)->delete();
        if($row>0){
            return redirect('admin/links')->with('msg','删除成功');
        }else{
            return redirect('admin/links')->with('error','删除失败');
        }
    }
}
