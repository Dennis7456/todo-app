<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddTodo extends Component
{
    public $todo;
    public function mount()
    {
        $this->todo = 'Finish ScreenCast';
    }
    public function render()
    {
        return view('livewire.add-todo');
    }

    
}
