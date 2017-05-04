<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

class SortController extends Controller
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
        $ob = DB::table('sort');
        //判断是否有搜索条件
        if($request->has('s_name')){
            //获取搜索的条件
            $name = $request->input('s_name');
            //添加到将要携带到分页中的数组中
            $where['s_name'] = $name;
            //给查询添加where条件
            $ob->where('s_name','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);
        return view('Admin.Sort.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Sort.add');
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
        // dd(11);
        $message = [
            's_name.required' => '类别名必须填写',
        ];

        $this->validate($request, [
            's_name' => 'required|max:8',
        ],$message);
        
        $data = $request->except('_token');
        // dd($data);
        $id = DB::table('sort')->insertGetId($data);
        if($id>0){
            return redirect("/admin/sort")->with('msg','添加成功');
            // echo 11111;
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
        // dd(111);
        $data = DB::table('sort')->where('s_id',$id)->first();
        return view('Admin.Sort.edit',['ob'=>$data]);
    
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
        // dd(111);
        $data = $request->only('s_name');
        $row = DB::table('sort')->where('s_id',$id)->update($data);
        if($row>0){
            return redirect('admin/sort')->with('msg','修改成功');
        }else{
            return redirect('admin/sort')->with('error','修改失败');
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
        $list = DB::table('sort')->where('s_upid',$id)->get();
        if(count($list)>0){
            return redirect('/admin/sort')->with('error','要删除此类必须先删除此类下的子类');
        }

        $row = DB::table('sort')->where('s_id',$id)->delete();
        if($row>0){
            return redirect('/admin/sort')->with('msg','删除成功');
        }else{
            return redirect('/admin/sort')->with('error','删除失败');
        }
    }

    // 添加子分类
    public function createSon($id)
    {   
        // dd(111);
        $list = DB::table('sort')->where('s_id',$id)->first();
        // dd($list);
        return view('Admin.Sort.addSon',['list' => $list]);
    }

    public function storeSon(Request $request)
    {
        $data = $request->except('_token');
        // dd($data);
        $par = DB::table('sort')->where('s_id',$request->input('s_upid'))->first();
        // dd($par);
        $data['s_path'] = $par->s_path.','.$data['s_upid'];
        $id = DB::table('sort')->insertGetId($data);
        // dd($id);
        if($id>0){
            return redirect('admin/sort')->with('msg','添加子类成功');
        }

    }
}
