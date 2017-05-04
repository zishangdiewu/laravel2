<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Model\User;

use Gregwar\Captcha\CaptchaBuilder;

use DB;

class EnterController extends Controller
{
    //
    public function index()
    {
        return view('Home.enter');
    }
    public function dologin(Request $request)
    {
        $name = $request->input('u_name');
        //从数据库调取相应数据
        $ob = DB::table('users')->where('u_name',$name)->first();
        // dd($ob->u_pic);
        // 判断登录请求数据与数据库存有数据是否一致
        if($ob){
            // 密码加密
            $u_password = md5($request->input('u_password'));
            if($u_password == $ob->u_password){
                // 登录成功
                session(['adminuser'=>$ob]);
                session(['u_pic'=>$ob->u_pic]);
                session(['u_power'=>$ob->u_power]);
                session(['u_id'=>$ob->u_id]);
                session(['u_name'=>$name]);
                return redirect('/home/index');
            }else{
                return back()->with('msg','登录失败：密码不正确');
            }
        }else{
            return back()->with('msg','登录失败：用户名不正确');
        }
       
    }
    // 注册
    public function register()
    {
        return view('Home.enroll');
    }

    // 执行注册
    public function doregister(Request $request)
    {
        $name = $request->input('u_name');
        $mycode = $request->input('mycode');
        // dd($mycode);
        // 判断验证码是否错误
        if($mycode == session('mycode')){
            //判断用户是否已存在
            $ob = DB::table('users')->where('u_name',$name)->first();
            if($ob){
                // 存在则注册失败
                return back()->with('msg','注册失败：用户名已存在！');
            }else{
                // 不存在 执行注册
                // 自定义表单验证错误信息
                $message = [
                    'u_name.max' => '用户名长度为2-8！',
                    'u_name.min' => '用户名长度为2-8！',
                    'u_name.required' => '请输入用户名',
                    'u_password.required' => '请输入密码',
                    'u_password.min' => '密码不能小于4！',
                ];
                //验证的选项
                $this->validate($request, [
                    'u_name' => 'required|min:2|max:8',
                    'u_password' => 'required|min:4',
                ],$message);

                $data = $request->except('_token','mycode');
                // 密码加密
                $data['u_password'] = md5($data['u_password']);
                // dd($data);
                $id = DB::table('users')->insertGetId($data);
                if($id>0){
                    return redirect('home/enter');
                }
            }
        }else{
            return back()->with('msg','验证码错误！');
        }
        
    
    }

    // 验证码
    public function captch($tmp)
    {
        //生成验证码图片的builder对象，
        $builder = new CaptchaBuilder;
        // 设置验证码的宽高字体
        $builder->build(137,47,null);
        //获取验证码中的内容
        $data = $builder->getPhrase();
        //把验证码的内容闪存到session里面
        session()->flash('mycode',$data);

        //告诉浏览器，这是一张图片
        // header('content-type:image/jpeg');
        //生成图片
        // $builder->output();die;
        return response($builder->output())->header('Content-type','image/jpeg');
    }

    // 前台注销退出
    public function logout()
    {   
         // 清除session存值
        session()->forget('adminuser');
        // 清除缓存后返回登录页
        return redirect('home/enter');
    }
   
}
