<aside class="filament-sidebar fixed inset-y-0 left-0 z-20 flex h-screen w-[var(--sidebar-width)] flex-col overflow-hidden bg-white transition-all rtl:left-auto rtl:right-0 lg:z-0 lg:border-r rtl:lg:border-l rtl:lg:border-r-0 lg:translate-x-0 dark:border-gray-700 dark:bg-gray-800" x-data="{}" x-cloak="-lg"
       x-bind:class="$store.sidebar.isOpen ? 'filament-sidebar-open translate-x-0 shadow-2xl' : '-translate-x-full lg:translate-x-0 lg:shadow-2xl rtl:lg:-translate-x-0 rtl:translate-x-full'">
    <header class="filament-sidebar-header relative flex h-[4rem] shrink-0 items-center justify-center border-b dark:border-gray-700">
        <div class="flex w-full items-center justify-center px-6">
            <div data-turbo="false" class="relative flex w-full items-center">
                <a href="#" class="inline-block">
                    <x-brand />
                </a>
            </div>
        </div>
    </header>

    <nav class="filament-sidebar-nav flex-1 overflow-y-auto overflow-x-hidden py-4">
        <ul class="space-y-2 flex flex-col px-2">
            <a x-on:click="window.matchMedia(`(max-width: 1024px)`).matches && $store.sidebar.close()" href="{{ route('home') }}">
                <li @class([
                    'flex hover:bg-primary hover:text-white duration-200 p-2 rounded-lg items-center gap-2',
                    'border-l-2 border-b-2 border-primary' => in_array(url()->current(), [
                        route('home'),
                    ]),
                ])>
                    <x-ri-home-3-line />
                    <span>Homepage</span>
                </li>
            </a>
            <a x-on:click="window.matchMedia(`(max-width: 1024px)`).matches && $store.sidebar.close()" href="{{ route('personal-information.show', [
                'user' => auth()->id(),
            ]) }}">
                <li @class([
                    'flex hover:bg-primary hover:text-white duration-200 p-2 rounded-lg items-center gap-2',
                    'border-l-2 border-b-2 border-primary' => in_array(url()->current(), [
                        route('personal-information.show', [
                            'user' => auth()->id(),
                        ]),
                        route('personal-information.manage', [
                            'user' => auth()->id(),
                        ]),
                    ]),
                ])>
                    <x-ri-user-line />
                    <span>Personal Information</span>
                </li>
            </a>
        </ul>

    </nav>

</aside>
