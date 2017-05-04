<?php

namespace App\Http\Controllers\Home;

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
    public function index()
    {
        // dd(23);
        if(session('u_name')){
            $data = DB::table('comment')->where('c_uid',session('u_id'))->get();
            $con = DB::table('config')->where('name',2)->first();
            // dd($data);
            foreach ($data as $key => $value) {
                 $gid=  $value->c_gid;
                 // dd($gid);
                 $list[] = DB::table('good')->where('g_id',$gid)->first();

            }
            // dd($list);
            $list['a'] = 1;
            return view('Home.comment',['data'=>$data,'list'=>$list,'con'=>$con]);
        }else{
            return redirect("/home/enter");
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // dd(11);
        
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
        if(!session('u_id')){
            return view('Home.enter');
        }
		$ob = DB::table('image')->where('i_address','商城首页')->get();
        // dd($ob);
        $con = DB::table('config')->where('name',2)->first();
        return view('Home.comment',['g_id'=>$id,'con'=>$con]);
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
        //添加评论
        // 评论验证
        $message = [
            'c_content.required' => '评论内容必须填写',
            'c_content.max' => '评论内容长度不能大于50字符',
            'c_star.digits' => '请输入10-100的数字',

        ];

        $this->validate($request, [
            'c_content' => 'required|max:50',
            'c_star' => 'digits:2', 
        ],$message);
        $data = $request->except('_token','_method');
        // dd($id);
        $data['c_time'] = date('Y-m-d H:i:s',time());
        $gid =  $data['c_gid'];
        // dd($data);
        $id = DB::table('comment')->insertGetId($data);
        return redirect("/home/detail/$gid");
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
        // dd(11);
         $row = DB::table('comment')->where('c_id',$id)->delete();
        if($id>0){
            return redirect("/home/comment")->with('msg','删除成功');
        }else{
            return redirect('/home/comment')->with('error','删除失败');
        }
    }
}
