<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    //

    public function create($token) {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function store(Request $request) {
        $input = $request->validate([
            'email' => 'required|email',
            'token' => 'required',
            'password' => 'required|confirmed'
        ]);

        // $status = Password::
    }
}
