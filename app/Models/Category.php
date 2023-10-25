<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public static $category;

    public static function saveCategory($request){
        self::$category = new Category();
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        self::$category->image = imageUpload($request->image,'category-images');
        self::$category->save();
    }

    public static function updateCategory($request,$id){
        self::$category = Category::find($id);
        self::$category->name = $request->name;
        self::$category->description = $request->description;
        if($request->image){
            if(file_exists(self::$category->image)){
                unlink(self::$category->image);
            }
            self::$category->image = imageUpload($request->image,'category-images');
        }
        self::$category->save();
    }

    public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if(file_exists(self::$category->image)){
            unlink(self::$category->image);
        }
        self::$category->delete();
    }
}
