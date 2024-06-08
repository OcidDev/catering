<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cart = Cart::content();
        $invoice = 'INV-'.time();
        $total = Cart::total();
        $status = 'pending';
        $paymennt_date = time();
        // dd($cart);

        // cek ada berapa merchant pada 1 onvoice (dilihat dari menus yang ada di cart)
        $merchant = 0;
        foreach ($cart as $item) {
            $menu_id = $item->id;
            $merchant = Menu::where('id', $menu_id)->first();
            $order = Order::create([
                'invoice' => $invoice,
                'customer_id' => auth()->user()->id,
                'merchant_id' => $merchant->merchant_id,
                'total_price' => $total,
                'payment_date' => $paymennt_date,
                'status' => $status,
            ]);
        }
        // Cart::destroy();
        return redirect()->route('cart.index')->with('success', 'Pesanan berhasil dibuat, silahkan lakukan pembayaran.');


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
    public function show(string $id)
    {


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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
