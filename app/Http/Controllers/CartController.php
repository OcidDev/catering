<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;



class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // menampilkan data cart
        $cart = Cart::content();
        // dd($cart);


        // menampilkan total harga
        $total = Cart::total();
        $totaltax = 0;
        // dd($total);

        // menghilangkan 00 di belakang titik
        // dd($total);

        //menampilkan cart
        return view('cart.index', compact('cart', 'total','totaltax'));

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

        // dd($request->all());
        // validasi
        $request->validate([
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',

            ]);


            // insert data ke cart
        Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'weight' => 0,
            'qty' => 1,
            'options' => [
                'taxRate' => 0,
            ]
        ]);
        // dd(Cart::content());


        return redirect()->route('cart.index')->with('success', 'Data berhasil ditambahkan ke cart');


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
        // update data cart
        // get row id dari cart
        $cartItem = Cart::content()->where('id', $id)->first();
        // dd($cartItem);
        // exit;
        // saya ingin update dimana id= $id
        if ($cartItem) {
            $cartItem->qty = $request->qty;
            Cart::update($cartItem->rowId, [
            'id' => $cartItem->id,
            'qty' => $cartItem->qty,
            'options' => []
            ]);
        }


        return redirect()->route('cart.index')->with('success', 'Data berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        // update data cart
        // get row id dari cart
        $cartItem = Cart::content()->where('id', $id)->first();
        // dd($cartItem);
        // exit;
        // saya ingin update dimana id= $id
        if ($cartItem) {
            Cart::remove($cartItem->rowId, [
            'id' => $cartItem->id,
            ]);
        }


        return redirect()->route('cart.index')->with('success', 'Data berhasil diupdate');

    }

    public function bayar()
    {
        $cart = Cart::content();
        echo "tes";
        // menampilkan total harga
        // $total = Cart::total();
        // menghilangkan 00 di belakang titik
        // dd($total);

        //menampilkan cart
        // return view('cart.checkout', compact('cart'));

    }

}
