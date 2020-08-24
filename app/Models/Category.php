<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
}
