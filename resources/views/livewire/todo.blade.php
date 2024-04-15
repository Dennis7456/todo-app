

<div class="flex justify-center gap-4 mt-4">
                    <div class="table-responsive">
                    <table class="table border p-4">
                        <thead>
                            <tr>
                                <th class="py-4">Title</th>
                                <th>Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($todos) > 0)
                                @foreach ($todos as $todo)
                                    <tr class="px-4">
                                        <td>
                                            {{$todo->title}}
                                        </td>
                                        <td>
                                            {{$todo->description}}
                                        </td>
                                        <td>
                                            <button wire:click="editTodo({{ $todo->id }})" class="m-3 px-4 py-3 bg-gray-800 text-white">Edit</button>
                                            <!-- <button onClick="deleteTodo({{$todo->id}})" class="m-3 px-4 py-3 bg-gray-800 text-white">Delete</button> -->
                                            <button wire:click="$deleteTodo({{ $todo->id }})" class="m-3 px-4 py-3 bg-gray-800 text-white">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="3" align="center">
                                        No Todos Found.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
<script>
        // function deleteTodo(id){
        //     if(confirm("Are you sure to delete this record?"))
        //         alert(id)
        //         window.livewire.emit('deleteTodoListener', id);
        // }
    Livewire.on('deleteTodo', id => {
        alert('A todo was deleted');
    })
    </script>
                   </div>