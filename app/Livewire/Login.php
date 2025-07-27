<?php

namespace App\Livewire;

use Illuminate\Validation\ValidationException;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function login()
    {
        // Validation logic here

        $validated = $this->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($validated)) {
            // Authentication passed
            session()->regenerate();
            return redirect()->route('todo')->with('success', 'Login successful.');
        }

        throw ValidationException::withMessages([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function render()
    {
        return view('livewire.login');
    }
}
