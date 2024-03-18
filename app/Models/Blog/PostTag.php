<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function posts()
    {
        return $this->belongsToMany(\App\Models\Blog\Post::class, 'post_tag_relationships');
    }
}
