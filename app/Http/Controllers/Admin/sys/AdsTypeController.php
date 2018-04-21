<?php

namespace App\Http\Controllers\Admin\sys;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class AdsTypeController extends Controller
{
    //后台用户首页
    public function index(){
    	$admins = \DB::table('bb_admin')->paginate(5);
    	return view('admin.admin')->with('admins',$admins);
    }
    //添加用户
    public function create(){//get
    	echo "添加用户";
    	return view('admin.create_administrator');
    }
    //插入操作
    public function store(Request $request){//post
    
        parse_str($_POST['str'],$arr);
        unset($arr['_token']);
        
        $message = [
            'username.required' => '请输入用户名',
            'username.max' => '请输入用户名不超过255',
            'pass.required' => '请输入密码',
        ];
        $validator = \Validator::make($arr, [
            'username' => 'required|unique:bb_user|max:255',
            'pass' => 'required',
        ],$message);

        $ddd = $validator->fails();
      
        if ($ddd) {
            // echo  "数据库验证失败" ;
            return   $validator->getMessageBag()->getMessages();
            // return redirect('post/create')
            //             ->withErrors($validator)
            //             ->withInput();
        }else{

            $arr['time'] = time();
            $result  =  \DB::table('bb_admin')->insert($arr);
            if ($result) {
                return 1;
            }else{
                return 0 ;
            }
            
         }
    
    }       
    //修改页面
    public function edit($adminId){//get

        $adminInfo = \DB::table('bb_admin')->where('id', $adminId)->first();
        // var_dump($adminInfo);
    	return view('admin.admin_edit')->with('adminInfo',$adminInfo);
    }


    //更新操作
    public function update(){//post
         parse_str($_POST['str'],$arr);
        unset($arr['_token']);
        $adminId = $arr['id'];
        unset($arr['id']);
        // var_dump($arr);
        // exit();
        $message = [
            'username.required' => '请输入用户名',
            'username.max' => '请输入用户名不超过255',
            'pass.required' => '请输入密码',
        ];
        $validator = \Validator::make($arr, [
            'username' => 'required|unique:bb_user|max:255',
            'pass' => 'required',
        ],$message);

        $ddd = $validator->fails();
      
        if ($ddd) {
            // echo  "数据库验证失败" ;
            return   $validator->getMessageBag()->getMessages();
            // return redirect('post/create')
            //             ->withErrors($validator)
            //             ->withInput();
        }else{

            $result  =  \DB::table('bb_admin')->where('id',$adminId)->update($arr);
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
}
