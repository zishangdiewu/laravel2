<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class SkuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(123);
         //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('sku');
        //判断是否有搜索条件
        if($request->has('sk_ver')){
            //获取搜索的条件
            $name = $request->input('sk_ver');
            //添加到将要携带到分页中的数组中
            $where['sk_ver'] = $name;
            //给查询添加where条件
            $ob->where('sk_ver','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);

        return view('Admin.Sku.index',['list'=>$list,'where'=>$where]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('Admin.Sku.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //
 
        $sk_ver = $request->input('sk_ver');
        $data  = $request->except('_token');
        $id = DB::table('sku')->insertGetId($data);

        if($id>0){
            return redirect('admin/sku')->with('msg','添加成功');
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
        //
        $data = DB::table('sku')->where('sk_id',$id)->first();
        // dd($data);
        return view('Admin.Sku.edit',['ob'=>$data]);
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
       
        $data = $request->except('_token','_method');
      
        $row = DB::table('sku')->where('sk_image',$id)->update($data);
        if($row>0){
            return redirect('admin/sku')->with('msg','修改成功');
        }else{
            return redirect('admin/sku')->with('error','修改失败');
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
        //
        $row = DB::table('sku')->where('sk_id',$id)->delete();
        if($row>0){
            return redirect('admin/sku')->with('msg','删除成功');
        }else{
            return redirect('admin/sku')->with('error','删除失败');
        }

    }

    public function doupload(Request $request)
    {
        
        //判断是否有文件上传
        if($request->hasFile('sk_image')){
            // 判断上传的文件是否有效
            if($request->file('sk_image')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('sk_image');
                dd($data);
                // 获取上传的文件的后缀
                $ext = $data->getClientOriginalExtension();
                // 拼装出你需要使用的文件名
                $picu_name = time().rand(1000,9999).'.'.$ext;
                // 移动临时文件，生成新文件到指定目录下
                $data->move('./admin/upload',$picu_name);
                if($data->getError()>0){
                    echo '上传失败';
                }else{
                    echo '上传成功';
                    echo "<img src='./admin/upload/{$picu_name}' width='200' height='200'>";
                }
            }
        }

    }
}
