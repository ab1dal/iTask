<x-layout title="Edit Profile">
    <div class="flex justify-center mx-auto w-full">
        <div class="rounded-lg w-full">
            <h1 class="w-full mb-4 text-center font-semibold">Your Profile</h1>
            <ol class="w-full text-center overflow-auto ">
                <li><span class="text-slate-700 dark:text-slate-200">Email </span><span class="">{{ $user->email }}</span></li>
                <li><span class=" text-slate-700 dark:text-slate-200 ">Joined </span><span class="">{{ $user->created_at->diffForHumans() }}</span></li>
                <li><span class=" text-slate-700 dark:text-slate-200 ">Last updated </span><span class="">{{ $user->updated_at->diffForHumans() }}</span></li>
            </ol>
            <h2 class="w-full pt-10 pb-2 font-semibold text-center">Update Profile Info</h2>
            <img src="{{ $user->avatar ?? '/uploads/user-avatar.webp' }}" alt="your avatar" width="150" class="mx-auto p-4">
            <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <div class="">
                    <div class="mb-4">
                        <label class="form-label inline-block mb-2 text-gray-700 w-full text-center sr-only" for="avatar">Avatar</label>
                        <div class="flex">
                            <input class="form-control block border-2 dark:border-0  mx-auto p-2 text-sm text-slate-700 dark:text-slate-200 dark:bg-gray-800 dark:hover:bg-gray-700  bg-clip-padding  rounded" type="file" name="avatar" id="avatar">
                        </div>
                        @error('avatar')
                        <p class="text-red-500 mt-2 text-sm w-full text-center">{{ $message }}</p>
                        @enderror
                    </div>
                    <p class="text-center pb-4 text-sm text-slate-700 dark:text-slate-200 dark:bg-slate-900">Image max size: 2 MB.</p>
                    <div class="mb-4">
                        <label for="email" class="text-slate-700 dark:text-slate-200">Your email</label>
                        <input type="email" name="email" id="email" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700  @error('email') border-red-300  @enderror" value="{{ $user->email }}" required>
                        @error('email')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div>
                        <button type="submit" name="update_user" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-3 rounded font-medium w-full dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-slate-50">Save profile info</button>
                    </div>
                </div>
            </form>
            <form action="{{ route('profile.changepassword', $user) }}" method="POST">
            @csrf
            @method('PUT')
                <h2 class="w-full pt-10 pb-2 font-semibold text-center">Update password</h2>
                <div class="mb-4">
                    <label for="current_password" class="text-slate-700 dark:text-slate-200">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0 dark:bg-gray-800 dark:hover:bg-gray-700  @error ('current_password') border-red-300 @enderror" required>
                    @error('current_password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="new_password" class="text-slate-700 dark:text-slate-200">New Password</label>
                    <input type="password" name="new_password" id="new_password" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0  dark:bg-gray-800 dark:hover:bg-gray-700  @error ('new_password') border-red-300 @enderror" required>
                    @error('new_password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="new_password_confirm" class="text-slate-700 dark:text-slate-200">Confirm new password</label>
                    <input type="password" name="new_password_confirm" id="new_password_confirm" class="form-input mt-1 rounded p-4 border-2 w-full dark:border-0  dark:bg-gray-800 dark:hover:bg-gray-700  @error ('new_password_confirm') border-red-300 @enderror" required>
                    @error('new_password_confirm')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div>
                    <button type="submit" name="change_password" class="bg-slate-800 hover:bg-slate-700 text-white px-4 py-3 rounded font-medium w-full dark:bg-slate-200 dark:text-slate-900 dark:hover:bg-slate-50">Save password</button>
                </div>
            </form>

            <h2 class="w-full pt-10 pb-2 font-semibold text-center">Delete Account</h2>
            @can('delete', $user)
            <form action="{{ route('profile.destroy', $user) }}" method="POST">
            @csrf
            @method('DELETE')
                <button type="submit" onclick="return confirm('Confirm, do you want to delete your account and its data (you will not be able to retrieve it if you change your mind).')" class="bg-red-200 text-red-800 px-4 py-3 rounded font-medium w-full mt-2 mb-10 dark:hover:bg-red-50">Delete</button>
            </form>
            @endcan
            {{-- </div>
        </div> --}}
    </x-layout>
