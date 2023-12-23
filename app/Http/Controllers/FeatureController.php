<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;

class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.feature.index',['features' => Feature::where('status',1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.feature.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required | unique:features,name',
            'image' => 'image'
        ]);

        Feature::newFeature($request);
        return back()->with('msg','Feature Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Feature $feature)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Feature $feature)
    {
        return view('admin.feature.edit',['feature' => $feature]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Feature $feature)
    {
        $request->validate([
            'image' => 'image'
        ]);
        Feature::updateFeature($request,$feature);
        return to_route('feature.index')->with('msg','Feature Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Feature $feature)
    {
        Feature::deleteFeature($feature);
        return back()->with('msg','Feature Deleted Successfully!');
    }
}
