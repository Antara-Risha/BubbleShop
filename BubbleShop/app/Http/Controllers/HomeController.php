<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home');
    }

    /**
     * Individual password change
     *
     * @return void
     */
    public function changePasswordForm()
    {
        $user = User::findOrfail(Auth::id());
        return view('user.change_password', compact('user'));
    }

    public function updatePassword(Request $request)
    {
        $data = $request->validate([
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        User::where('id', Auth::id())
            ->update(['password' => Hash::make($data['password'])]);

        $request->session()->flash('message', 'Password has been updated.');
        return redirect()->route('home');
    }
}
