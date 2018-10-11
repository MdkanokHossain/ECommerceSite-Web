<?php

namespace App\Http\Controllers;

use Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request) {
        $product = Product::find($request->product_id);
        Cart::add([
            'id'    => $product->id,
            'name'  => $product->product_name,
            'qty'   => $request->product_quantity,
            'price' => $product->product_price,
            'options'   => [
                'image'  => $product->product_image
            ]
        ]);

        return redirect('/show-cart');
    }

    public function showToCart() {
        $cartProducts = Cart::content();
        //return $cartProducts;

        return view('front-end.cart.show-cart', [
            'cartProducts'  =>  $cartProducts
        ]);
    }

    public function updateCart(Request $request) {
        Cart::update($request->row_id, $request->product_quantity);
        return redirect('/show-cart')->with('message', 'Cart product update successfully');
    }

    public function deleteCart($rowId) {
        Cart::remove($rowId);
        return redirect('/show-cart')->with('message', 'Cart product remove successfully');
    }
}
