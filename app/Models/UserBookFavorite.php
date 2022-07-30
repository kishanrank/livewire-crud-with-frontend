<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserBookFavorite extends Model
{
    public $table = "user_book_favorites";

    protected $fillable = [
        'user_id',
        'book_id',
    ];
}
