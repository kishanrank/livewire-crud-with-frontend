<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Book;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Books extends Component
{
    use WithPagination;

    public $search = '';

    public function render()
    {
        $searchTerm = '%'.$this->search.'%';
        $books = Book::where('name','like', $searchTerm)->orWhere('description','like', $searchTerm)->paginate(12);
        return view('livewire.frontend.books',  [
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
