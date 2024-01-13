<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseGuide extends Model
{
    use HasFactory;

    private static $purchaseGuide;

    public static function newPurchaseGuide($request){
        self::$purchaseGuide = new PurchaseGuide();
        self::$purchaseGuide->description = $request->description;
        self::$purchaseGuide->save();
    }

    public static function updatePurchaseGuide($request,$purchaseGuide){
        $purchaseGuide->description = $request->description;
        $purchaseGuide->save();
    }
}
