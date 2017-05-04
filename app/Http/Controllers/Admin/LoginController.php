<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User;

use Gregwar\Captcha\CaptchaBuilder;

use DB;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('Admin.login');
    }
    public function dologin(Request $request)
    {

        $name = $request->input('u_name');
        $pass = md5($request->input('u_password'));
        //从数据库调取相应数据
        $ob = DB::table('users')->where('u_name',$name)->first();
        // dd($ob);
        // 判断登录请求数据与数据库存有数据是否一致
        if($ob){
            if( $pass == $ob->u_password){
                // 权限是普通用户或者被超级管理员禁止的不能登陆
                if($ob->u_power ==1 || $ob->u_status == 2){
                    return back()->with('msg','登录失败：权限不足或该账号已被冻结');
                }
                // session存储登录信息
                session(['admin'=>$ob]);
                session(['name'=>$name]);
                session(['id'=>$ob->u_id]);
                session(['power'=>$ob->u_power]);

                return redirect('/admin/index');
            }else{
                return back()->with('msg','登录失败：用户名或密码不正确');
            }
        }else{
            return back()->with('msg','登录失败：用户名或密码不正确');
            // echo 333;
        }
       
    }
    public function change()
    {  
     // 登录到注册跳转
        return view('Admin.register');
    }
    public function back()
    {
        return view('Admin.login');
    }
   
    public function register()
    {
        return view('Admin.register');
    }
    public function doregister(Request $request)
    {
      
        $name = $request->input('u_name');
        // dd($name);
        //从数据库调取相应数据
        $ob = DB::table('users')->where('u_name',$name)->first();
        // dd($ob->u_name);
        if($ob){
           
            return back()->with('msg','登录失败：用户名已存在！');
          
        }else{
            $data = $request->except('_token');
            $id = DB::table('users')->insertGetId($data);
            if($id>0){
                return redirect('admin/index');
            } 
        }

    }
    // 后台注销退出
    public function over()
    {   
        // 清除session存值
        session()->forget('adminuser');
        // 清除缓存后返回登录页
        return redirect('admin/login');
    }
   
}
