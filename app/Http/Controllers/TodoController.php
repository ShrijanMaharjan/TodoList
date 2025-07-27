<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    //
    public function showUserTodos()
    {
        $user = Auth::user();
        $todos = $user ? $user->todos : collect(); // Get all todos for the logged-in user
        return view('user-todos', compact('todos'));
    }
}
