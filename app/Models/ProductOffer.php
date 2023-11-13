<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    use HasFactory;

    private static $productOffer,$imageUrl;


    public static function newProductOffer($request){
        self::$imageUrl = $request->file('image') ? imageUpload($request->image,'productOffer-images') : ' ';
        self::$productOffer = new ProductOffer();
        self::saveBasicInfo($request,self::$productOffer,self::$imageUrl);
    }

    public static function updateProductOffer($request,$productOffer){
        if($request->file('image')){
            if(file_exists($productOffer->image)){
                unlink($productOffer->image);
            }
            self::$imageUrl = imageUpload($request->image,'productOffer-images');
        }else{
            self::$imageUrl = $productOffer->image;
        }
        self::saveBasicInfo($request,$productOffer,self::$imageUrl);
    }

    private static function saveBasicInfo($request,$productOffer,$imageUrl){
        $productOffer->product_id = $request->product_id;
        $productOffer->title_one = $request->title_one;
        $productOffer->title_two = $request->title_two;
        $productOffer->title_three = $request->title_three;
        $productOffer->description = $request->description;
        $productOffer->image = $imageUrl;
        $productOffer->status = $request->status;
        $productOffer->save();
    }



    public static function deleteProductOffer($productOffer)
    {
        if(file_exists($productOffer->image)){
            unlink($productOffer->image);
        }
        $productOffer->delete();
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
