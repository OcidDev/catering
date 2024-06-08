<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('user.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort(404);
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
        $user = User::find(Auth::user()->id);
        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'phone' => 'required|numeric',
            'password' => 'nullable|min:8',
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // cari data user
        $user = User::find($id);

        if ($user) {
            // Update data user
            $user->name = $request->name;
            $user->email = $request->email;

            // update data password
            if ($request->password) {
                $user->password = bcrypt($request->password);
            }

            $user->save();

            // update data detail user
            $detail_user = DetailUser::where('user_id', $id)->first();

            if ($detail_user) {
                $detail_user->phone = $request->phone;
                $detail_user->address = $request->address;
                $detail_user->gender = $request->gender;

                if ($request->hasFile('photo')) {
                    $image = $request->file('photo');
                    $imageName = time().'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('images'), $imageName);
                    $detail_user->photo = $imageName;
                }

                $detail_user->save();

                return redirect()->route('profile.index');
            } else {
                // Handle case when detail_user is not found
                // Misalnya, return response error atau redirect ke halaman tertentu
            }
        } else {
            // Handle case when user is not found
            // Misalnya, return response error atau redirect ke halaman tertentu
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort(404);
    }
}
