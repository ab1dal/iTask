<x-layout title="Edit List">
    <div class="flex justify-center mx-auto w-full">
        <div class="flex flex-col w-full">
            <h1 class="w-full mb-4 text-center font-semibold">Edit title</h1>
            <form action="{{ route('lists.update', $category) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="text-slate-700 dark:text-slate-200">Current Title</label>
                    <input type="title" name="title" id="title" placeholder="{{ old('title') }}" value="{{ $category->title }}" class="form-input mt-1 border-2 rounded p-4 w-full dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700 @error('title') border-red-300  @enderror" required autofocus>
                    @error('title')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-3 rounded font-medium w-full dark:bg-slate-200 dark:text-slate-900">Save</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
