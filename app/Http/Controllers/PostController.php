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

    public function likePost(Request $request) {
        $input = $request->json()->all();

        $postId = $input['post_id'];

        // post instance/object.
        $post = Post::findOrFail($postId);

        // number of likes this post currently has.
        $postLikes = $post->likes;

        // current user.
        $user = Auth()->user();

        $liked = $user->likedPosts()->where('post_id', $postId)->exists();

        // checking to see if this user has already liked this post.
        if ($liked) {

            // removving like from this post (basic substraction, then update).
            $post->update([
                'likes' => $postLikes - 1
            ]);

            $post->save();

            $user->likedPosts()->detach($post->id);

            return response()->json(['post' => $post, 'success' => true, 'message' => 'disliking this post']);
        } else {
            
            // adding one more like to this post (basic sum, then update).
            $post->update([
                'likes' => $postLikes + 1
            ]);

            $post->save();

            // Now we add new row to the "likes" table to create a record that this user has already liked this post.
            $user->likedPosts()->attach($post->id);
        }


        return response()->json(['post' => $post, 'success' => true, 'message' => 'you just liked this post']);
    }

    public function dislikePost(Post $post) {

        $postCurrentDislikes = $post->dislikes;

        $user = Auth()->user();

        if (!$user->dislikedPosts()->where('post_id', $post->id)->exists()) {
            $user->dislikedPosts()->attach($post->id);
            
            $post->update(['dislikes' => $postCurrentDislikes + 1]);

            $message = 'post already disliked';
        } else {
            $user->dislikedPosts()->detach($post->id);

            $post->update(['dislikes' => $postCurrentDislikes - 1]);


            $message = 'post disliked';
        }
        
        return response()->json(['postId' => $post->title, 'success' => true, 'message' => $message]);
    }
}
