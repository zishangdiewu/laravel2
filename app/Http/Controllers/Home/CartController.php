<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class CartController extends Controller
{
      // 接收要添加的商品信息，显示购物车实体
    public function index()
    {
        $con = DB::table('config')->where('name',2)->first();
        if(!session('u_name')){
            return view('Home.enter');
        }

        $ob = DB::table('cart')->where('ca_uid',session('u_id'))->get();
         
               // 遍历购物车所有商品小计。进行总价求和
        if(count($ob) < 1){
            $con = DB::table('config')->where('name',2)->first();
            return view('Home.cart',['con'=>$con]);
        }
            foreach($ob as $v)
            {
                // 将所有小计价格归到一个数组
               $a[] = $v->totprice;
               $b[] = $v->ca_num;
            }       
            $sum = array_sum($a);
            $snum = array_sum($b);

            $uid = session('u_id');
            $data = DB::table('site')->where('uid',$uid)->get();

            return view('Home.order',['data'=>$data,'ob'=>$ob,'sum'=>$sum,'snum'=>$snum,'con'=>$con]);
        
       
    }
    // 添加到购物车实体
    public function store(Request $request)
    {   
        // dd($request);
        // dd(234);
        $num = $request->except('_token');
        if(session('u_id')){
                // 获取添加到购物车的商品信息
            $ob = DB::table('good')->where('g_id',$num['g_id'])->first();

            $cart = DB::table('cart');
           
                $list['ca_uid'] = session('u_id');    
                $list['ca_gid'] = $ob->g_id;    
                $list['ca_color'] = $ob->g_color;    
                $list['ca_price'] = $ob->g_price;     
                $list['ca_image'] = $ob->g_image;    
                $list['ca_title'] = $ob->g_title;    
                $list['ca_num'] = $num['num'];
                $list['totprice'] = $list['ca_price']*$list['ca_num'];

                $id = DB::table('cart')->insertGetId($list);
                // dd($id);
                if($id>0){
                    return redirect("/home/ct");          
                    
                }                                               
        }else{
              return redirect('home/enter');
        } 
    }

    public function destroy($id)
    {
        // dd(111);
        // dd($id);
        $row = DB::table('cart')->where('ca_id',$id)->delete();
        if($row>0){
            return redirect('/home/ct');
        }else{
            return redirect('/home/ct');
        }

    }
  
}
