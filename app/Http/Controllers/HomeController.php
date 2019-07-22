<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Password;
use Illuminate\Support\Facades\Auth;

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
        $id = Auth::id();

        $getPasswords = Password::where('user_id', $id)->get();

        return view('home', ['passwords' => $getPasswords]);
    }
}
