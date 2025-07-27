<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class BookList extends Component
{
    public $name = 'Shrijan';
    public $search = '';

    public function delete($bookId)
    {
        $book = Book::findOrFail($bookId);
        $book->delete();
    }
    public function render()
    {
        if ($this->search) {
            return view('livewire.book-list', [
                'books' => Book::where('title', 'like', "%{$this->search}%")

                    ->latest()
                    ->paginate(6),
            ]);
        }
        return view('livewire.book-list', [
            'books' => Book::latest()->paginate(6),
        ]);
    }
}
