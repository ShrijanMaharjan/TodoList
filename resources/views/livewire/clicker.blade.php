<div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">

    @if (session('success'))
        <div class="bg-green-500 text-white px-4 py-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit="createNewUser" class="space-y-4">
        <div>
            <label class="block text-gray-700">Name</label>
            <input type="text" wire:model="name" placeholder="Enter your name"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700">Email</label>
            <input type="email" wire:model="email" placeholder="Enter your email"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('email')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label class="block text-gray-700">Password</label>
            <input type="password" wire:model="password" placeholder="Enter your password"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('password')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        <div>
            <label class="block text-gray-700">Profile Picture</label>
            <input type="file" wire:model="image" 
                accept="image/png, image/jpeg, image/gif"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            @error('image')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>
        @if($image)
            <div class="mt-2">
                <img src="{{ $image->temporaryUrl() }}" alt="Profile Picture Preview"
                    class="w-32 h-32 object-cover rounded">
            </div>
        @endif

        <div wire:loading wire:target="image">
            <span class="text-green-500">Uploading...</span>
        </div>


        <button type="submit"
            class="w-full bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
            Create
        </button>
    </form>

    {{-- <hr class="my-6 border-gray-300">

    <div class="space-y-2">
        @foreach($users as $user)
            <h3 class="text-lg font-semibold text-gray-800">{{ $user->name }}</h3>
        @endforeach
    </div>

    <div class="mt-4">
        {{ $users->links() }}
    </div> --}}
</div>
