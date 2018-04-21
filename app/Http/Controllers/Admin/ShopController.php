<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ShopController extends Controller
{
    //商品首页
    public function index(){
    
    	return view('admin.shop_index');
    }
}
