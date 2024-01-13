<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingPolicy extends Model
{
    use HasFactory;

    private static $shippingPolicy;

    public static function newShippingPolicy($request){
        self::$shippingPolicy = new ShippingPolicy();
        self::$shippingPolicy->description = $request->description;
        self::$shippingPolicy->save();
    }

    public static function updateShippingPolicy($request,$shippingPolicy){
        $shippingPolicy->description = $request->description;
        $shippingPolicy->save();
    }
}
