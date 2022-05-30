<x-layout title="Reset Password">
    <div class="flex justify-center mx-auto w-full">
        <div class="rounded-lg w-full">
            <h1 class="mb-6 w-full font-semibold text-center">Forgot Password</h1>
            @if (session('status'))
                <div class="bg-green-200 text-green-800 p-4 rounded-lg mb-6 text-center">
                {{ session('status') }}
                </div>
            @endif
            <form action="/reset-password" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                <div class="mb-4">
                    <label for="email" class="text-slate-700 dark:text-slate-200">Email</label>
                    <input type="email" name="email" id="email" placeholder="Your email" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0  dark:bg-gray-800 dark:hover:bg-gray-700  @error('email') border-red-300  @enderror" value="{{ old('email', $request->email) }}" autofocus>
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
                    <button type="submit" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-3 rounded font-medium w-full dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-slate-50">Reset password</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
