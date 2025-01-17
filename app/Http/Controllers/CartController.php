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

        // return Redirect::back();
        return response()->noContent();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $request->session()->forget('cart');

        return response()->noContent();
    }
}
