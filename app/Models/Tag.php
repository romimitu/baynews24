<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'tags';

    protected $guarded = [];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }
    public function tags()
    {
        return $this->hasMany(PostTag::class,'tag_id');
    }
}
