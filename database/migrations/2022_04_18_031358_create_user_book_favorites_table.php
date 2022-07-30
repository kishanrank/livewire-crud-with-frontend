<?php

use App\Models\UserBookFavorite;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBookFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $favoriteBook = new UserBookFavorite();
        Schema::create($favoriteBook->getTable(), function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('book_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $favoriteBook = new UserBookFavorite();
        Schema::dropIfExists($favoriteBook->getTable());
    }
}
