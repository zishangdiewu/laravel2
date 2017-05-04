<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class PassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // 获取当前用户信息
        $ob = DB::table('users')->where('u_id',session('id'))->first();
        // 重定向到修改密码页
        return view('Admin.Pass.index',['ob'=>$ob]); 
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

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
        dd(1);
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
// dd(12);
        // 获取要修改的内容
        $data = $request->except('_token','_method');
        // 密码加密
        $data['password'] = md5($data['password']);
        $data['u_password'] = md5($data['u_password']);      
        $data['u_repassword'] = md5($data['u_repassword']);
          // dd($data);
        $ob = DB::table('users')->where('u_id',session('u_id'))->first();
        // 若输入原密码正确则可更改密码
        if($data['password'] == $ob->u_password){
            // 去除获取数据中的重复密码和原密码
            unset($data['password'],$data['u_repassword']);
            // dd($data);
            $row = DB::table('users')->where('u_id',session('u_id'))->update($data);
            
            if($row>0){
                // 清除session存值
                session()->forget('adminuser');
                // 清除缓存后返回登录页
                return redirect('admin/login');
            }else{
                return redirect('admin/pass')->with('error','修改失败');
            }
        }else{
             return redirect('admin/pass')->with('error','原密码输入错误');
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
    }
}
