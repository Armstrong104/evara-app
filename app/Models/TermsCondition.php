<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermsCondition extends Model
{
    use HasFactory;

    private static $termsCondition;

    public static function newTermsCondition($request){
        self::$termsCondition = new TermsCondition();
        self::$termsCondition->description = $request->description;
        self::$termsCondition->save();
    }

    public static function updateTermsCondition($request,$termsCondition){
        $termsCondition->description = $request->description;
        $termsCondition->save();
    }
}
