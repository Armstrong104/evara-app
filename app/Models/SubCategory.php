<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;


    private static $subCategory;


    public static function saveSubCategory($request){
        self::$subCategory = new SubCategory();
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->status = $request->status;
        self::$subCategory->image = imageUpload($request->image,'subCategory-images');
        self::$subCategory->save();
    }

    public static function updateSubCategory($request,$id){
        self::$subCategory = SubCategory::find($id);
        self::$subCategory->category_id = $request->category_id;
        self::$subCategory->name = $request->name;
        self::$subCategory->description = $request->description;
        self::$subCategory->status = $request->status;
        if($request->image){
            if(file_exists(self::$subCategory->image)){
                unlink(self::$subCategory->image);
            }
            self::$subCategory->image = imageUpload($request->image,'subCategory-images');
        }
        self::$subCategory->save();
    }



    public static function deleteSubCategory($id)
    {
        self::$subCategory = SubCategory::find($id);
        if(file_exists(self::$subCategory->image)){
            unlink(self::$subCategory->image);
        }
        self::$subCategory->delete();
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
