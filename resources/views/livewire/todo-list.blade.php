<div class="flex justify-center">
    <div>
        <input type="text" wire:model="task" wire:keydown.enter="addTodo" placeholder="add todo">
        @forelse ($todos as $todo)
            <div>
                @if($todo->status == 'open')
                <input type="checkbox" id='markAsDone-{{$todo->id}}' wire:change="markAsDone({{$todo->id}})">
                @endif
                <label for="markAsDone-{{$todo->id}}" style="{{($todo->status == 'done')?'text-decoration: line-through':''}}">{{$todo->task}}</label>
                @if($todo->status == 'done')
                <button wire:click="remove({{$todo->id}})">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>

                </button>
                @endif
            </div>
        @empty
            <p>No todos here.</p>
        @endforelse
    </div>
</div>