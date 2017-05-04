<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class DetailsController extends Controller
{
    //
    public function index($id) 
    {   
        // dd($id);
        $list = DB::table('good')->where('g_id',$id)->first();
        $con = DB::table('config')->where('name',2)->first();
        // 图片 处理
        $imgs = explode(',',$list->g_imgs);
        // $list->gid;
        // 查询该商品的所有评论
        $data = DB::table('comment')->where('c_gid',$id)->get();
        foreach ($data as $key => $value) {
                 $c_uid=  $value->c_uid;
                 // dd($gid);
                 $comment[] = DB::table('users')->where('u_id',$c_uid)->first();
            }
            $comment['a'] = 1;
        // dd($comment);   
        return view('Home.details',['list'=>$list,'imgs'=>$imgs,'data'=>$data,'comment'=>$comment,'con'=>$con]);
    }




    // public function update(Request $request, $id)
    // {
    //     dd($request);
    // }
}
