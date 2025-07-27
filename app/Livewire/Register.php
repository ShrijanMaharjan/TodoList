<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    public function register()
    {
        // Validation logic here

        $validated = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|confirmed|min:8'


        ]);
        $user = User::create($validated);
        Auth::login($user);
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    public function render()
    {


        return view('livewire.register');
    }
}
