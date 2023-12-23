<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;

    private static $courier;

    public static function newCourier($request){
        self::$courier = new Courier();
        self::saveBasicInfo($request,self::$courier);
    }
    public static function updateCourier($request,$courier){
        self::saveBasicInfo($request,$courier);
    }

    public static function deleteCourier($courier){
        $courier->delete();
    }

    private static function saveBasicInfo($request,$courier){
        $courier->name = $request->name;
        $courier->email = $request->email;
        $courier->mobile = $request->mobile;
        $courier->address = $request->address;
        $courier->shipping_cost = $request->shipping_cost;
        $courier->status = $request->status;
        $courier->save();
    }
}
