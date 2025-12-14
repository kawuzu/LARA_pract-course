<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
        'sex',
        'description',
        'photo',
        'status',
    ];

    public function getPhotoUrlAttribute()
    {
        if (! $this->photo) {
            return null;
        }

        if (preg_match('/^https?:\\/\\//i', $this->photo)) {
            return $this->photo;
        }

        if (Storage::disk('public')->exists($this->photo)) {
            return asset('storage/' . $this->photo);
        }

        if (file_exists(public_path($this->photo))) {
            return asset($this->photo);
        }

        return null;
    }
}
