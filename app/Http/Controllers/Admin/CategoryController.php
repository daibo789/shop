<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CategoryController extends Controller
{
    //分类首页
    public function index(){
  		
    	$categorys = \DB::table('bb_category')->paginate(5);
    	$categorys_all = \DB::table('bb_category')->get();
        //对所有分类进行整理 
        $categorys_all = $this->catData($categorys_all,0);
    	return view('admin.category')->with('categorys',$categorys)->with('categorys_all',$categorys_all);
    }


     //插入操作
    public function store(Request $request){//post

        parse_str($_POST['str'],$arr);
        unset($arr['_token']);

        $pid =  $arr['pid'];

        if ($arr['pid']!=0) {//非一级菜单 去数据查找 上一级的信息

        	$pid =  $arr['pid'];
        	$oldCat = \DB::table('bb_category')->where('id', $pid)->first();
        	//更改path

        	$arr['path'] = $oldCat->path.$oldCat->id.'-';
        
        }
   
        $message = [
            'catName.required' => '请输入标题',
            // 'username.max' => '请输入用户名不超过255',
            // 'pass.required' => '请输入密码',
        ];
        $validator = \Validator::make($arr, [
        	'catName' => 'required',
            // 'username' => 'required|unique:bb_user|max:255',
            // 'pass' => 'required',
        ],$message);

        $ddd = $validator->fails();
      
        if ($ddd) {
     
            return   $validator->getMessageBag()->getMessages();
      
        }else{

            $result  =  \DB::table('bb_category')->insert($arr);
            if ($result) {
                return 1;
            }else{
                return 0 ;
            }
            
         }
    
    }  


   //修改页面
    public function edit($catid){//get
        $categorys_all = \DB::table('bb_category')->get();
        //对所有分类进行整理 
        $categorys_all = $this->catData($categorys_all,0);
        $categoryInfo = \DB::table('bb_category')->where('id', $catid)->first();
        // var_dump($adminInfo);
        return view('admin.category_edit')->with('categorys_all',$categorys_all)->with('categoryInfo',$categoryInfo);
    }



      //更新操作
    public function update($id){//post

          parse_str($_POST['str'],$arr);
        unset($arr['_token']);

        $pid =  $arr['pid'];

        if ($arr['pid']!=0) {//非一级菜单 去数据查找 上一级的信息

            $pid =  $arr['pid'];
            $oldCat = \DB::table('bb_category')->where('id', $pid)->first();
            //更改path

            $arr['path'] = $oldCat->path.$oldCat->id.'-';
        
        }
   
        $message = [
            'catName.required' => '请输入标题',
            // 'username.max' => '请输入用户名不超过255',
            // 'pass.required' => '请输入密码',
        ];
        $validator = \Validator::make($arr, [
            'catName' => 'required',
            // 'username' => 'required|unique:bb_user|max:255',
            // 'pass' => 'required',
        ],$message);

        $ddd = $validator->fails();
      
        if ($ddd) {
     
            return   $validator->getMessageBag()->getMessages();
      
        }else{

            $result  =  \DB::table('bb_category')->where('id',$id)->update($arr);
            if ($result) {
                return 1;
            }else{
                return 0 ;
            }
            
         }
        
    }
    //删除操作
    public function destroy($adminId){//post
        $result  =  \DB::table('bb_admin')->where('id',$adminId)->delete();
        if ($result) {
                return 1;
            }else{
                return 0 ;
            }
    }




    //整理分类
    public function catData ($data,$pid){
        $muArr = array();
        foreach ($data as $key=>$value) { 
            // echo '<pre>';
            // var_dump($pid.'-'.$value->id);
            if ($value->pid == $pid) {
                $muArr[$value->id] = $value;
                $muArr[$value->id]->zi =  $this->catData($data,$value->id);
                
            }
        }
        return $muArr;
    }
}
