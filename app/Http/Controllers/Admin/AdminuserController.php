<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class AdminuserController extends Controller
{
    public function index()
    {
        //  保存搜索条件
        // $where = '';
        // //实例化操作表
        // $ob = DB::table('users');
        // //判断是否有搜索条件
        // if($request->has('u_name')){
        //     //获取搜索的条件
        //     $u_name = $request->input('u_name');
        //     //添加到将要携带到分页中的数组中
        //     $where['u_name'] = $u_name;
        //     //给查询添加where条件
        //     $ob->where('u_name','like',"%{$u_name}%");
        // }
        // //执行分页查询
        // $list = $ob->paginate(5);
        // return view('Admin.User.index',['list'=>$list,'where'=>$where]);
        $list = DB::table('users')->where('u_power','>',1)->get();
        // dd($list);
        // dd($data);
        return view('Admin.Adminuser.index',['list'=>$list]);  
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('Admin.Adminuser.add');
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
        // 获取添加的内容
        $data = $request->except('_token');
        // 添加密码是加密
        $data['u_password'] = md5($data['u_password']);
       // 执行添加
        $id = DB::table('users')->insertGetId($data);
        if($id>0){
            return redirect('admin/adminuser')->with('msg','添加成功');
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
        // 获取要修改的内容
        $data = DB::table('users')->where('u_id',$id)->first();
        // dd($data);
        return view('Admin.Adminuser.edit',['ob'=>$data]);
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
        // 获取要修改后的那内容
        $data = $request->except('_token','_method');
        // 针对ID执行修改
        $row = DB::table('users')->where('u_id',$id)->update($data);
        if($row>0){
            return redirect('admin/adminuser')->with('msg','修改成功');
        }else{
            return redirect('admin/adminuser')->with('error','修改失败');
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
        // 获取要删除用户ID执行删除
        $row = DB::table('users')->where('u_id',$id)->delete();
        if($row>0){
            return redirect('admin/adminuser')->with('msg','删除成功');
        }else{
            return redirect('admin/adminuser')->with('error','删除失败');
        }

    }


}


