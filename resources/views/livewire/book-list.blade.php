<div>
    <header class="flex justify-between">
        <div>
            <h2> Hi, {{$name}} </h2>
           </div>
        <form wire:submit="$refresh" action="">
        <span class="mr-2">Your name:</span>
        <input type="text" wire:model.live.debounce.500ms="name" />
        <button >Update</button>
    </form>
    </header>
    
    <input type="search" wire:model.live.debounce.500ms="search" placeholder="Search books..." class="search" />

    <ul class="list">
        @if($books->isEmpty())
            <p class="text-gray-500">No books found.</p>
            @else
            @foreach ($books as $book)
        <li wire:key="{{$book->id}}">
            <button wire:click="delete({{$book->id}})">Delete</button>
            <h3>{{$book->title}}</h3>
            <h4>{{$book->author}}</h4>
            <p>Rating: {{$book->rating}}/10</p>
        </li>
            
        @endforeach
        @endif
        
    </ul>
    <div class="pagination">
        {{$books->links()}}
    </div>
</div>
