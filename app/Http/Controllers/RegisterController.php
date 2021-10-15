<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'phonenumber' => 'required|unique:users',
            'address' => 'required',
            'password' => 'required|confirmed'

        ]);

        $attributes['password'] = Hash::make($attributes['password']);


        User::create($attributes);

        $request->session()->flash('message', 'User has been registered. Please wait for admin approval.');
        return redirect()->route('login');
    }
}
