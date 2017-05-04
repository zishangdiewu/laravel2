<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class MyorderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        // dd(111);
        $con = DB::table('config')->where('name',2)->first();

        $list = DB::table('order')->where('u_id',session('u_id'))->get();
        
        // dd($list);
        // 待付款
        $list1 = DB::table('order')->where([
            ['u_id' ,'=',session('u_id')],
            ['o_manage','=',1],
            ])->get();
// dd($list1);
        // 待收货
        $list2 = DB::table('order')->where([
            ['u_id' ,'=',session('u_id')],
            ['o_manage','=',2],
            ])->get();

    
        // 已发货
        $list3 = DB::table('order')->where([
            ['u_id' ,'=',session('u_id')],
            ['o_manage','=',3],
            ])->get();
        // dd($list3);
        // 已完成
         $list4 = DB::table('order')->where([
            ['u_id' ,'=',session('u_id')],
            ['o_manage','=',4],
            ])->get();
  
       

// dd($list0);
      
        return view('Home.myorder',['list'=>$list,'con'=>$con,'list1'=>$list1,'list2'=>$list2,'list3'=>$list3,'list4'=>$list4]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       // dd(2222);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        // dd(2);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $data['o_manage'] = 4;

       $ob = DB::table('order')->where('o_id',$id)->update($data);
      return redirect("/home/mo");

       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
      
// dd(1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
// dd(44444);
        // dd($id);
        // 改成已关闭
        // $data['o_manage'] = 5;

        // $ob = DB::table('order')->where('o_id',$id)->update($data);
        $row = DB::table('order')->where('o_id',$id)->delete();


        if($id>0){
            return redirect("/home/mo")->with('msg','取消成功');
        }else{
            return redirect('/home/mo')->with('error','取消失败');
        }
    }
    public function look($id)
    {
        // dd($id);
        // dd(1234567);
        $ob = DB::table('order')->where('o_id',$id)->get();
        foreach($ob as $v)
        {

        }
        // dd($v);
// dd($ob);
        $add = DB::table('site')->where('id',$v->add_id)->get();
        // dd($user);
        // $OB = DB::table()->where()->get();
        // $OB = DB::table()->where()->get();
         $con = DB::table('config')->where('name',2)->first();
         return view('Home.order1',['ob'=>$ob,'con'=>$con,'add'=>$add]);

    }
   
}
