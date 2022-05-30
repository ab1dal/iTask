<x-layout title="Login">
    <div class="flex justify-center mx-auto w-full">
        <div class="rounded-lg w-full">
            <h1 class="mb-6 w-full font-semibold text-center">Login</h1>
            @if (session('status'))
                <div class="bg-green-200 text-green-800 p-4 rounded-lg mb-6 text-center">
                {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="text-slate-700 dark:text-slate-200 ">Email</label>
                    <input type="email" name="email" id="email"  class="form-input mt-1 border-2 rounded p-4 w-full dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700 @error('email') border-red-300  @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="text-slate-700 dark:text-slate-200">Password</label>
                    <input type="password" name="password" id="password"  class="form-input mt-1  rounded p-4 border-2 w-full dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700  @error ('password') border-red-300 @enderror">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4 flex justify-between max-w-full items-center">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember" class="text-gray-700 dark:text-slate-200">Remember me</label>
                    </div>

                    <div>
                    <a href="/forgot-password" class="text-slate-700 dark:text-slate-200">Forgot Password?</a>
                    </div>
                </div>
                <div>
                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-3 rounded font-medium w-full dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-slate-50">Login</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
