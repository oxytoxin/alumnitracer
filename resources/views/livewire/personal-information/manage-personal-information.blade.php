<div x-data>

    <div class="bg-white dark:bg-slate-900 dark:border-white p-8 border-2 border-slate-900">
        {{ $this->form }}
    </div>


    <div class="flex justify-end mt-4">
        <x-filament::modal>
            @slot('trigger')
                <x-filament::button @keydown.ctrl.s.prevent.window="open" @click="open">SAVE</x-filament::button>
            @endslot
            @slot('header')
                <p>Are you sure?</p>
            @endslot
            @slot('actions')
                <div class="flex mt-8 px-4 justify-end">
                    <x-filament::button wire:target="save" @click="async () => {
                        let result = await $wire.save();
                        if(result != 'error'){
                            close();
                        }
                    }">SAVE</x-filament::button>
                </div>
            @endslot
            <div>
                <label class="font-semibold text-sm" for="remarks">Remarks</label>
                <textarea id="remarks" class="w-full rounded-lg" wire:model.defer="remarks"></textarea>
                @error('remarks')
                    <p>{{ error('message') }}</p>
                @enderror
            </div>
        </x-filament::modal>
    </div>

</div>
