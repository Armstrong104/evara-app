<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnPolicy extends Model
{
    use HasFactory;

    private static $returnPolicy;

    public static function newReturnPolicy($request){
        self::$returnPolicy = new ReturnPolicy();
        self::$returnPolicy->description = $request->description;
        self::$returnPolicy->save();
    }

    public static function updateReturnPolicy($request,$returnPolicy){
        $returnPolicy->description = $request->description;
        $returnPolicy->save();
    }
}
