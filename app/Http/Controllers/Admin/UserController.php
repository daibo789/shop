<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB;
class UserController extends Controller
{
    //会员首页
    public function index(){
        $users = DB::table('bb_user')->paginate(15);
    	return view('admin.user_index')->with('users',$users);
    }

     //添加用户
    public function create(){//get
    	return view('admin.add_user');
    }
    //插入操作
    public function store(Request $request){//post
        // echo  "数据库验证失败11111" ;
        return 1;
        exit();
        parse_str($_POST['str'],$arr);
        unset($arr['pass2']);
        unset($arr['_token']);
        
        $message = [
            'username.required' => '请输入用户名',
            'username.max' => '请输入用户名不超过255',
            'pass.required' => '请输入用户名123123',
        ];
        $validator = Validator::make($arr, [
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
            $result  =  \DB::table('bb_user')->insert($arr);
            if ($result) {

                return redirect('/admin/user/');
            }else{
                return 0 ;
            }
            
        }
    
    }


}
