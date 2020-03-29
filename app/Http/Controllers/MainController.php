<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $product=Product::get();
        return view('index',compact('product'));
    }
    public function categories(){
        $categories=Category::get();
        return view('categories',compact('categories'));

    }
    public function category($code){
        $category = Category::where('code',$code)->first();
        return view('category',compact('category'));
        //dd($category);
    }
    public function product($category, $productCode)
    {
        $product = Product::where('code',$productCode)->firstOrFail();
        return view('product', compact('product'));
    }

}
