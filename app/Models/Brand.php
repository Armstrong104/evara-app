<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $brand;

    public static function saveBrand($request){
        self::$brand = new Brand();
        self::$brand->image = imageUpload($request->image,'brand-images');
        self::saveBasicInfo($request,self::$brand);
    }


    public static function updateBrand($request,$id){
        self::$brand = Brand::find($id);
        if($request->image){
            if(file_exists(self::$brand->image)){
                unlink(self::$brand->image);
            }
            self::$brand->image = imageUpload($request->image,'brand-images');
        }
        self::saveBasicInfo($request,self::$brand);
    }

    private static function saveBasicInfo($request,$brand){
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->status = $request->status;
        $brand->save();
    }

    public static function deleteBrand($id){
        self::$brand = Brand::find($id);
        if(file_exists(self::$brand->image)){
            unlink(self::$brand->image);
        }
        self::$brand->delete();
    }


}
