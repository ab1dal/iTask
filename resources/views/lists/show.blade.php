<x-layout title="{{$category->title}}">
    <div class="flex w-full justify-between">
        <a href="{{ route('lists.index') }}" class="p-3 rounded border-2 dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700">< Back to list</a>
        <a href="{{ route('lists.tasks.create', $category) }}" class="p-3 rounded border-2 dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700">+ Add task</a>
    </div>
    <div class="flex flex-col w-full">
        <h1 class="w-full my-6 font-semibold overflow-auto text-center">{{$category->title}}</h1>
        @forelse ($category->tasks as $task)
        <div class="flex justify-between max-w-full my-3">
            <div class="flex items-center overflow-auto">
                <div class="flex flex-col">
                    <p class="font-semibold">{{$task->title}}</p>
                    <p class="text-sm italic">{{$task->description}}</p>
                    @if ($task->deadline != null)
                    <p class="text-sm italic">Due: {{$task->deadline}}</p>
                    @endif
                    @if ($task->completed > 0)
                    <span class="text-sm italic">Completed: <span class="text-green-700 text-sm italic">Yes</span></span>
                    @else
                    <span class="text-sm italic">Completed: <span class="text-red-700 text-sm italic">No</span></span>
                    @endif
                </div>
            </div>
            <div class="flex items-center">
                <a href="{{ route('lists.tasks.edit', [$category, $task]) }}" class="p-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">Edit</a>
                @can('delete', $task)
                <form action="{{ route('lists.tasks.destroy', [$category, $task]) }}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" onclick="return confirm('Confirm, do you want to delete this task?')" class="pl-3 pr-0 py-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">Delete</button>
                </form>
                @endcan
            </div>
        </div>
        <hr class="mt-0 mb-6 w-24">
        @empty
        <div class="mx-auto">
            <p>No tasks yet.</p>
        </div>
        @endforelse
    </div>
</x-layout>
