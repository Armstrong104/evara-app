<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private $customer, $wishListCheck, $wishlist;
    public function addWishlist($id)
    {
        $this->customer = Session::get('customer_id');
        if ($this->customer) {
            $this->wishListCheck = Wishlist::where('customer_id', $this->customer)->where('product_id', $id)->first();
            if (!$this->wishListCheck) {
                // $this->wishlist = Wishlist::newWishlist($this->customer,$id);
                $this->wishlist = new Wishlist();
                $this->wishlist->customer_id = $this->customer;
                $this->wishlist->product_id = $id;
                $this->wishlist->date = date('Y-m-d');
                $this->wishlist->timestamp = strtotime(date('Y-m-d'));
                $this->wishlist->save();
                return back()->with('msg', 'Product added to wishlist');
            } else {
                return back()->with('msg', 'Product already in wishlist');
            }
        } else {
            return to_route('login-register')->with('msg', 'Please login/register for add to wishlist');
        }
    }

    public function index()
    {
        $this->wishlist = Wishlist::where('customer_id', Session::get('customer_id'))->where('status', 1)->get();
        return view('website.customer.dashboard', [
            'wishlists' => $this->wishlist,
            'orders' => Order::where('customer_id', Session::get('customer_id'))->get(),
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $wishlists = Wishlist::find($id);
        $wishlists->delete();
        return back()->with('msg','Product removed from wishlist successfully.');
    }
}
