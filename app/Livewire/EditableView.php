<?php

namespace App\Http\Livewire;

use Livewire\Component;

class EditableView extends Component
{
    public $editableText;
    public $isEditing;

    public function mount($editableText)
    {
        $this->editableText = $editableText;
        $this->isEditing = false;
    }

    public function render()
    {
        return view('livewire.editable-view');
    }

    
    public function makeEditable()
    {
        $this->isEditing = true;
    }

    public function save()
    {
        $this->isEditing = false;
        // Handle saving data or updating database here
    }
}
