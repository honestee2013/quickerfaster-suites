<?php

namespace App\Livewire;

use Livewire\Component;

class TodoList extends Component
{
    public $todos = [];
    public $newTodo = '';

    public function mount()
    {
        // Initial todos
        $this->todos = [
            ['id' => 1, 'text' => 'Test Livewire installation', 'completed' => true],
            ['id' => 2, 'text' => 'Create test components', 'completed' => true],
            ['id' => 3, 'text' => 'Deploy to production', 'completed' => false],
        ];
    }

    public function addTodo()
    {
        if (trim($this->newTodo) === '') {
            return;
        }

        $this->todos[] = [
            'id' => count($this->todos) + 1,
            'text' => $this->newTodo,
            'completed' => false
        ];

        $this->newTodo = '';
    }

    public function toggleTodo($id)
    {
        foreach ($this->todos as &$todo) {
            if ($todo['id'] === $id) {
                $todo['completed'] = !$todo['completed'];
                break;
            }
        }
    }

    public function removeTodo($id)
    {
        $this->todos = array_filter($this->todos, function($todo) use ($id) {
            return $todo['id'] !== $id;
        });

        // Reindex array
        $this->todos = array_values($this->todos);
    }

    public function getCompletedCount()
    {
        return count(array_filter($this->todos, function($todo) {
            return $todo['completed'];
        }));
    }

    public function render()
    {
        return view('livewire.todo-list');
    }
}
