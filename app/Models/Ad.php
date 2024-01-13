<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    private static $ad,$imageUrl;

    public static function newAd($request) {
        self::$imageUrl = $request->file('image') ? imageUpload($request->image,'upload/ad-images/') : 'upload/product.png';

        self::$ad = new Ad();

        self::saveBasicInfo($request,self::$ad,self::$imageUrl);

    }

    public static function updateAd($request,$ad){
        if($request->file('image')){
            if(file_exists($ad->image)){
                unlink($ad->image);
            }
            self::$imageUrl = imageUpload($request->image,'upload/ad-images/');
        }else{
            self::$imageUrl = $ad->image;
        }
        self::saveBasicInfo($request,$ad,self::$imageUrl);
    }

    private static function saveBasicInfo($request,$ad,$imageUrl){
        $ad->product_id = $request->product_id;
        $ad->title = $request->title;
        $ad->sub_title = $request->sub_title;
        $ad->position = $request->position;
        $ad->offer_price = $request->offer_price;
        $ad->discount = $request->discount;
        $ad->image = $imageUrl;
        $ad->status = $request->status;
        $ad->save();
    }

    public static function deleteAd($ad){
        if(file_exists($ad->image)){
            unlink($ad->image);
        }
        $ad->delete();
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
