<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddType extends Model
{
    use HasFactory;

	protected $table = 'add_types';

    protected $guarded = [];

    public function advertise()
    {
        return $this->hasMany(Advertise::class,'add_type_id');
    }
}
