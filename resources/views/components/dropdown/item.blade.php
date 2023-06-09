@captureSlots(['detail'])

<x-support.dropdown.list.item :attributes="\Filament\Support\prepare_inherited_attributes($attributes)->merge($slots)">
    {{ $slot }}
</x-support.dropdown.list.item>
