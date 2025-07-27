<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $perpage = 5;
    public $search = '';

    public function delete(User $user)
    {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::where('name', 'like', "%{$this->search}%")->orWhere('email', 'like', "%{$this->search}%")

                ->paginate($this->perpage),
        ]);
    }
}
