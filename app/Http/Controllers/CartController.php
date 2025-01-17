<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->session()->put('cart', $request->cart);
        $request->session()->regenerate();

        return Redirect::back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $request->session()->forget('cart');

        return Redirect::back();

    }
}
