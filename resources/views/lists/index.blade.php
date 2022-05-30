<x-layout title="Lists">
    <div class="flex w-full justify-end">
        <a href="{{ route('lists.create') }}" class="p-3 rounded border-2 dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700">+ Add list</a>
    </div>
    <div class="flex flex-col w-full">
        <h1 class="w-full my-6 font-semibold text-center">Your lists</h1>
        @forelse ($category as $list)
        <div class="flex justify-between max-w-full my-6">
            <a href="{{ route('lists.show', $list) }}" class="py-2 overflow-auto border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">{{ $list->title }}</a>
            <div class="flex items-center">
                <a href="{{ route('lists.edit', $list) }}" class="p-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">Edit</a>
            @can('delete', $list)
            <form action="{{ route('lists.destroy', $list) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('Confirm, do you want to delete this list and its tasks?')" class="pl-3 pr-0 py-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">Delete</button>
            </form>
            @endcan
            </div>
        </div>
            {{-- <hr class="mt-0 mb-6"> Not sure if I will use this line, I let it be for now --}}
        @empty
        <div class="mx-auto">
            <p>No lists yet.</p>
        </div>
        @endforelse
     </div>
</x-layout>
