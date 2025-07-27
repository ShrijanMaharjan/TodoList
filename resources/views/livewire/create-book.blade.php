<div class="create">
    <h3>Create New Book</h3>
    <form action="" wire:submit="save">
        <div class="field">
            <label for="">Book Title:</label>
            <input type="text" wire:model='title' />
            @error('title')
              <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
            @enderror
        </div>
        <div class="field">
            <label for="">Book Author:</label>
            <input type="text" wire:model='author' />
            @error('author')
              <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
            @enderror
        </div>
        <div class="field">
            <label for="">Book Rating:</label>
            <input type="number" wire:model='rating' />
            @error('rating')
              <span class="text-red-500 text-xs mt-3 block ">{{$message}}</span>
            @enderror
        </div>
        <button>Add Book</button>
    </form>
</div>
