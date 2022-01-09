<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTag extends Model
{
    use HasFactory;
    
    protected $table = 'post_tags';

    protected $guarded = [];


    public function tags()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }
}
