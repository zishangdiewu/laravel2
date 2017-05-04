<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // dd(234);
      $uid = session('u_id');
      $data = DB::table('site')->where('uid',$uid)->get();
       $con = DB::table('config')->where('name',2)->first();
// dd($data);
        return view('Home.order',['data'=>$data,'con'=>$con]);
    }

      public function doget(Request $request)
    {
        // echo (123);
        $list = DB::table('district')->where('upid',$request->input('upid'))->get();
        echo json_encode($list);
    }
    public function dopost(Request $request)
    {
        $list = DB::table('district')->where('upid',$request->input('upid'))->get();
        echo json_encode($list);
    }

     public function store(Request $request)
    {   
        $uid = session('u_id');
        // dd($uid);
        $data = $request->except('_token');

         $upid = $data['city1'];
         foreach($upid as $v){
            if($v != 0){
                $list[] = DB::table('district')->where('id',$v)->first();
            }
         }
         foreach($list as $v){
            $ob[] = $v->name;
         }

        $data['buyeradress'] = implode('-',$ob).'-'.$data['buyeradress'];

        unset($data['city1']);
        $data['uid'] = $uid;
        // dd($data);
        $id = DB::table('site')->insertGetId($data);
        if($id>0){
          // dd($id);
            return redirect('/home/ct');
            // dd(11);
        }
    }
   
}