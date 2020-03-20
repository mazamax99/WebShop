<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
//    public function getCategory(){
//        $category= Category::find($this->category_id);
//
//    }
  //возрат текущей категории товара - связь
      public function category(){
        return $this->belongsTo(Category::class);
    }
    public function getPriceForCount() {
        if (!is_null($this->pivot)) {
            return $this->pivot->count * $this->price;
        }
        return $this->price;
    }
}
