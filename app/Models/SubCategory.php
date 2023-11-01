<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;


    private static $subCategory,$imageUrl;


    public static function newSubCategory($request){
        self::$imageUrl = $request->file('image') ? imageUpload($request->image,'subCategory-images') : ' ';
        self::$subCategory = new SubCategory();
        self::saveBasicInfo($request,self::$subCategory,self::$imageUrl);
    }

    public static function updateSubCategory($request,$subCategory){
        if($request->file('image')){
            if(file_exists($subCategory->image)){
                unlink($subCategory->image);
            }
            self::$imageUrl = imageUpload($request->image,'subCategory-images');
        }else{
            self::$imageUrl = $subCategory->image;
        }
        self::saveBasicInfo($request,$subCategory,self::$imageUrl);
    }

    private static function saveBasicInfo($request,$subCategory,$imageUrl){
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->description = $request->description;
        $subCategory->image = $imageUrl;
        $subCategory->status = $request->status;
        $subCategory->save();
    }



    public static function deleteSubCategory($subCategory)
    {
        if(file_exists($subCategory->image)){
            unlink($subCategory->image);
        }
        $subCategory->delete();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
