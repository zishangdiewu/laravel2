<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserController extends Controller
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
        $ob = DB::table('users')->where('u_power',1);

        //判断是否有搜索条件
        if($request->has('u_name')){
            //获取搜索的条件
            $u_name = $request->input('u_name');
            //添加到将要携带到分页中的数组中
            $where['u_name'] = $u_name;
            //给查询添加where条件
            $ob->where('u_name','like',"%{$u_name}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.User.index',['list'=>$list,'where'=>$where]);
            
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('Admin.User.add');
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
        $data = $request->except('_token');    
        $pass = md5($data['u_password']);

        $dat = $request->file('u_pic');
        if($dat != null){
            $ext = $dat->getClientOriginalExtension();
            $fileu_name = time().rand('1000','9999').'.'.$ext;

            // dd($fileu_name);
            $dat->move('./admin/uploads',$fileu_name);

            $data = $request->except('_token');    
            $data['u_pic'] = $fileu_name;
            $data['u_password'] = md5($data['u_password']);

        }else{
            $data = $request->except('_token');
            $data['u_password'] = md5($data['u_password']);

        }
        // dd($data);
        $id = DB::table('users')->insertGetId($data);
        if($id>0){
            return redirect('admin/demo')->with('msg','添加成功');
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
        $data = DB::table('users')->where('u_id',$id)->first();
        // dd($data);
        return view('Admin.User.edit',['ob'=>$data]);
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
        $dat = $request->file('u_pic');

        if($dat !== null){
            $ext = $dat->getClientOriginalExtension();
            $fileu_name = time().rand('1000','9999').'.'.$ext;
            $dat->move('./admin/uploads',$fileu_name);
             
            $data = $request->except('_token','_method');
            // dd($dat);
            $data['u_pic'] = $fileu_name;
        }else{
            $data = $request->except('_token','_method');
        }
      // dd($data);
        $row = DB::table('users')->where('u_id',$id)->update($data);
        if($row>0){
            return redirect('admin/demo')->with('msg','修改成功');
        }else{
            return redirect('admin/demo')->with('error','修改失败');
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
        $row = DB::table('users')->where('u_id',$id)->delete();
        if($row>0){
            return redirect('admin/demo')->with('msg','删除成功');
        }else{
            return redirect('admin/demo')->with('error','删除失败');
        }

    }

    public function doupload(Request $request)
    {
      
        //判断是否有文件上传
        if($request->hasFile('u_pic')){
            // 判断上传的文件是否有效
            if($request->file('u_pic')->isValid()){
                // 获取上传的文件对象
                $data = $request->file('u_pic');
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
