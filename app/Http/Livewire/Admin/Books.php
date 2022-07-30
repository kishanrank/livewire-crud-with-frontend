<?php

namespace App\Http\Livewire\Admin;

use App\Models\Book;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Books extends Component
{
    use WithFileUploads, WithPagination;
    public $name, $price, $description, $image, $bookId;
    public $isOpen = 0;

    public function render()
    {
        $books = Book::paginate(5);
        return view('livewire.admin.books', ['books' => $books]);
    }

    /**
     * open popup modal for creating book
     *
     * @var array
     */
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    /**
     * open popup modal
     *
     * @var array
     */
    public function openModal()
    {
        $this->isOpen = true;
    }

    /**
     * close popup modal
     *
     * @var array
     */
    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetValidation();
    }

    /**
     * reset form input fields
     *
     * @var array
     */
    private function resetInputFields()
    {
        $this->name = '';
        $this->price = '';
        $this->description = '';
        $this->image = '';
    }

    /**
     * store book data
     *
     * @var array
     */
    public function store()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required|dimensions:min_width=800,min_height=600',
            'price' => 'required',
            'description' => 'required'
        ], [
            'image.dimensions' => 'Minimum Image dimension should be 800x600 px.'
        ]);

        $image = $this->image->store('bookimage', 'public');

        Book::updateOrCreate(['id' => $this->bookId], [
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'image' => $image
        ]);

        session()->flash(
            'message',
            $this->bookId ? 'Book Updated Successfully.' : 'Book Created Successfully.'
        );

        $this->closeModal();
        $this->resetInputFields();
    }

    /**
     * display edit modal popup
     *
     * @var array
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $this->bookId = $id;
        $this->name = $book->name;
        $this->price = $book->price;
        $this->description = $book->description;

        $this->openModal();
    }

    /**
     * delete books from list
     *
     * @var array
     */
    public function delete($id)
    {
        Book::find($id)->delete();
        session()->flash('message', 'Book Deleted Successfully.');
    }
}
