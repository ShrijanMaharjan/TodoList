<div class="max-w-md mx-auto p-4">
     @if (session('success'))
        <div class="bg-green-500 text-white px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif
    
    <h2 class="text-xl font-bold mb-4">Login</h2>

    @if (session('error'))
        <div class="text-red-500 mb-2">{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="login">
        <input type="email" wire:model="email" placeholder="Email" class="w-full mb-2 p-2 border rounded">
        <input type="password" wire:model="password" placeholder="Password" class="w-full mb-2 p-2 border rounded">
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Login</button>
        <button><a href="{{route('register')}}">Register</a></button>
    </form>
</div>
