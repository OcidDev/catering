<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MenusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // tampilkan data
        $menus = Menu::all()->where('merchant_id', Auth::user()->id);
        return view('menu.index', compact('menus'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('menu.create',compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $merchant_id = ;
        $data['merchant_id'] = Auth::user()->id;
        // str slug
        $data['slug'] = Str::slug($request->name);

        // upload image
        $data['image'] = $request->file('image')->store('assets/photo', 'public');

        // store data
        Menu::create($data);
        return redirect()->route('menu.index');


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
        // tampilkan data
        $menu = Menu::find($id);
        $categories = Category::all();
        return view('menu.edit', compact('menu','categories'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validasi
        $data = $request->validate([
            'category_id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $merchant_id = 1;
        $data['merchant_id'] = $merchant_id;
        // str slug
        $data['slug'] = Str::slug($request->name);
        // cek apakah ada file image yang diupload jika ada maka hapus file lama dan upload baru
        if($request->file('image')){
            $menu = Menu::find($id);
            Storage::delete('public/'.$menu->image);
            $data['image'] = $request->file('image')->store('assets/photo', 'public');
        }else{
            unset($data['image']);
        }

        // update data
        Menu::find($id)->update($data);
        return redirect()->route('menu.index');




    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //cari data
        $menu = Menu::find($id);
        //hapus file image
        Storage::delete('public/'.$menu->image);
        //hapus data
        $menu->delete();
        return redirect()->route('menu.index');
    }
}
