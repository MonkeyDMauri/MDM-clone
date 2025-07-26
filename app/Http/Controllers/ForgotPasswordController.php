<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    //

    public function create() {
        return view('auth.forgot-password');
    }

    public function store(Request $request) {
        return "store method";
    }
}
