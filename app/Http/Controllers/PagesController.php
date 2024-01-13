<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public static function about()
    {
        return view('website.pages.about');
    }
    public static function contact()
    {
        return view('website.pages.contact');
    }
    public static function shippingPolicy()
    {
        return view('website.pages.shipping-policy');
    }
    public static function termsCondition()
    {
        return view('website.pages.terms-condition');
    }
    public static function returnPolicy()
    {
        return view('website.pages.return-policy');
    }
    public static function purchaseGuide()
    {
        return view('website.pages.purchase-guide');
    }


}
