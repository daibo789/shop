<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class LoginController extends Controller
{
    //会员首页
    public function index(){
        echo "登录";
    }

     //添加用户
    public function create(){//get
    	echo "添加用户";
    	return view('admin.create_administrator');
    }
    //插入操作
    public function store(){//post

    }
}
