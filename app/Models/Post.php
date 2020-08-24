<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['category_id', 'title', 'slug', 'content', 'image'];

    public function category()
    {
        return  $this->belongsTo(Category::class);
    }
}
