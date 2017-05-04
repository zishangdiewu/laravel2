<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 接收要添加的商品信息，
    public function index()
    {
        // dd(11);
        // dd($id);
        // 添加到购物车的商品订单ID。多个为数组
        $id = session('o_id');
        foreach($id as $v)
        {
            // whereIn方法验证给定列的值是否在给定数组中：
            $ob = DB::table('order')->whereIn('o_id',$id)->get();
        }
// dd($ob);
        foreach($ob as $v)
        {
            $a[] = $v->totalprice;
        }
        // dd($v);
        // dd($a);
        $sum = array_sum($a);
        $con = DB::table('config')->where('name',2)->first();
        return view('Home.pay',['ob'=>$ob,'sum'=>$sum,'con'=>$con]);
    }
    // 生成订单
    public function store(Request $request)
    {
      
// dd(22345674);

        $res = $request->except('_token');
 // dd($res);
        $data = DB::table('cart')->where('ca_uid',session('u_id'))->get(); 
        $add = DB::table('site')->where('id',$res['id'])->get();
            
            // dd($data);

           

            $number = time().rand('1000','9999');

        foreach($data as $v)
        {   
            $order = array();   
            $order['o_number'] = $number;
            $order['u_id'] = session('u_id');
            $order['g_id'] = $v->ca_gid;
            $order['o_meno'] = $res['o_meno'];        
            $order['o_manage'] = 1;
            $order['o_count'] = $v->ca_num;
            $order['o_price'] = $v->ca_price;
            $order['totalprice'] = $v->ca_price*$v->ca_num;
            $order['add_id'] = $res['id'];
            $order['o_image'] = $v->ca_image;
            $order['o_title'] = $v->ca_title;
            $order['o_color'] = $v->ca_color;
            $order['o_buyername'] = $add[0]->buyername;
            $order['o_buyerTel'] = $add[0]->buyerTel;
            $order['o_buyeradress'] = $add[0]->buyeradress;
            $order['create_time'] = date('Y-m-d H:i:s',time());
            $order['update_time'] = date('Y-m-d H:i:s',time());
            
            // dd($order);
            // 将订单数据到数据库
            $a = DB::table('order')->insertGetId($order);
            // dd($a);
            $id[] = $a;
            // dd($id);
            // 生成订单后删除购物车信息
            $row = DB::table('cart')->where('ca_id',$v->ca_id)->delete();                    
        }
// dd($order);

            // session存订单id
            $request->session()->put('o_id', $id);
         // dd($id);
            if($a>0){
                return redirect("/home/pay");    
            }   
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        // dd(111111111111);
        // $ob = DB::table('order')->where('o_id',$id)->get();
        // foreach($ob as $v)
        // {
        //     $v->o_manage =  2;
        // }


    }
    public function pay($id)
    {
        // dd($id);
        // foreach($id as $v)
        // {
        //     // whereIn方法验证给定列的值是否在给定数组中：
        //     $ob = DB::table('order')->whereIn('o_id',$id)->get();
        // }
        $ob = DB::table('order')->where('o_id',$id)->get();
        // dd($ob);
        $sum = $ob[0]->totalprice;
        // dd($sum);
        $con = DB::table('config')->where('name',2)->first();
        return view('Home.pay',['ob'=>$ob,'sum'=>$sum,'con'=>$con]);


    }
    public function dopay($id)
    {
        // dd(234);
// dd($id);
        $con = DB::table('config')->where('name',2)->first();
        $ob = DB::table('order')->where('o_number',$id)->get();
        // dd($ob);
         foreach($ob as $v)
         {
            $data['o_manage'] = 2;
            $row = DB::table('order')->where('o_id',$v->o_id)->update($data);
         }

        // return redirect("/home/pay");
        return view('Home.success',['con'=>$con]);
    }
    
}





















        // $order[g_id] = $v->ca_gid;
        // $order[o_manag] = 1;
        // $order[o_number] = time().rand('1000','9999');
        // $order[o_num] = $v->ca_num;
        // $order[add_id] = $res['id'];
        // $order[o_image] = $v->ca_image;
        // $order[o_title] = $v->ca_title;$v->ca_image;
        // $order[o_color] = $v->ca_color;
        // $order[o_buyername = $add[0]->buyername;
        // $order[o_buyerTel = $add[0]->buyerTel;
        // $order[o_buyeradresss = $add[0]->buyeradress;