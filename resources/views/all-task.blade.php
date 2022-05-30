<x-layout title="All Tasks">
    <div class="flex justify-center mx-auto w-full">
        <div class="flex flex-col w-full">
            <h1 class="w-full mb-6 font-semibold text-center">A list of all your tasks</h1>
           @forelse ($tasks as $task)
           <div class="flex max-w-full my-3 overflow-auto">
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
            <hr class="mt-0 mb-6 w-24">
            @empty
                <p class="mx-auto">No task created yet. Create a <a href="{{ route('lists.index') }}" class="underline">list</a> then add a task.</p>
           @endforelse
        </div>
    </div>
</x-layout>
