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
        //��ȡ��¼����д����������
        $name = $request->input('u_name');
        //�����ݿ��ȡ��Ӧ����
        $ob = $this->where('u_name',$name)->first();
        // �жϵ�¼�������������ݿ���������Ƿ�һ��
        
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
