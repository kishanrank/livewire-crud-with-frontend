<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Favorites extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $searchTerm = '%' . $this->search . '%';
        $books = DB::table('books')
            ->join('user_book_favorites', 'books.id', '=', 'user_book_favorites.book_id')
            ->where('user_book_favorites.user_id', "=", Auth::user()->id)
            ->where(function ($query) use ($searchTerm) {
                return $query->where('books.name', 'like', $searchTerm)
                    ->orWhere('books.description', 'like', $searchTerm);
            })
            ->select('books.*')
            ->paginate(12);

        return view('livewire.frontend.favorites',  [
            'books' => $books,
        ]);
    }

    /*
    * Redirect to readmore page if authenticated
    */

    public function readMore($id)
    {
        $user = Auth::user();

        if (!$user || !$user->id) {
            return redirect()->to('/login');
        }

        $book = Book::find($id);

        if ($book && $book->id) {
            return redirect()->route('book.readmore', ['id' => $id]);
        }
    }
}
