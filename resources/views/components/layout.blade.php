<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@isset($title){{ $title }} -@endisset To Do App</title>
</head>
<body class="antialiased">
    <div class="bg-white text-slate-700 dark:text-slate-200  min-h-screen dark:bg-slate-900">
        <div class="font-sans max-w-3xl mx-auto p-6 md:p-16">
            <h1 class="text-center"><a href="/"><span class="text-center font-bold leading-tight text-5xl mb-0">TO</span><span class="text-center font-thin leading-tight text-5xl mb-0">DO</span></a></h1>
            <h2 class="text-lg text-center mb-6">A minimal to-do app</h2>

            {{-- Dark mode toggle --}}
            <div class="flex justify-center items-center space-x-2 mb-16">
                <span class="text-sm text-gray-800 dark:text-gray-500">Light</span>
                <label for="toggle" class="w-9 h-5 flex items-center bg-gray-300 rounded-full p-1 cursor-pointer duration-300 ease-in-out">
                <div class="toggle-dot bg-white w-4 h-4 rounded-full shadow-md transform duration-300 ease-in-out dark:translate-x-3"></div>
                </label>
                <span class="text-sm text-gray-400 dark:text-white">Dark</span>
                <input id="toggle" type="checkbox" class="hidden">
            </div>

            @guest
            <nav class="mx-auto max-w-full mb-16 sm:py-4" aria-label="guest navigation">
                <ul class="flex justify-center">
                    <li class="p-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">
                        <a href="{{ route('login') }}" class="p-2">Login</a>
                    </li>
                    <li class="p-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">
                        <a href="{{ route('register') }}" class="p-2">Register</a>
                    </li>
                </ul>
            </nav>
            @endguest
            @auth
            <nav class="flex justify-between max-w-full mb-16" aria-label="user navigation">
                <ul class="flex flex-col sm:flex sm:flex-row sm:justify-center">
                    <li class="py-1 sm:pr-2 sm:pt-1 sm:pl-0 sm:py-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">
                        <a href="{{ route('lists.index') }}">Lists</a>
                    </li>
                    <li class="py-1 sm:px-2 sm:pt-1 sm:py-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">
                        <a href="{{ route('my-day') }}">My Day</a>
                    </li>
                    <li class="py-1 sm:pl-2 sm:pt-1 sm:py-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">
                        <a href="{{ route('all-task') }}">All tasks</a>
                    </li>
                </ul>
                <ul class="flex flex-col sm:flex sm:flex-row sm:justify-center text-right ">
                    <li class="flex items-center sm:pb-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">
                        <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->avatar }}">
                        <a href="{{ route('profile.edit') }}" class="pr-0 pl-1 ">Profile</a>
                    </li>
                    <li class="mt-1 pr-0 sm:mt-0 sm:pt-1 sm:pl-4 sm:py-2 border-transparent border-b-2 hover:border-b-2 hover:border-slate-200">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="">Log out</button>
                        </form>
                    </li>
                </ul>
            </nav>
            @endauth
    {{ $slot }}
    {{-- </div>
   </div>
</div> --}}
<x-flash />
    <script>
        let darkMode = localStorage.getItem('darkMode');
        const darkModeToggle = document.querySelector('#toggle');

        // darkModeToggle.checked = (localStorage.getItem('isDarkMode') == true ? true : false)

        const enableDarkMode = () => {
        document.body.classList.add('dark');
        localStorage.setItem('darkMode', 'enabled');
        }

        const disableDarkMode = () => {
        document.body.classList.remove('dark');
        localStorage.setItem('darkMode', null);
        }

        if (darkMode === 'enabled') {
        enableDarkMode();
        }

        darkModeToggle.addEventListener('click', () => {
        darkMode = localStorage.getItem('darkMode');

        if (darkMode !== 'enabled') {
            enableDarkMode();
        } else {
            disableDarkMode();
        }
        });
    </script>
</body>
</html>
