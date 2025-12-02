<div class="card shadow-sm mb-4">
    <div class="card-header bg-white">
        <h5 class="mb-0">
            <i class="bi bi-list-check text-success me-2"></i>
            Livewire Todo List
        </h5>
    </div>
    <div class="card-body">
        <!-- Add Todo Form -->
        <div class="input-group mb-4">
            <input
                type="text"
                class="form-control"
                wire:model="newTodo"
                placeholder="Add a new task..."
                wire:keydown.enter="addTodo"
            >
            <button class="btn btn-primary" wire:click="addTodo" wire:loading.attr="disabled">
                <i class="bi bi-plus-lg"></i> Add
            </button>
        </div>

        <!-- Todo List -->
        @if(count($todos) > 0)
            <div class="list-group">
                @foreach($todos as $todo)
                    <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                wire:change="toggleTodo({{ $todo['id'] }})"
                                @checked($todo['completed'])
                                id="todo-{{ $todo['id'] }}"
                            >
                            <label class="form-check-label @if($todo['completed']) text-decoration-line-through text-muted @endif"
                                   for="todo-{{ $todo['id'] }}">
                                {{ $todo['text'] }}
                            </label>
                        </div>
                        <button
                            class="btn btn-sm btn-outline-danger"
                            wire:click="removeTodo({{ $todo['id'] }})"
                            title="Remove task"
                        >
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                @endforeach
            </div>

            <!-- Stats -->
            <div class="mt-3 d-flex justify-content-between">
                <small class="text-muted">
                    Total: {{ count($todos) }} tasks
                </small>
                <small class="text-muted">
                    Completed: {{ $this->getCompletedCount() }}
                </small>
            </div>
        @else
            <div class="text-center py-4">
                <i class="bi bi-inbox display-4 text-muted"></i>
                <p class="text-muted mt-2">No tasks yet. Add one above!</p>
            </div>
        @endif
    </div>
</div>
