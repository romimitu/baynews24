<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertise extends Model
{
    use HasFactory;

    protected $table = 'advertises';

    protected $guarded = [];
    
    public function adtype()
    {
        return $this->belongsTo(AddType::class, 'add_type_id');
    }
}
