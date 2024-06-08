<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // cek role jika user yang login ka masuk ke halaman dashboard user
        if (auth()->user()->role == 'user') {
            return redirect()->route('dashboarduser.index');
        }elseif (auth()->user()->role == 'merchant') {
            return redirect()->route('dashboardmerchant.index');
        }

    }
}
