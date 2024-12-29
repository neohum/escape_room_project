{{-- we are using AppLayout Component located in app\View\Components\AppLayout.php which use resources\views\layouts\app.blade.php view --}}
<x-app-layout>
    <!-- Define a slot named "header" -->
    <x-slot name="header">
        <!-- Flex container with space between elements -->
        <div class="flex justify-between">
            <!-- Title for the page -->
            <h2 class="text-xl font-semibold leading-tight text-white">
                {{ 'Tasks' }} <!-- Static title -->
            </h2>
            <!-- Link to add a new task -->
            <a href="{{ route('tasks.create') }}" class="px-4 py-2 text-white bg-blue-500 rounded-md">ADD</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto mb-4 max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <!-- Title for uncompleted tasks -->
                    <h3 class="mb-4 text-lg font-semibold leading-tight text-white-800">Uncompleted</h3>
                    <!-- Table to display uncompleted tasks -->
                    <table class="w-full text-sm border-collapse table-auto">
                        <thead>
                            <tr>
                                <!-- Table header for task and action -->
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left text-white border-b">Task</th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left text-white border-b">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Loop through uncompleted tasks --}}
                            @forelse ($unCompletedTasks as $task)
                            <tr>
                                <!-- Display task content -->
                                <td class="p-4 pl-8 text-white border-b border-slate-100 dark:border-slate-700 dark:text-slate-400">
                                    <!-- Checkbox to mark task as completed -->
                                    <a class="mr-1 text-lg" href="{{ route('tasks.mark-completed', $task->id) }}">
                                        🔲
                                    </a>
                                    <!-- Task content -->
                                    <span>
                                        {{ $task->content }}
                                    </span>
                                    <!-- Display info file if exists -->
                                    @isset ($task->info_file)
                                    <span>
                                        <small> | <a href="{{ Storage::url($task->info_file) }}">File</a></small>
                                    </span>
                                    @endisset
                                    <!-- Display last update time -->
                                    <span>
                                        <small>{{ ' | ' . $task->updated_at->diffForHumans() }}</small>
                                    </span>
                                </td>
                                <!-- Actions for the task -->
                                <td class="p-4 pl-8 text-white border-b border-white-100 dark:border-slate-700 dark:text-slate-400">
                                    <!-- Link to edit task -->
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="px-4 py-2 border border-yellow-500 rounded-md hover:bg-yellow-500 hover:text-white">EDIT</a>
                                    <!-- Form to delete task -->
                                    <form method="post" action="{{ route('tasks.destroy', $task->id) }}" class="inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md h-[35px] relative top-[1px]">DELETE</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <!-- Display message if no uncompleted tasks -->
                            <tr>
                                <td class="p-4 pl-8 text-white border-b border-white-100 dark:border-slate-700 dark:text-slate-400" colspan="2">
                                    No data can be shown.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                     <!-- Title for completed tasks -->
                    <h3 class="mb-4 text-lg font-semibold leading-tight text-white">Completed</h3>
                    <!-- Table to display completed tasks -->
                    <table class="w-full text-sm border-collapse table-auto">
                        <thead>
                            <tr>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left text-white border-b">Task</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- populate our task data --}}
                            @forelse ($completedTasks as $task)
                            <tr>
                                <td class="items-center justify-center p-4 pl-8 text-white border-b border-white dark:border-slate-700 dark:text-slate-400">
                                    <a class="mr-1 text-lg" href="{{ route('tasks.mark-uncompleted', $task->id) }}">
                                        ✅
                                    </a>
                                    <span>
                                        {{ $task->content }}
                                    </span>
                                    @isset ($task->info_file)
                                    <span>
                                        <small> | <a href="{{ Storage::url($task->info_file) }}">File</a></small>
                                    </span>
                                    @endisset
                                    <span>
                                        <small>{{ ' | ' . $task->updated_at->diffForHumans() }}</small>
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="p-4 pl-8 text-white border-b border-slate-100 dark:border-slate-700 dark:text-slate-400" colspan="2">
                                    No data can be shown.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
