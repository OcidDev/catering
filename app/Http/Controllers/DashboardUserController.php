<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $perPage = 5;
        $menus = Menu::query();

        if ($request->cari !== null) {
            $menus->where('name', 'like', "%".$request->cari."%");
        }

        $menus = $menus->paginate($perPage);

        return view('dashboarduser.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // tampilkan data cart
        $cart = Cart::content();

        dd($cart);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            'options' => []
        ]);

        // tampilkan data cart
        $cart = Cart::content();
        dd($cart);

    }

    /**
     * Display the specified resource.
     */
    public function show( string $id)
    {
        // menampilkan data cart
        $cart = Cart::content();

        // menampilkan cart
        dd($cart);


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
        // validasi
        $request->validate([
            'qty' => 'required',
        ]);

        // update data cart
        Cart::update($id, $request->qty);

        // tampilkan data cart  setelah diupdate
        return redirect()->route('cart.index')->with('success', 'Data berhasil diupdate');



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
