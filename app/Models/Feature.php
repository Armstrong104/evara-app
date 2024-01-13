<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    private static $feature,$imageUrl;

    public static function newFeature($request){
        self::$imageUrl = $request->file('image') ? imageUpload($request->image,'upload/feature-images/') : ' ';
        self::$feature = new feature();
        self::saveBasicInfo($request,self::$feature,self::$imageUrl);
    }


    public static function updateFeature($request,$feature){
        if($request->file('image')){
            if(file_exists($feature->image)){
                unlink($feature->image);
            }
            self::$imageUrl = imageUpload($request->image,'upload/feature-images/');
        }else{
            self::$imageUrl = $feature->image;
        }
        self::saveBasicInfo($request,$feature,self::$imageUrl);
    }

    private static function saveBasicInfo($request,$feature,$imageUrl){
        $feature->name = $request->name;
        $feature->image = $imageUrl;
        $feature->status = $request->status;
        $feature->save();
    }

    public static function deleteFeature($feature){
        if(file_exists($feature->image)){
            unlink($feature->image);
        }
        $feature->delete();
    }
}
