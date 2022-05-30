@if (session()->has('success'))
    <div class="fixed bottom-5 rounded right-5 bg-green-200 text-green-800 text-sm py-2 px-4 rounded-m">
        <p>{{ session('success') }}</p>
    </div>
@endif
