<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // fillable
    protected $fillable = ['id', 'title', 'description', 'likes', 'dislikes', 'times_shared', 'user_id', 'created_at', 'updated_at'];

    // relationship with users (using pivot table).
    public function users() {
        return $this->belongsToMany(User::class);
    }

    // Relationship with User model to keeep track of likes.
    public function likedByUser() {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function dislikedByUser() {
        return $this->belongsToMany(User::class, 'dislikes')->withTimestamps();
    }
}
