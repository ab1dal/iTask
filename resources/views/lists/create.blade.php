<x-layout title="Create List">
    <div class="flex justify-center mx-auto w-full">
        <div class="flex flex-col w-full">
            <h1 class="w-full mb-4 text-center font-semibold">Create new list</h1>
            <form action="{{ route('lists.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="title" class="text-slate-700 dark:text-slate-200">Title</label>
                    <input type="title" name="title" id="title" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0  dark:bg-gray-800 dark:hover:bg-gray-700 @error('title') border-red-300  @enderror" required autofocus>

                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-3 rounded font-medium w-full dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-slate-50">Save</button>
            </form>
        </div>
    </div>
</x-layout>
