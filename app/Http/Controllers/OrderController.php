<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // tampilkan data order invoice unique distinct dan merchant id


        $orders = Order::join('users', 'orders.merchant_id', '=', 'users.id')
                        ->select('orders.invoice','users.id', 'users.name','orders.total_price', 'orders.status', 'orders.payment_method', 'orders.payment_date')
                        ->distinct()
                        ->get();
                        // dd($orders);

        return view('orders.index', compact('orders'));

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
    public function show(string $id, string $order)
    {
        // tampilkan detail order
        $orders = Order::join('users', 'orders.merchant_id', '=', 'users.id')
        ->select('orders.invoice','users.id', 'users.name','orders.total_price', 'orders.status', 'orders.payment_method', 'orders.payment_date')
        ->distinct()
        ->get();
        return view('orders.show', compact('orders'));    }

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
