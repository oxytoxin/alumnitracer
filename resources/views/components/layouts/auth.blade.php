<!DOCTYPE html>
<html lang="en-US" class="filament js-focus-visible min-h-screen antialiased">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>
        {{ $title ?? config('app.name') }}
    </title>

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        [x-cloak=''],
        [x-cloak='x-cloak'],
        [x-cloak='1'] {
            display: none !important;
        }

        @media (max-width: 1023px) {
            [x-cloak='-lg'] {
                display: none !important;
            }
        }

        @media (min-width: 1024px) {
            [x-cloak='lg'] {
                display: none !important;
            }
        }

        :root {
            --sidebar-width: 20rem;
            --collapsed-sidebar-width: 5.4rem;
        }
    </style>
    <script>
        const theme = localStorage.getItem('theme')
        if (theme === 'dark') {
            document.documentElement.classList.add('dark')
        }
    </script>

</head>

<body class="min-h-screen font-poppins flex flex-col dark:bg-gray-900 dark:text-gray-100 overflow-y-auto bg-gray-200 text-gray-900">
    <div x-data="darkmode" x-cloak class="fixed right-4 top-4">
        @if (config('filament.dark_mode'))
            <button class="border-2 border-primary rounded-full p-1" x-show="theme === 'dark'" x-on:click="close(); mode = 'manual'; theme = 'light'">
                <x-heroicon-s-sun class="w-6 text-primary" />
            </button>
            <button class="border-2 border-primary rounded-full p-1" x-cloak x-show="theme === 'light'" x-on:click="close(); mode = 'manual'; theme = 'dark'">
                <x-heroicon-s-moon class="w-6 text-primary" />
            </button>
        @endif
    </div>
    <div class="flex-1 flex flex-col">
        @isset($slot)
            {{ $slot }}
        @endisset
    </div>
    <div>
        <x-footer />
    </div>
    @livewire('notifications')
    @livewireScripts
</body>

</html>
