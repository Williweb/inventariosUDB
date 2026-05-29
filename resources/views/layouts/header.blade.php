<header class="bg-white border-b border-gray-100 px-6 py-4 flex items-center justify-between">
    <div>
        <h2 class="text-lg font-semibold text-gray-800">@yield('page-title', 'Panel')</h2>
        <p class="text-xs text-gray-400">@yield('page-subtitle', '')</p>
    </div>
    <div class="flex items-center gap-3">
        @yield('header-action')
    </div>
</header>
