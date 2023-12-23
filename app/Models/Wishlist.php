<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wishlist extends Model
{
    use HasFactory;
    // private static $wish;
    // public static function newWishlist($customer,$id){
    //     self::$wish = new Wishlist();
    //     self::$wish->customer_id = $customer->id;
    //     self::$wish->product_id = $id;
    //     self::$wish->date = date('Y-m-d');
    //     self::$wish->timestamp = strtotime(date('Y-m-d'));
    //     self::$wish->save();
    //     return self::$wish;
    // }

    public function product(){
        return $this->belongsTo(Product::class);
    }

}
