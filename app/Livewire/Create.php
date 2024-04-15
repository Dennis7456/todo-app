<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo;

class Create extends Component
{

    public $todos, $title, $description, $todoId, $updateTodo = false, $addTodo = false;

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'title' => 'required',
        'description' => 'required'
    ];

    /**
     * Reset all input fields
     * @return void
     */
    public function resetFields() {
        $this->title = '';
        $this->description = '';
    }

    public function render()
    {
        return view('livewire.create');
    }

    /**
     * store the user inputted todo data in the todos table
     * @return void
     */

    public function storeTodo()
    {
        $this->validate();
        try {
            Todo::create([
                'title' => $this->title,
                'description' => $this->description
            ]);
            session()->flash('success', 'Todo Created Successfully!!');
            $this->resetFields();
            $this->addTodo = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something went wrong!!');
        }
    }

     /**
     * Cancel Add/Edit form and redirect to todo listing page
     * @return void
     */
    public function cancelTodo()
    {
        $this->addTodo = false;
        $this->updateTodo = false;
        $this->resetFields();
    }
}
