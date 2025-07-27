<?php

namespace App\Livewire;

use App\Models\Todo;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;


class TodoList extends Component
{
    use WithPagination;
    public $name;
    public $search;



    public function create()
    {
        $validated = $this->validate([
            'name' => 'required|min:3|max:50',
        ]);
        Todo::create([
            'name' => $validated['name'],
            'user_id' => Auth::id(), // Associate the todo with the authenticated user
        ]);
        $this->reset('name'); // Reset the name input after creation
        session()->flash('success', 'Todo created successfully!');
    }
    public function delete($TodoId)
    {
        $todo = Todo::findOrFail($TodoId);
        $todo->delete();
    }
    public function toggleComplete($TodoId)
    {
        $todo = Todo::findOrFail($TodoId);
        $todo->completed = !$todo->completed;
        $todo->save();
    }
    public function render()
    {
        $todos = Todo::where('user_id', Auth::id())
            ->latest()
            ->where('name', 'like', "%{$this->search}%")
            ->paginate(3);
        return view('livewire.todo-list', compact('todos'));
    }
}
