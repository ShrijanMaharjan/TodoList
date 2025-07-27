<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Component;

class CreateBook extends Component
{
    public $title;
    public $author;
    public $rating;

    public function save()
    {
        $validated = $this->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'rating' => 'required|numeric|min:1|max:10',
        ]);
        Book::create($validated);




        $this->reset(['title', 'author', 'rating']);
        $this->redirect('/books');
    }
    public function render()
    {
        return view('livewire.create-book');
    }
}
