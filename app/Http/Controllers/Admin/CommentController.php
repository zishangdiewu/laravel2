<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class CommentController extends Controller
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
        // $ob = DB::table('good');
        $ob = DB::table('comment')
            ->join('users', 'comment.c_uid', '=', 'users.u_id')
            ->join('good', 'comment.c_gid', '=', 'good.g_id')
            ->select('comment.*', 'good.g_name','users.u_name');
            // ->get();

            // dd($ob);
            
        //判断是否有搜索条件
        if($request->has('c_content')){
            //获取搜索的条件
            $name = $request->input('c_content');
            //添加到将要携带到分页中的数组中
            $where['c_content'] = $name;
            //给查询添加where条件
            $ob->where('c_content','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(1);
        // dd($list);
        // return view('Admin.Comment.index',['list'=>$ob]);
        return view('Admin.Comment.index',['list'=>$list,'where'=>$where]);
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
        // 获取要修改的值
        $data = DB::table('comment')->where('c_id',$id)->first();
        // dd($data);
        return view('Admin.Comment.edit',['ob'=>$data]);
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
        // 获取回复的内容
        $data = $request->only('c_reply');
        // 修改数据库回复
        $row = DB::table('comment')->where('c_id',$id)->update($data);
        if($row>0){
            return redirect('admin/comment')->with('msg','回复成功');
        }else{
            return redirect('admin/comment')->with('error','回复失败');
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

    }
}
