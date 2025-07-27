<div>

    <ul>
        @if($todos->isEmpty())
        <p class="text-gray-500">No todos found.</p>
        @else
        @foreach ($todos as $todo)
        <li wire:key="{{$todo->id}}">
                <h3>{{$todo->title}}</h3>
                <p>{{$todo->description}}</p>
                <span>Status: {{$todo->completed ? 'Completed' : 'Pending'}}</span>
            </li>
        @endforeach
    @endif
</ul>
            </div>