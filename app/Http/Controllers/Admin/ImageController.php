<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('image')->orderBy('i_address');
        //判断是否有搜索条件
        if($request->has('i_address')){
            //获取搜索的条件
            $address = $request->input('i_address');
     
            //添加到将要携带到分页中的数组中
            $where['i_address'] = $address;
            //给查询添加where条件
            $ob->where('i_address','like',"%{$address}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.Image.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // dd(123);
        // $list = DB::table('image')->get();
         return view('Admin.Image.add');
         // return view('Admin.Image.index',['list'=>$list]);
      
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
     // dd($request);
        $dat = $request->file('i_image');
        // dd($dat);
        if($dat != null){
            $ext = $dat->getClientOriginalExtension();
            $fileu_name = time().rand('1000','9999').'.'.$ext;

            // dd($fileu_name);
            $dat->move('./admin/uploads',$fileu_name);

            $data = $request->except('_token');    
            $data['i_image'] = $fileu_name;
        }else{
             $data = $request->except('_token');
        }
        
        // dd($dat);
        $id = DB::table('image')->insertGetId($data);
        if($id>0){
            return redirect('admin/image')->with('msg','添加成功');
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
        $data = DB::table('image')->where('i_id',$id)->first();
        // dd($data);
        return view('Admin.Image.edit',['ob'=>$data]);
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
        $dat = $request->file('i_image');

        if($dat !== null){
            $ext = $dat->getClientOriginalExtension();
            $fileu_name = time().rand('1000','9999').'.'.$ext;
            $dat->move('./admin/uploads',$fileu_name);
             
            $data = $request->except('_token','_method');
            // dd($dat);
            $data['i_image'] = $fileu_name;
        }else{
             $data = $request->except('_token','_method');
        }
      
        $row = DB::table('image')->where('i_id',$id)->update($data);
        if($row>0){
            return redirect('admin/image')->with('msg','修改成功');
        }else{
            return redirect('admin/image')->with('error','修改失败');
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
        $row = DB::table('image')->where('i_id',$id)->delete();
        if($row>0){
            return redirect('admin/image')->with('msg','删除成功');
        }else{
            return redirect('admin/image')->with('error','删除失败');
        }

    }

    // public function doupload(Request $request)
    // {
    //     //判断是否有文件上传
    //     if($request->hasFile('i_image')){
    //         // 判断上传的文件是否有效
    //         if($request->file('i_image')->isValid()){
    //             // 获取上传的文件对象
    //             $data = $request->file('i_image');
    //             dd($data);
    //             // 获取上传的文件的后缀
    //             $ext = $data->getClientOriginalExtension();
    //             // 拼装出你需要使用的文件名
    //             $picu_name = time().rand(1000,9999).'.'.$ext;
    //             // 移动临时文件，生成新文件到指定目录下
    //             $data->move('./admin/uploads',$picu_name);
    //             if($data->getError()>0){
    //                 echo '上传失败';
    //             }else{
    //                 echo '上传成功';
    //                 echo "<img src='./admin/uploads/{$picu_name}' width='200' height='200'>";
    //             }
    //         }
    //     }
    // }
}
