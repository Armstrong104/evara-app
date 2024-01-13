<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Product;
use Illuminate\Http\Request;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.ad.index',['ads' => Ad::latest()->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ad.add', ['products' => Product::where('status',1)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
            'title' => 'required',
            'image' => 'image'
        ]);
        Ad::newAd($request);
        return back()->with('msg','Ad info Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ad $ad)
    {
        return view('admin.ad.show',['ad' => $ad]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ad $ad)
    {
        return view('admin.ad.edit',[
            'ad' => $ad,
            'products' => Product::where('status',1)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'product_id' => 'required',
            'title' => 'required',
            'image' => 'image'
        ]);
        Ad::updateAd($request,$ad);
        return to_route('ad.index')->with('msg','Ad Info Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ad $ad)
    {
        Ad::deleteAd($ad);
        return back()->with('msg','Ad Info Deleted Successfully!');
    }
}
