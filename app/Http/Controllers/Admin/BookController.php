<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;

class BookController extends Controller
{
    public function index()
    {
        return view('admin.books');
    }
}
