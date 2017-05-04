<?php

namespace App\Http\Controllers\Admin;

use App\Model\Sort;
use App\Model\Good;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use DB;

class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // dd(123);
         //保存搜索条件
        $where = '';
        //实例化操作表
        $ob = DB::table('good');
        //判断是否有搜索条件
        if($request->has('g_name')){
            //获取搜索的条件
            $name = $request->input('g_name');
            //添加到将要携带到分页中的数组中
            $where['g_name'] = $name;
            //给查询添加where条件
            $ob->where('g_name','like',"%{$name}%");
        }
        //执行分页查询
        $list = $ob->paginate(5);

        return view('Admin.Good.index',['list'=>$list,'where'=>$where]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

  
    public function doget(Request $request)
    {
        // 获取分类的内容
        $list = DB::table('sort')->where('s_upid',$request->input('s_upid'))->get();
        echo json_encode($list);
    }
    public function dopost(Request $request)
    {
        // 获取二级分类内容
        $list = DB::table('sort')->where('s_upid',$request->input('s_upid'))->get();
        // echo ($list);
        echo json_encode($list);
    }

        public function create()
    {
        // 获取要添加的分类并显示
        $list = DB::table('sort')->where('s_upid','0')->get();
        // dd($list);
        return view('Admin.Good.add',['list'=>$list]);
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
        // $good = new Good();
        $data = $request->except('_token');
        // 单传
        $dat = $request->file('g_image');
        // 若有上传执行
        if($dat){
                // 获取上传图片后缀随机生成文件名
                $ext = $dat->getClientOriginalExtension();
                $fileu_name = time().rand('1000','9999').'.'.$ext; 
                // 图片移入临时文件夹
                $dat->move('./admin/uploads',$fileu_name);
                // 将新文件名赋给图片
                $data['g_image'] = $fileu_name;
        }
            // 多传
        $dat = $request->file('g_imgs');
       if($dat){
        // 遍历多图片
        foreach ($dat as $k => $v) {
            if($v){
                    // 获取图片后缀
                    $ext = $v->getClientOriginalExtension();
                    // 设成图片数组，每次一张添加到数组
                    $filename[] = time().rand('1000','9999').'.'.$ext;
                    $v->move('./admin/uploads',$filename[$k]);
            } 
        }  
          // 将多图片拼成字符串存到数据库       
        $imgs = implode(',',$filename);
        // 新文件名赋给要村的图片文件
        $data['g_imgs'] = $imgs;
           }
        // 将获得的添加值赋给字段  
        $upid = $data['sort'][0];
        $sid = $data['sort'][1];

        $data['s_upid'] = $upid;
        $data['s_id'] = $sid;
        unset($data['sort']);
        // 执行添加
        $id = DB::table('good')->insertGetId($data);
        if($id>0){
            return redirect("admin/good")->with('msg','添加成功');          
        }else{
            return back()->with('error','添加失败');
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
        // 获取要修改的商品信息
        $data = DB::table('good')->where('g_id',$id)->first();
        // 将图片分割成数组
        $imgs = explode(',',$data->g_imgs);

        $sort = DB::table('sort')->where('s_upid',0)->get();
       // dd($data);
        return view('Admin.Good.edit',['ob'=>$data,'sort'=>$sort,'imgs'=>$imgs]);

         
        // $cates = Cate::where('pid','0')->get();
        // return view('admin.goods.update',['good'=>$good,'cates'=>$cates,'title'=>'修改详情']);
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
        $dat = $request->file('g_image');
        // 若有文件上传 获取后缀，随机生成文件名
        if($dat){
            $ext = $dat->getClientOriginalExtension();
            $fileu_name = time().rand('1000','9999').'.'.$ext; // dd($fileu_name);
            $dat->move('./admin/uploads',$fileu_name);
            $data = $request->except('_token','_method');
            // 新文件名赋给要村的图片文件
            $data['g_image'] = $fileu_name;
            // dd($data);
        }else{
            $data = $request->except('_token','_method');
        }
        // dd($data);

             // 多传

       // 含多图为二维数组
        // $data = $request->except('_token','_method');
        // dd($data);
        // 要修改的图片是一维数组
        $dat = $request->file('g_imgs');
        // dd($dat);
        //  dd($data);
        if($dat){
            foreach ($dat as $k => $v) {
                // 获取要修改图片数组中一个图片 即$v
                // dd($v);
                if($v)
                {
                    $ext = $v->getClientOriginalExtension();
                    // 设成图片数组，每次一张添加到数组
                    $filename[] = time().rand('1000','9999').'.'.$ext;
                     // dd($v);
                    // dd($filename);
                    foreach($filename as $a){

                    }
                    // $a = $filename[];
                    // dd($a);

                    $v->move('./admin/uploads',$a);

                } 
            }  
            // 获取要修改的信息
            $data = $request->except('_token','_method');
                   // dd($data); 
            $imgs = implode(',',$filename);
            // dd($data);
            $data['g_imgs'] = $imgs;
       }
       // 执行修改
        $row = DB::table('good')->where('g_id',$id)->update($data);
        // dd($row);
        if($row>0){
            return redirect('admin/good')->with('msg','修改成功');
        }else{
            return redirect('admin/good')->with('error','修改失败');
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
        // 获取要删除的商品信息
        $row = DB::table('good')->where('g_id',$id)->delete();
        if($row>0){
            return redirect('/admin/good')->with('msg','删除成功');
        }else{
            return redirect('/admin/good')->with('error','删除失败');
        }
    }

}
