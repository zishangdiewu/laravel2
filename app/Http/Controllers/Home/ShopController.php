<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(11);
        $ob = DB::table('image')->where('i_address','商城首页')->get();
        $list = DB::table('good')->where('g_suggest',1)->get();
        // dd($list);
        $con = DB::table('config')->first();
        // dd($con);
        return view('Home.shop',['list'=>$list,'ob'=>$ob,'con'=>$con]);
    }

}