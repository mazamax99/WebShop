<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderConfirmRequest;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{

    public function order(){
        $orderId=session('orderId');
        if(!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
        }
        else
            return redirect()->route('index');
        return view('order',compact('order'));
    }

    public function basket(){

        $orderId=session('orderId');
        if(!is_null($orderId)) {
                $order = Order::findOrFail($orderId);
        }
        else
            return redirect()->route('index');
        return view('basket',compact('order'));
    }
    public function orderConfirm(OrderConfirmRequest $request){
        $request->validate([
            'town'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'car_manufacturer'=>'required',
            'car_model'=>'required',
            'year_manufacture'=>'required',
        ]);
        $orderId=session('orderId');
        if(!is_null($orderId)) {
            $order = Order::find($orderId);
            $result= $order->saveOrder($request->name,$request->phone,$request->town,$request->car_manufacturer,$request->car_model,$request->year_manufacture);

            if($result){
                session()->flash('success','Ваш заказ принят в обработку. Наш менеджер свяжется с вами в ближайшее время.');
            }
            else
                session()->flash('denied','Ошибка');

        }
        return redirect()->route('index');
    }
    public function basketAdd($productId){
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        }
       else{
           //добавление заказа в таблицу
           $order->products()->attach($productId);
           $pivotRow=$order->products()->where('product_id',$productId)->first()->pivot;
           if($pivotRow->count==0)
               $pivotRow->count==1;
       }

       if(Auth::check()){
           $order->user_id=Auth::id();
           $order->save();
       }
        $product=Product::find($productId);
       session()->flash('success','Добавлен товар: '. $product->name);

        return redirect()->route('basket');
    }
    public function basketRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);
        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count<2) {
                $order->products()->detach($productId);
            }
            else {
                //добавление заказа в таблицу
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        $product=Product::find($productId);
        session()->flash('denied','Удален товар: '. $product->name);

        return redirect()->route('basket');
    }
}
