<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    public static $product;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('website.cart.index',['products' => Cart::content()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        self::$product = Product::find($request->id);
        Cart::add([
            'id'        => $request->id,
            'name'      => self::$product->name,
            'qty'       => $request->qty,
            'price'     => self::$product->selling_price,
            'options'   =>
                [
                    'image'     => self::$product->image,
                    'code'      => self::$product->code,
                    'color'     => $request->color,
                    'size'      => $request->size,
                ]

            ]);

            return to_route('cart.index')->with('msg','Cart Product Added Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Cart::remove($id);
        return back()->with('msg','Cart Product Removed Succsessfully!');
    }

    public function delete(string $rowId){
        Cart::remove($rowId);
        return back()->with('msg','Cart Product Removed Succsessfully!');
    }

    public function updateProduct(Request $request){
        foreach($request->data as $item){
            Cart::update($item['rowId'],$item['qty']);
        }
        return to_route('cart.index')->with('msg','Cart Product Updated Successfully!');
    }
}
