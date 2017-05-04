<?php

namespace App\Http\Controllers\Admin;

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
    public function index(Request $request)
    {

        //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('order');
        //判断是否有搜索条件
        if($request->has('o_number')){
            //获取搜索的条件
            $name = $request->input('o_number');
            //添加到将要携带到分页中的数组中
            $where['o_number'] = $name;
            //给查询添加where条件
            $ob->where('o_number','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(4);
        return view('Admin.Order.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = DB::table('order')->where('o_id',$id)->first();
        return view('Admin.Order.edit',['ob'=>$data]);
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

        $data = $request->only('o_ship');
        $data['o_manage']=3;
        // dd($data);
        $row = DB::table('order')->where('o_id',$id)->update($data);
        if($row>0){
            return redirect('admin/order')->with('msg','发货完成');
        }else{
            return redirect('admin/order')->with('error','发货失败');
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
    }
}
