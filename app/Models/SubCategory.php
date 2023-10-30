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
        self::$subCategory->image = imageUpload($request->image,'subCategory-images');
        self::saveBasicInfo($request,self::$subCategory);
    }

    public static function updateSubCategory($request,$id){
        self::$subCategory = SubCategory::find($id);

        if($request->image){
            if(file_exists(self::$subCategory->image)){
                unlink(self::$subCategory->image);
            }
            self::$subCategory->image = imageUpload($request->image,'subCategory-images');
        }
        self::saveBasicInfo($request,self::$subCategory);
    }

    private static function saveBasicInfo($request,$subCategory){
        $subCategory->category_id = $request->category_id;
        $subCategory->name = $request->name;
        $subCategory->description = $request->description;
        $subCategory->status = $request->status;
        $subCategory->save();
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
