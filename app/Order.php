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
    public function saveOrder($name,$phone,$town,$car_manufacturer,$car_model,$year_manufacturer){

        if($this->status==0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->town = $town;
            $this->car_manufacturer = $car_manufacturer;
            $this->car_model = $car_model;
            $this->year_manufacturer = $year_manufacturer;
            $this ->status=1;
            $this ->save();
            session()->forget('orderId');
            return true;
        }
        else return false;

    }
}
