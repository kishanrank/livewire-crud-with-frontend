<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Admin\Books;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Show the book list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function readBook(Request $request, $id)
    {
        try {
            $book = Book::find($id);
            if (!$book || !$book->id) {
                throw new Exception("Book not found please try after sometime!");
            }
            return view('read-more', compact('book'));
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
            return redirect()->route('home');
        }
    }

    public function profile()
    {
        try {
            return view('profile');
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
            return redirect()->route('home');
        }
    }

    public function favorites()
    {
        try {
            return view('favorites');
        } catch (\Throwable $th) {
            Log::info($th->getMessage());
            return redirect()->route('home');
        }
    }
}
