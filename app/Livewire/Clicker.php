<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $name;
    public $email;
    public $password;
    public $image;

    public function createNewUser()
    {
        // Validate the input
        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|',
            'image' => 'nullable|sometimes|image|max:2048',
        ]);
        User::create($validated);

        if ($this->image) {

            $validated['image'] = $this->image->store('uploads', 'public');
        }

        $this->reset('name', 'email', 'password', 'image');
        session()->flash('success', 'User created successfully!');
    }
    public function placeholder()
    {
        // Placeholder method for future use
        return view('placeholder');
    }
    public function render()
    {
        sleep(3);
        $users = User::paginate(3);
        return view('livewire.clicker', compact('users'));
    }
}
