<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function getPosts() {
        return response()->json(['success' => true]);
    }

    public function createPost(Request $request) {
        // Code to insert post into posts table.

        // Validating data received.
        $input = $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        // I forgot to set a default value for these columns in the "posts" table so I defined them here.
        $input['likes'] = 0;
        $input['dislikes'] = 0;
        $input['times_shared'] = 0;
        $input['user_id'] = Auth()->user()->id;

        // Inserting new post into "posts" table.
        $post = Post::create($input);

        // creating record to pivot table so there's a link between the post and the author.
        $user = auth()->user();
        $user->posts()->attach($post->id);

        return back()->with('success', 'Post created');
    }
}
