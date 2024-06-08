<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function user_profile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.profile', compact('user'));
    }

    public function user_profile_edit()
    {
        $user = User::find(Auth::user()->id);
        return view('user.edit', compact('user'));
    }

    public function user_profile_update(Request $request, $id)
    {
        echo 'tes';
        exit;
        // validation
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'phone' => 'required|numeric|phone',
            'password' => 'nullable|min:8',
            'address' => 'required',
            'gender' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        // store image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $user->photo = $imageName;
        }

        // update data password
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }

        // cari data user
        $user = User::find($id);

        // Update data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        // update data detail user
        $detail_user = DetailUser::where('user_id', $id)->first();
        $detail_user->phone = $request->phone;
        $detail_user->address = $request->address;
        $detail_user->gender = $request->gender;
        $detail_user->save();

        return redirect()->route('user.profile');
    }
}
