<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use App\Coupon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd(auth()->user()->person->cuponsCart->first()->pivot->amount);
        // dd(auth()->user()->person->cuponsCart->pivot->amount);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Coupon $coupon)
    {

        // dd($coupon);
        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if (!$cart) {

            $cart = [
                $coupon->id => [
                    "name" => $coupon->product->name,
                    "quantity" => 1,
                    "price" => $coupon->end_price,
                    "photo" => $coupon->product->image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->route('cart.show')->with('success', 'Cupon agregado al carrito satisfactoriamente!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$coupon->id])) {

            $cart[$coupon->id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Cupon agregado al carrito satisfactoriamente!');
        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$coupon->id] = [
            "name" => $coupon->product->name,
            "quantity" => 1,
            "price" => $coupon->end_price,
            "photo" => $coupon->product->image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cupon agregado al carrito satisfactoriamente!');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return view("cart.show");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Coupon $coupon)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Coupon $coupon)
    {
        $cart = session()->get('cart');

        if (isset($cart[$coupon->id])) {

            unset($cart[$coupon->id]);

            session()->put('cart', $cart);
            session()->flash('success', 'Cupon eliminado correctamente!');
        }else{
            session()->flash('error', 'EL cupon no se encuntra en el carrito!');

        }
        return redirect()->back();
    }
}
