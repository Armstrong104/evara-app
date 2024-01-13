<?php

namespace App\Http\Controllers;

use App\Models\Courier;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.courier.index',['couriers' => Courier::where('status',1)->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.courier.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required | unique:couriers',
            'mobile' => 'required | unique:couriers'
        ]);
        Courier::newCourier($request);
        return back()->with('msg','Courier Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Courier $courier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Courier $courier)
    {
        return view('admin.courier.edit',['courier' => $courier]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Courier $courier)
    {
        Courier::updateCourier($request,$courier);
        return to_route('courier.index')->with('msg','Courier Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Courier $courier)
    {
        Courier::deleteCourier($courier);
        return back()->with('msg','Courier Deleted Successfully!');
    }
}
