<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable = ['title', 'slug', 'content', 'user_id'];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public static function listAndSearch()
    {
        $search = request()->query('s');
        return ($search) ?
            Post::where('title', 'like', "%{$search}%")->orWhere('content', 'like', "%{$search}%")->with('user')->paginate(20):
            Post::with('user')->paginate(20);
    }

}