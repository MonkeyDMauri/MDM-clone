<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

// this facade is for using Auth
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    // function that handles the sign in process, meaning it saves new user info to database using a User model.
    public function signIn (Request $request) {
        // sign in code goes here

        // validation rules.
        $input = $request->validate([
            'name' => 'required|min:3',
            'gender' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        // manually hashing password before creating new user account.
        $input['passsword'] = Hash::make($input['password']);
    
        // setting right default image depending on new user's selected gender.
        if ($request->gender === 'male') {
            $input['profile_pic_path'] = 'male-pic.jpg';
        } else {
            $input['profile_pic_path'] = 'female-pic.jpeg';
        }

        // Creating new user account using the User model.
        $user = User::create($input);

        // returning user back to sign in page with a success message.
        return back()->with('message', 'your account has been created');
    }


    // Code for Log In.
    public function logIn(Request $request) {
        $input = $request->validate([
            'name'=> 'required',
            'password'=> 'required'
        ]);        

        if (Auth::attempt( ['name' =>$input['name'], 'password' => $input['password']])) {
            return view('home.home');
        }

        return back()->withErrors('check your username or password');
    }

    // Function to logout user and invalidate current session.
    public function logout(Request $request) {
        auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }


    
    // This function gets all posts current user has created only (not all posts).
    public function getPosts() {

        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'errorMessage' => 'no user logged in'
            ]);
        }

        $posts = $user->posts;

        return response()->json([
            'success' => true,
            'posts' => $posts
        ]);
    }

    public function editProfile(Request $request) {

        $input = Validator::make( $request->all(), [
            'name' => 'required|string|min:3',
            'email' => 'required|email',
            'gender' => 'required'
        ],[
            'name.min' => 'Name must be 3 characters long at least',
            'email.email' => 'Invalid email format'
        ]);

        if ($input->fails()) {
            return back()->withErrors($input, 'editProfileErrors')->withInput();
        }

        $currentUser = auth()->user();

        $currentUser->update([
            'name' => $request->name,
            'email' => $request->email,
            'gender' => $request->gender
        ]);

        return back()->with('success', 'changes were saved');

    }

    public function changeProfilePic(Request $request) {
  

        $img = $request->file('new-pic');

        $imgName = $img->getClientOriginalName();

        $path = $img->storeAs('images/other_images', $imgName, 'public');

        $user = Auth()->user();
        $user->profile_pic_path = $imgName;
        $user->save();

        return back();
    }
}


