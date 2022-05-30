<x-layout title="My Day">
    <div class="flex justify-center mx-auto w-full">
        <div class="flex flex-col w-full">
            <h1 class="w-full mb-6 font-semibold text-center">Tasks with assigned deadline & due today:</h1>
            @forelse ($tasks as $task)
            <div class="flex max-w-full my-3 overflow-auto">
                <div class="flex flex-col ">
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
            <hr class="mt-0 mb-6 w-24">
            @empty
                <p class="mx-auto text-slate-700 dark:text-slate-200 ">No tasks due today.</p>
            @endforelse
        </div>
    </div>
</x-layout>
