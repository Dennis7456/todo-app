<div>
    <form wire:submit="createTodo">
        <!-- Todo Title -->
        <div class="mt-4">
            <x-input-label for="title" :value="__('Todo Title')" />
            <x-text-input wire:model="form.title" id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
            <x-input-error :messages="$errors->get('form.title')" class="mt-2" />
            </div>
            <!-- Todo Description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Todo Description')" />
                <textarea wire:model="form.description" id="description" class="form-textarea block mt-1 w-full" name="description" required></textarea>
                <x-input-error :messages="$errors->get('form.description')" class="mt-2" />
                </div>
                <!-- Submit Button -->
                <div class="flex items-center justify-end mt-4">
                    <x-primary-button>
                        {{ __('Add Todo') }}
                    </x-primary-button></div>
                </form>
            </div>