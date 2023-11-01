<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    private static $color;

    public static function newColor($request){
        self::$color = new Color();
        self::saveBasicInfo($request,self::$color);
    }
    public static function updateColor($request,$color){
        self::saveBasicInfo($request,$color);
    }

    public static function deleteColor($color){
        $color->delete();
    }

    private static function saveBasicInfo($request,$color){
        $color->name = $request->name;
        $color->code = $request->code;
        $color->description = $request->description;
        $color->status = $request->status;
        $color->save();
    }
}
