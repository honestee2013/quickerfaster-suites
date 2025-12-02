<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 0;
    public $name = '';
    public $message = '';

    public function increment()
    {
        $this->count++;
        $this->message = "Increased to {$this->count}";
    }

    public function decrement()
    {
        $this->count--;
        $this->message = "Decreased to {$this->count}";
    }

    public function resetCounter()
    {
        $this->count = 0;
        $this->message = "Counter reset";
    }

    public function updatedName($value)
    {
        $this->message = "Hello, {$value}!";
    }

    public function render()
    {
        return view('livewire.counter');
    }
}
