<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // function that handles the sign in process, meaning it saves new user info to database using a User model.
    public function signIn (Request $request) {
        // sign in code goes here

        $input = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        $input['passsword'] = Hash::make($input['passsword']);

        $user = User::create($input);


        return 'hello MF';
    }
}
