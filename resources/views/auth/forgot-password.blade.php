<x-layout title="Forgot Password">
    <div class="flex justify-center mx-auto w-full">
        <div class="rounded-lg w-full">
            <h1 class="mb-6 w-full font-semibold text-center">Forgot Password</h1>
            @if (session('status'))
                <div class="bg-green-200 p-4 rounded-lg mb-6 text-green-800 text-center">
                {{ session('status') }}
                </div>
            @endif
            <form action="/forgot-password" method="POST">
            @csrf
                <div class="mb-4">
                    <label for="email" class="text-slate-700 dark:text-slate-200">Email</label>
                    <input type="email" name="email" id="email" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0  dark:bg-gray-800 dark:hover:bg-gray-700  @error('email') border-red-300  @enderror" value="{{ old('email') }}" autofocus>
                    @error('email')
                    <div class="text-red-500 mt-2 text-sm">
                    {{ $message }}
                    </div>
                    @enderror
                    </div>
                    <div>
                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-3 rounded font-medium w-full dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-slate-50">Email Password Reset Link</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>

