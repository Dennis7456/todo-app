<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto px-4 flex flex-col items-center justify-center pt-4">
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
                                </x-primary-button>
                            </div>
                        </form>
                        <div class="mt-6">{checkbox} {Title} {owner} {delete}</div>
                        <div class="mt-4">{checkbox} {Title} {owner} {delete}</div>
                        <input wire:model="form.title" id="title" class="block mt-1 w-full" type="checkbox" name="title" required autofocus />
                        <!-- <livewire:editable-view /> -->
                        <div><livewire:editable-view /></div>
                        <div><livewire:add-todo :todo="$todo"/></div>
                    </div>
                <div class="p-6 text-gray-900 dark:text-gray-100">
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
