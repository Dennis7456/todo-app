<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Todo as Todox;

class Todo extends Component
{
    public $todos, $title, $description, $todoId, $updateTodo = false, $addTodo = false;

    /**
     * delete action listener
     */

    protected $listeners = [
        'deleteTodoListener' => 'deleteTodo'
    ];

    /**
     * List of add/edit form rules
     */
    protected $rules = [
        'title' => 'required',
        'description' => 'required'
    ];


    /**
     * render the todo data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */

    public function render()
    {
        $this->todos = Todox::select('id', 'title', 'description')->get();
        return view('livewire.todo');
    }

    /**
     * open add todo form
     * @return void
     */

    public function addTodo()
    {
        $this->resetFields();
        $this->addTodo = true;
        $this->updateTodo = false;
    }

    /**
     * store the user inputted todo data in the todos table
     * @return void
     */

    public function storeTodo()
    {
        $this->validate();
        try {
            Todos::create([
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
     * show existing todo data in edit todo form
     * @param mixed $id
     * @return void
     */
    public function editTodo($id){
        try {
            $todo = Todo::findOrFail($id);
            if(!$todo) {
                session()->flash('error', 'Todo Not Found');
            
        } else {
            $this->title = $todo->title;
            $this->description = $todo->description;
            $this->todoId = $todo->id;
            $this->updateTodo = true;
            $this->addTodo = false;
        }
    } catch (\Exception $ex) {
        session()->flash('error', 'Something went wrong!!');
    }}

    /**
     * update todo data
     * @return void
     */
    public function updateTodo()
    {
        $this->validate();
        try {
            Todo::whereId($this->todoId)->update([
                'title' => $this->title,
                'description' => $this->description
            ]);
            session()->flash('success', 'Todo Updated Successfully!');
            $this->resetFields();
            $this->updateTodo = false;
        } catch (\Exception $ex) {
            session()->flash('error', 'Something went wrong');
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

    /**
     * delete specific todo data from the todos table
     * @param mixed $id
     * @return void
     */
    public function deleteTodo($id)
    {
        try {
            // $test = Todo::find($id)->delete();
            Todo::find($id)->delete();
            session()->flash('success', 'Todo deleted successfully');
        } catch(\Exception $e){
            session()->flash('error', 'Something went wrong');
        }
    }

    public function emitSelf(){
        return 'text';
    }
}
