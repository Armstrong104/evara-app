<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    private static $size;

    public static function newSize($request){
        self::$size = new Size();
        self::saveBasicInfo($request,self::$size);
    }
    public static function updateSize($request,$size){
        self::saveBasicInfo($request,$size);
    }

    public static function deleteSize($size){
        $size->delete();
    }

    private static function saveBasicInfo($request,$size){
        $size->name = $request->name;
        $size->code = $request->code;
        $size->description = $request->description;
        $size->status = $request->status;
        $size->save();
    }
}
