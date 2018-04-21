<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class OrderController extends Controller
{
    //订单首页
    public function index(){
    	echo "订单首页";
    	return view('admin.products');
    }
}
