<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public $table = 'books';

    protected $fillable = [
        'name',
        'description',
        'image',
        'price'
    ];

    public function getImageAttribute($value)
    {
        $filePath = 'storage/' . $value;
        if ($filePath && file_exists(public_path($filePath))) {
            return asset($filePath);
        }
        return null;
    }
}
