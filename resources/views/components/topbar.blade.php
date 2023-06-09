<header class="filament-main-topbar sticky top-0 z-10 flex h-16 w-full shrink-0 items-center border-b bg-white dark:border-gray-700 dark:bg-gray-800">
    <div class="flex w-full items-center px-2 sm:px-4 md:px-6 lg:px-8">
        <button class="lg:hidden filament-sidebar-open-button flex h-10 w-10 shrink-0 items-center justify-center rounded-full text-primary-500 outline-none hover:bg-gray-500/5 focus:bg-primary-500/10" x-cloak x-data="{}" x-on:click="$store.sidebar.isOpen ? $store.sidebar.close() : $store.sidebar.open()" @class([''])>
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
        </button>

        <div class="flex flex-1 items-center justify-between">
            <div class="flex-1"></div>
            <x-layouts.app.topbar.user-menu />
        </div>
    </div>
</header>
