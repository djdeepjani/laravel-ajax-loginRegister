<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart()
    {
        $cart = session()->get('cart', []);
        echo "<pre>";
        print_r($cart);
        die;  
        if(isset($cart[0][157])) {
            $cart[0][157]['quantity']++;
        } else {
            $cart[][158] = [
                "menuname" => "Test Menu",
                "quantity" => 1,
                "price"    => 120,
                "modifier" => [
                    11,
                    12
                ],
                "modifier_item" => [
                    [
                        166,
                        162
                    ],
                    [167]
                ]
            ];
        }
          
        session()->put('cart', $cart);
        return redirect()->back();
    }

    public function remove()
    {
        $cart = session()->get('cart');
        if(isset($cart[1])) {
            unset($cart[1]);
            session()->put('cart', $cart);
        }
        return redirect()->back();
    }
}
