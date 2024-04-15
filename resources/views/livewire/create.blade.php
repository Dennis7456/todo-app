<form>
                        <div class="flex justify-center gap-4">
                        <div>
                            <label for="title" class="px-4">Title:</label>
                        <input type="text" name="title" class="border-slate-400 focus:outline-none focus:ring focus:ring-[#fff] form-control @error('title') is-invalid @enderror" id="title" placeholder="Enter the title" wire:model="title">
                        @error('title')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <div class="flex">
                             <label for="title" class="px-4">Description:</label>
                        <textarea class="focus:outline-none focus:ring focus:ring-white form-control @error('description') is-invalid @enderror" id="description" wire:model="description" placeholder="Enter Description"></textarea>
                        @error('description')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                        </div>
                        <button class="mx-4 px-3 py-3 bg-gray-800 text-white" wire:click.prevent="storeTodo()">Save</button>
                        <button class="mx-4 px-3 py-3 bg-gray-800 text-white"  wire:click.prevent="cancelTodo()">Cancel</button>
                    </div>
                    </form>