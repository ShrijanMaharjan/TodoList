<div class="max-w-md mx-auto p-4">
    <h2 class="text-xl font-bold mb-4">Register</h2>

    <form wire:submit.prevent="register">
        <input type="text" wire:model="name" placeholder="Name" class="w-full mb-2 p-2 border rounded">
        <input type="email" wire:model="email" placeholder="Email" class="w-full mb-2 p-2 border rounded">
        <input type="password" wire:model="password" placeholder="Password" class="w-full mb-2 p-2 border rounded">
        <input type="password" wire:model="password_confirmation" placeholder="Confirm Password" class="w-full mb-2 p-2 border rounded">

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Register</button>
        <button><a href="{{route('login')}}">Login</a></button>
    </form>
    </form>
</div>

