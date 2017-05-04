<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class UserController extends Controller
{
    //
    public function index()
    {   

        // 判断是否登录
    	if(session('u_id')){
            // 查询登录用户的信息
            $data = DB::table('users')->where('u_id',session('u_id'))->first();
            $con = DB::table('config')->where('name',2)->first();
            //分割用户地址
            $address = explode('-',$data->u_address);
            foreach($address as $v){
                    $list[] = DB::table('district')->where('name',$v)->first();
            }
            // 把分割后的地址的数据以数组的形式赋给data
            $data->city1= $list;
            // 去掉地址这个字段
            unset($data->u_address);
            // 把地址的id赋给变量i
            foreach ($data->city1 as $k => $v) {
                $i[] = $v;
            }
            return view('Home.user',['data'=>$data,'i'=>$i,'con'=>$con]);
        }else{
            return redirect('/home/enter');
        }        

    }
    public function store(Request $request)
    {       
        // 判断是否上传头像
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

    	// $data = $request->except('_token');
    	// 如果有字段未填写的则去掉该字段
    	foreach ($data as $k => $v) {
    		if($v == null){
    			unset($data[$k]);
    		}
    	}
        // dd($data);
         // 验证
        $message = [
            'u_email.email' => '请输入正确的邮箱！',
            'u_name.required' => '用户名不能为空！',
            'u_email.required' => '邮箱不能为空！',
            'u_age.required' => '年龄不能为空！',
            'u_tel.required' => '联系电话不能为空！',
            'u_name.min' => '用户名长度为2-8！',
            'u_name.max' => '用户名长度为2-8！',
            'u_age.digits' => '请输入真实年龄！',
            'u_tel.digits' => '请输入正确的手机电话！',

        ];
        // $v = Validator::make($data, [
        //     'u_name' => 'sometimes|required|email',
        // ],$message);


        $this->validate($request, [
            'u_name' => 'sometimes|required|max:8|min:2',
            'u_email' => 'sometimes|required|email', 
            'u_tel' => 'sometimes|required|digits:11', 
            'u_age' => 'sometimes|required|digits:2', 
        ],$message);
        // 地址处理
    	$upid = $data['city1'];
         foreach($upid as $v){
            if($v != 0){
                $list[] = DB::table('district')->where('id',$v)->first();


            }
         }
         // 判断地址是否为空 不为空则添加进修改语句里
         if(isset($list)){
            foreach($list as $v){
                $ob[] = $v->name;
             }
            $data['u_address'] = implode('-',$ob);
         }
        unset($data['city1']);
    	// dd($data);
        
    	$row = DB::table('users')->where('u_id',session('u_id'))->update($data);
        if($row>0){
            return redirect("/home/logout");
        }else{
            return redirect('/home/user')->with('error','保存失败');
        }
    }

    public function pass()
    {
        $con = DB::table('config')->where('name',2)->first();
        return view('Home.pass',['con'=>$con]);
    }

    public function dopass(Request $request)
    {

        $pass = md5($request->input('pass'));
        $data['u_password'] =  md5($request->u_password);
        // dd($data);
        //从数据库调取相应数据
        $ob = DB::table('users')->where('u_password',$pass)->first();
        // dd($ob->u_pic);
        // 判断原密码是否与与数据库存的密码一致
        if($ob){

            //密码长度验证
            $message = [
                'u_password.min' => '密码不能小于4位数！',
            ];
            $this->validate($request, [
                'u_password' => 'required|min:4', 
            ],$message);

            // 判断新密码两次输入的是否一致
            if($request->input('u_password') == $request->input('u_pass')){
                // 执行修改
                $row = DB::table('users')->where('u_id',session('u_id'))->update($data);
                return redirect('/home/enter');
            }else{
                return back()->with('error','修改失败：密码不一致');
            }
        }else{
            return back()->with('error','修改失败：原密码不正确');
        }
    }
}
