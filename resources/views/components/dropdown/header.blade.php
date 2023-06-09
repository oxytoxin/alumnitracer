@captureSlots(['detail'])

<x-support.dropdown.header :attributes="\Filament\Support\prepare_inherited_attributes($attributes)->merge($slots)" :dark-mode="config('filament.dark_mode')">
    {{ $slot }}
</x-support.dropdown.header>
