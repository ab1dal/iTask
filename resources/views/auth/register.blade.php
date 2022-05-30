<x-layout title="Register">
    <div class="flex justify-center mx-auto w-full">
        <div class="rounded-lg w-full">
            <h1 class="mb-6 w-full font-semibold text-center">Register</h1>
            <p class="text-slate-700 dark:text-slate-200">Requirements:</p>
            <p class="text-slate-700 dark:text-slate-200">Enter a valid email address.</p>
            <p class="text-slate-700 dark:text-slate-200 pb-4">Password minimum of 16 characters.</p>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="text-slate-700 dark:text-slate-200">Email</label>
                    <input type="email" name="email" id="email" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700 @error('email') border-red-300  @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="text-slate-700 dark:text-slate-200">Password</label>
                    <input type="password" name="password" id="password" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0  dark:bg-gray-800 dark:hover:bg-gray-700  @error ('password') border-red-300 @enderror">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="text-slate-700 dark:text-slate-200">Confirm password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0  dark:bg-gray-800 dark:hover:bg-gray-700  @error ('password_confirmation') border-red-300 @enderror">
                    @error('password_confirmation')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-3 rounded font-medium w-full dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-slate-50">Register</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
