<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category,$image,$imageName,$directory,$imageUrl;

    // private static function getImageUrl($request){
    //     self::$image = $request->file('image');
    //     self::$imageName = self::$image->getClientOriginalName();
    //     self::$directory = "upload/category-images/";
    //     self::$image->move(self::$directory,self::$imageName);
    //     self::$imageUrl = self::$directory.self::$imageName;
    //     return self::$imageUrl;
    // }

    public static function saveCategory($request){
        // if($request->file('image')){
        //     self::$imageUrl = self::getImageUrl($request);
        // }else{
        //     self::$imageUrl = ' ';
        // }
        // self::$imageUrl = $request->file('image') ? self::getImageUrl($request) : ' ';
        self::$category = new Category();
        self::$category->image = imageUpload($request->image,'category-images');
        self::saveBasicInfo($request,self::$category);

    }

    public static function updateCategory($request,$id){

        self::$category = Category::find($id);
        if($request->image){
            if(file_exists(self::$category->image)){
                unlink(self::$category->image);
            }
            self::$category->image = imageUpload($request->image,'category-images');
        }

        self::saveBasicInfo($request,self::$category);

    }

    private static function saveBasicInfo($request,$category){

        $category->name = $request->name;
        $category->description = $request->description;
        $category->status = $request->status;
        $category->save();
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
