<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    // protected $table = 'user';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    public function checkUser($request)
    {
        //获取登录表单填写的请求数据
        $name = $request->input('u_name');
        //从数据库调取相应数据
        $ob = $this->where('u_name',$name)->first();
        // 判断登录请求数据与数据库存有数据是否一致
        
        if($ob){
            if($request->input('u_password') == $ob->u_password){
                return $ob;
            }else{
                return null;
            }
        }else{
            return null;
        }
    }
   
    
     




}
