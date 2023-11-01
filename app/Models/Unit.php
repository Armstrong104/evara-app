<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    private static $unit;
    public static function newUnit($request){
        self::$unit = new Unit();
        self::saveBasicInfo($request,self::$unit);
    }
    public static function updateUnit($request,$unit){
        self::saveBasicInfo($request,$unit);
    }
    public static function deleteUnit($unit){
        $unit->delete();
    }
    private static function saveBasicInfo($request,$unit){
        $unit->name = $request->name;
        $unit->code = $request->code;
        $unit->description = $request->description;
        $unit->status = $request->status;
        $unit->save();
    }
}
