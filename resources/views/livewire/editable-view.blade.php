<div>
    @if(true)
        <input type="text" wire:model="editableText" wire:keydown.enter="save" wire:keydown.escape="isEditing = false">
    @else
        <div wire:click="makeEditable">{{ $editableText }}</div>
    @endif
</div>
