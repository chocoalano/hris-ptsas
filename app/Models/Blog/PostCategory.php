<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PostCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function post(): HasMany {
        return $this->hasMany(\App\Models\Blog\Post::class, 'id', 'category_id');
    }
}
