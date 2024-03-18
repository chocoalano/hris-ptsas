<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'createdby',
        'category_id',
        'cover',
        'keywords',
        'title',
        'slug',
        'description',
        'content',
        'publish',
    ];
    public function category(): BelongsTo
    {
        return $this->belongsTo(\App\Models\Blog\PostCategory::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(\App\Models\Blog\PostTag::class, 'post_tag_relationships');
    }
}
