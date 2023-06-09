@props([
    'title' => null,
])

<!DOCTYPE html>
<html lang="en-US" class="filament js-focus-visible min-h-screen antialiased">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />


    <title>
        {{ $title ? "{$title} - " : null }} {{ config('filament.brand') }}
    </title>


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

    @livewireStyles
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script>
        const theme = localStorage.getItem('theme')

        if (
            theme === 'dark'
        ) {
            document.documentElement.classList.add('dark')
        }
    </script>

</head>

<body class="filament-body min-h-screen dark:bg-gray-900 dark:text-gray-100 overflow-y-auto bg-gray-100 text-gray-900">
    {{ $slot }}
    @livewire('notifications')
    @livewireScripts
    @stack('scripts')
</body>

</html>
