<?php

namespace App\Http\Controllers\Home;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class ListController extends Controller
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
        $sort = DB::table('sort')->get();
        $con = DB::table('config')->where('name',2)->first();
        $ob = DB::table('good')->where('g_status',1);
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
        $list = $ob->paginate(4);
        return view('Home.list',['list'=>$list,'con'=>$con, 'sort'=>$sort,'where'=>$where]);
        // return view('Home.list',['list'=>$list, 'sort'=>$sort,'sku'=>$sku,'where'=>$where]);

    }
    // 根据分类的子类查询 某一类带着 该类的id 传值
    public function dosort($id)
    {
        // 获取所有分类
        $sort = DB::table('sort')->get();
        $con = DB::table('config')->where('name',2)->first();
        // 判断接收到的分类id 进行商品表查询
        $list = DB::table('good')->where('s_id',$id)->get();
        dd($list);
        // 获取分类商品后返回列表页，将查询内容传到列表页
        return view('Home.list',['list'=>$list,'con'=>$con,'sort'=>$sort]);
    }

}
