<aside class="filament-sidebar fixed inset-y-0 left-0 z-20 flex h-screen w-[var(--sidebar-width)] flex-col overflow-hidden bg-white transition-all rtl:left-auto rtl:right-0 lg:z-0 lg:border-r rtl:lg:border-l rtl:lg:border-r-0 lg:translate-x-0 dark:border-gray-700 dark:bg-gray-800" x-data="{}" x-cloak="-lg"
       x-bind:class="$store.sidebar.isOpen ? 'filament-sidebar-open translate-x-0 shadow-2xl' : '-translate-x-full lg:translate-x-0 lg:shadow-2xl rtl:lg:-translate-x-0 rtl:translate-x-full'">
    <header class="filament-sidebar-header relative flex h-[4rem] shrink-0 items-center justify-center border-b dark:border-gray-700">
        <div class="flex w-full items-center justify-center px-6" x-show="$store.sidebar.isOpen" x-transition:enter="lg:transition delay-100" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
            <div data-turbo="false" class="relative flex w-full items-center">
                <a href="#" class="inline-block">
                    <x-brand />
                </a>
            </div>
        </div>
    </header>

    <nav class="filament-sidebar-nav flex-1 overflow-y-auto overflow-x-hidden py-6">

        <ul class="space-y-6 px-6">
            <li>Link 1</li>
            <li>Link 2</li>
            <li>Link 3</li>
        </ul>

    </nav>

</aside>
