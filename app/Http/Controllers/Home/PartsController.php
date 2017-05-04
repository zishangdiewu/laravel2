<?php

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         //保存搜索条件
        $where = '';
        //实例化操作表
        $con = DB::table('config')->where('name',2)->first();
        $sort = DB::table('sort')->where('s_upid',1)->get();
        $ob = DB::table('good')->where('s_upid',1)->where('g_status',1);
        // $sku = DB::table('sku')->get();
        if($request->has('g_name')){
        //获取搜索的条件
            $g_name = $request->input('g_name');
            //添加到将要携带到分页中的数组中
            $where['g_name'] = $g_name;
            //给查询添加where条件
            $ob->where('g_name','like',"%{$g_name}%")->get();

        }
        //执行分页查询
        $list = $ob->paginate(9);
        return view('Home.parts',['list'=>$list, 'sort'=>$sort,'where'=>$where,'con'=>$con]);

  //       $sort = DB::table('sort')->get();
  //       $ob = DB::table('good')->where('s_upid',1)->get();
  // // dd($ob);
  //       return view('Home.parts',['ob'=>$ob, 'sort'=>$sort]);
    }

    public function dosort($id)
    {
        // dd(23);
        $sort = DB::table('sort')->get();
        $list = DB::table('good')->where('s_id',$id)->get();
        $con = DB::table('config')->where('name',2)->first();
        return view('Home.parts',['list'=>$list, 'sort'=>$sort,'con'=>$con]);
    }

}