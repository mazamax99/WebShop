<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders=Order::where('status',1)->get();
        return view('auth.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $products = $order->products()->get();
        return view('auth.orders.show', compact('order', 'products'));
    }
}
