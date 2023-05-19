<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('links.login');
    }

    public function process(Request $request)
    {
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('links.index');
        }

        return redirect()->route('login');
    }
}
