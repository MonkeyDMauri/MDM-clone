<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getPosts() {
        return response()->json(['success' => true]);
    }
}
