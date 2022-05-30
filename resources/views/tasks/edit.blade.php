<x-layout title="Edit Task: {{ $task->title }}">
    <div class="flex justify-center mx-auto w-full">
        <div class="flex flex-col w-full">
            <h1 class="w-full mb-4 text-center font-semibold">Edit task</h1>
            {{-- <h1 class="w-full mb-4">Edit task: {{ $task->title }}</h1> --}}
            <form action="{{ route('lists.tasks.update', [$category, $task]) }}" method="POST">
            @csrf
            @method('PATCH')
                <div class="mb-4">
                    <label for="title" class="text-slate-700 dark:text-slate-200">Task Title</label>
                    <input type="title" name="title" id="title" value="{{ $task->title }}" class="form-input mt-1 border-2 rounded p-4 w-full dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700 @error('title') border-red-300  @enderror" required autofocus>
                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="text-slate-700 dark:text-slate-200">Description <span class="text-sm italic">(optional)</span></label>
                    <textarea type="description" name="description" id="description" class="form-input mt-1 border-2 rounded p-4 w-full dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700 @error('title') border-red-300  @enderror" autofocus>{{ $task->description }}</textarea>
                    @error('description')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="deadline" class="text-slate-700 dark:text-slate-200">Deadline <span class="text-sm italic">(optional)</span></label>
                    <input type="date" name="deadline" id="deadline" value="{{ $task->deadline }}" class="form-input mt-1 border-2 rounded p-4 w-full dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700 @error('title') border-red-300  @enderror" autofocus>
                    @error('deadline')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <input type="checkbox" class="form-check-input mr-2" id="completed" name="completed" value="{{old('completed')}}" @if(old('completed', $task->completed)) checked @endif>
                <label for="completed">Completed</label>
                <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-3 mt-4 rounded font-medium w-full dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-slate-50">Add</button>
            </form>
        </div>
    </div>
</x-layout>
