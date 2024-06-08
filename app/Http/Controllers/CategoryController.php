<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('category.index',compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Create str slug
        $data['slug'] = Str::slug($request->input('name'));
        //store image
        $data['image'] = $request->file('image')->store('assets/photo', 'public');

        // Store data
        Category::create($data);
        return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //tamplikan data yang akan di edit
        $category = Category::find($id);
        return view('category.edit',compact('category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // edit data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // Create str slug
        $data['slug'] = Str::slug($request->input('name'));

        // delete gambar lama jika ada gambar baru
        if ($request->file('image')) {
            $category = Category::find($id);
            Storage::delete('public/'.$category->image);
        }


        //store image jika ada gambar baru
        if ($request->file('image')) {
            $data['image'] = $request->file('image')->store('assets/photo', 'public');
        }

        // update data
        Category::find($id)->update($data);
        return redirect()->route('category.index');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // hapus gambar
        $category = Category::find($id);
        Storage::delete('public/'.$category->image);
        //delete data
        Category::destroy($id);
        return redirect()->route('category.index');

    }
}
