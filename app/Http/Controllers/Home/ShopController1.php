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
        
        $ob = DB::table('image')->where('i_address','商城首页')->get();
        // dd($ob);
      
        $con = DB::table('config')->where('name',2)->first();

        return view('Home.shop',['list'=>$ob,'con'=>$con]);
    }

}