<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    //

    public function create(Request $request) {
        return view('auth.reset-password');
    }
}
