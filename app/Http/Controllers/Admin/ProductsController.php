<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ProductsController extends Controller
{
    //产品首页
    public function index(){
    	echo "产品首页";
    	return view('admin.products');
    }
}
