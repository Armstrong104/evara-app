<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $brand,$imageUrl;

    public static function newBrand($request){
        self::$imageUrl = $request->file('image') ? imageUpload($request->image,'brand-images') : ' ';
        self::$brand = new Brand();
        self::saveBasicInfo($request,self::$brand,self::$imageUrl);
    }


    public static function updateBrand($request,$brand){
        if($request->file('image')){
            if(file_exists($brand->image)){
                unlink($brand->image);
            }
            self::$imageUrl = imageUpload($request->image,'brand-images');
        }else{
            self::$imageUrl = $brand->image;
        }
        self::saveBasicInfo($request,$brand,self::$imageUrl);
    }

    private static function saveBasicInfo($request,$brand,$imageUrl){
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->image = $imageUrl;
        $brand->status = $request->status;
        $brand->save();
    }

    public static function deleteBrand($brand){
        if(file_exists($brand->image)){
            unlink($brand->image);
        }
        $brand->delete();
    }


}
