<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'name', 'species', 'breed', 'age', 'location', 'description', 'photo', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
