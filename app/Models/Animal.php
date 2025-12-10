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

    // Добавим accessor для удобного получения URL фото
    // $animal->photo_url вернёт полный URL или null
    public function getPhotoUrlAttribute()
    {
        if (! $this->photo) {
            return null;
        }

        // если путь уже абсолютный (например, http), возвращаем как есть
        if (preg_match('/^https?:\\/\\//i', $this->photo)) {
            return $this->photo;
        }

        // ожидаем хранить в storage/app/public/...
        if (Storage::disk('public')->exists($this->photo)) {
            return asset('storage/' . $this->photo);
        }

        // если файл не найден — возможно путь относительный в public
        if (file_exists(public_path($this->photo))) {
            return asset($this->photo);
        }

        return null;
    }
}
