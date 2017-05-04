<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class SiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // echo 111;
        $list = DB::table('site')->where('uid',session('u_id'))->get();
        $k = 0;
        foreach ($list as $k => $v) {
            $k = $k+1;
        }
        $con = DB::table('config')->where('name',2)->first();
        // dd($k); 
        return view('Home.site',['list'=>$list,'a'=>'0','i'=>$k,'con'=>$con]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        // dd(23);
        // dd($request);
        $con = DB::table('config')->where('name',2)->first();
        $list = DB::table('site')->where('uid',session('u_id'))->get();

        $k = 0;
        foreach ($list as $k => $v) {
            $k = $k+1;
        }
        if($k >= 10){
            return redirect("/home/site")->with('error','添加失败：最多可有10条收货地址！');
        }else{
            return view('Home.site',['a'=>1,'i'=>$k,'con'=>$con]);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

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
        // dd($data);
        $id = DB::table('site')->insertGetId($data);
        if($id>0){
            return redirect("/home/site")->with('msg','添加成功');
        }else{
            return redirect('/home/site')->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $con = DB::table('config')->where('name',2)->first();
        $l = DB::table('site')->where('uid',session('u_id'))->get();
        $k = 0;
        foreach ($l as $k => $v) {
            $k = $k+1;
        }
        $data = DB::table('site')->where('id',$id)->first();
        $address = explode('-',$data->buyeradress);
        $data->address = array_pop($address);
        foreach($address as $v){
                $list[] = DB::table('district')->where('name',$v)->first();
        }
        $data->city1= $list;
        // dd($data);
        unset($data->buyeradress);
        return view('Home.site',['a'=>2,'i'=>$k,'data'=>$data,'con'=>$con]);
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
        $data = $request->except('_token','_method');
         $upid = $data['city1'];
         foreach($upid as $v){
            if($v != 0){
                $list[] = DB::table('district')->where('id',$v)->first();
            }
         }

         foreach($list as $v){
            $ob[] = $v->name;
         }
        $data['buyeradress'] = implode('-',$ob).'-'.$data['address'];
        unset($data['city1']);
        unset($data['address']);
        // dd($data);
        $row = DB::table('site')->where('id',$id)->update($data);
        if($row>0){
            return redirect('home/site')->with('msg','修改成功');
        }else{
            return redirect('home/site')->with('error','修改失败');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $row = DB::table('site')->where('id',$id)->delete();
        if($id>0){
            return redirect("/home/site")->with('msg','删除成功');
        }else{
            return redirect('/home/site')->with('error','删除失败');
        }
    }
    // 城市联动
    public function doget(Request $request)
    {

        $list = DB::table('district')->where('upid',$request->input('upid'))->get();
        // dd($list);
        echo json_encode($list);
    }
    public function dopost(Request $request)
    {
        // dd(11);
        $list = DB::table('district')->where('upid',$request->input('upid'))->get();
        echo json_encode($list);
    }
    // 默认地址
    public function adress($id)
    {
        // dd($id);
        $data = array('default'=>1);
        // dd($data);
        $list = array('default'=>2);
        $row1 = DB::table('site')->where('default',1)->update($list);
        $row2 = DB::table('site')->where('id',$id)->update($data);
       
        return redirect('/home/site')->with('msg','设置成功');
    }
}
