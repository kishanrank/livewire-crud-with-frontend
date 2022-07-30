<?php

namespace App\Http\Livewire\Frontend;

use App\Models\UserBookFavorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Readbook extends Component
{
    public $user, $book, $isFavorite;

    public function mount($book)
    {
        $this->book = $book;
        $this->user = Auth::user();
        $favoriteBook = UserBookFavorite::whereUserId($this->user->id)->whereBookId($this->book->id)->first();
        $this->isFavorite = ($favoriteBook && isset($favoriteBook->id)) ? true : false;
    }

    public function render()
    {
        return view('livewire.frontend.readbook');
    }

    /*
    * Add book to user's favorite
    */
    public function addToFavorite()
    {
        UserBookFavorite::create([
            'book_id' => $this->book->id,
            'user_id' => $this->user->id,
        ]);

        $this->isFavorite = 1;
    }

    /*
    * Remove book to user's favorite
    */
    public function removeFromFavorite()
    {
        $favoriteBook = UserBookFavorite::whereUserId($this->user->id)->whereBookId($this->book->id)->first();
        if ($favoriteBook && isset($favoriteBook->id)) {
            $favoriteBook->delete();
            $this->isFavorite = 0;
        }
    }
}
