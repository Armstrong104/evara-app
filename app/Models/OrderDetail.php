<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;
    private static $orderDetail;

    public static function newOrderDetail($order)
    {
        foreach (Cart::content() as $item) {
            self::$orderDetail = new OrderDetail();
            self::$orderDetail->order_id = $order->id;
            self::$orderDetail->product_id = $item->id;
            self::$orderDetail->product_name = $item->name;
            self::$orderDetail->product_color = $item->options->color;
            self::$orderDetail->product_size = $item->options->size;
            self::$orderDetail->product_price = $item->price;
            self::$orderDetail->product_qty = $item->qty;
            self::$orderDetail->save();

            Cart::remove($item->rowId);
        }
    }
}
