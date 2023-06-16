@props([
    'maxContentWidth' => null,
    'title' => '',
])

<x-layouts.base :title="$title">
    <div class="filament-app-layout flex h-screen w-full overflow-y-auto overflow-x-clip">
        <div class="filament-sidebar-close-overlay fixed inset-0 z-20 h-full w-full bg-gray-900/50 lg:hidden" x-data="{}" x-cloak x-show="$store.sidebar.isOpen" x-transition.opacity.500ms x-on:click="$store.sidebar.close()"></div>

        <x-layouts.app.sidebar.index />

        <div class="filament-main w-screen flex-1 flex-col gap-y-6 rtl:lg:pl-0 flex lg:pl-[var(--sidebar-width)] rtl:lg:pr-[var(--sidebar-width)]">
            <x-topbar />

            <div @class([
                'filament-main-content mx-auto w-full flex-1 px-4 md:px-6 lg:px-8',
                match (($maxContentWidth ??= config('filament.layout.max_content_width'))) {
                    null, '7xl', '' => 'max-w-7xl',
                    'xl' => 'max-w-xl',
                    '2xl' => 'max-w-2xl',
                    '3xl' => 'max-w-3xl',
                    '4xl' => 'max-w-4xl',
                    '5xl' => 'max-w-5xl',
                    '6xl' => 'max-w-6xl',
                    'full' => 'max-w-full',
                    default => $maxContentWidth,
                },
            ])>
                @isset($slot)
                    {{ $slot }}
                @endisset
            </div>

            <div class="filament-main-footer shrink-0 py-4">
                <x-footer />
            </div>
        </div>
    </div>
</x-layouts.base>
