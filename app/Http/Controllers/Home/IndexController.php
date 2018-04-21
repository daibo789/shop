<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class IndexController extends Controller
{
    //前台首页
    public function index(){
    	echo "前台首页";
    	return view('Home.index');
    }
}
