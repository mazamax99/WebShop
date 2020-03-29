<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders=Order::where('status',1)->get();
        //dd($orders);
        return view('auth.orders.index',compact('orders'));
    }
    public function show(Order $order)
    {
        $products = $order->products()->withTrashed()->get();
        return view('auth.orders.show', compact('order', 'products'));
    }

}
