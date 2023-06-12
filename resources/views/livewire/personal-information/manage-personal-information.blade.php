<div x-data @keydown.ctrl.s.prevent.window="$wire.save;
">
    <div class="bg-white dark:bg-slate-900 dark:border-white p-8 border-2 border-slate-900">
        {{ $this->form }}
    </div>
    <div class="flex mt-8 justify-end">
        <x-filament::button wire:click="save" wire:target="save">SAVE</x-filament::button>
    </div>
</div>
