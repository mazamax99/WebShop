<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('count')->withTimestamps();
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function getFullPrice(){
        $sum=0;
        foreach ($this->products as $product){
            $sum+=$product-> getPriceForCount($product->pivot->count);
        }
        return $sum;
    }
    public function saveOrder($name,$phone,$town){

        if($this->status==0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->town = $town;
            $this ->status=1;
            $this ->save();
            session()->forget('orderId');
            return true;
        }
        else return false;

    }
}
