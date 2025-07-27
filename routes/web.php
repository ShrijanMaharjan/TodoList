<?php

use App\Livewire\BookList;
use App\Livewire\CreateBook;
use App\Livewire\Login;
use App\Livewire\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/todo', 'todo')->name('todo')->middleware('auth');

Route::get('/books', BookList::class);
Route::get('/create', CreateBook::class);

Route::view('/datatable', 'project.datatable')->name('datatable');
Route::view('/user-todos', 'user-todos')->name('user.todos');

Route::get('/register', Register::class)->name('register');
Route::get('/login', Login::class)->name('login');
