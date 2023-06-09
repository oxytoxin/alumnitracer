<x-dropdown placement="bottom-end">
    <x-slot name="trigger" class="ml-4 rtl:ml-0 rtl:mr-4">
        <button class="flex w-8 h-8 border-2 rounded-full flex-col items-center justify-center border-black">
            <div class=" ">L</div>
        </button>
    </x-slot>

    <x-dropdown.list x-data="{
        mode: null,
    
        theme: null,
    
        init: function() {
            this.theme = localStorage.getItem('theme') || (this.isSystemDark() ? 'dark' : 'light')
            this.mode = localStorage.getItem('theme') ? 'manual' : 'auto'
    
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (event) => {
                if (this.mode === 'manual') return
    
                if (event.matches && (!document.documentElement.classList.contains('dark'))) {
                    this.theme = 'dark'
    
                    document.documentElement.classList.add('dark')
                } else if ((!event.matches) && document.documentElement.classList.contains('dark')) {
                    this.theme = 'light'
    
                    document.documentElement.classList.remove('dark')
                }
            })
    
            $watch('theme', () => {
                if (this.mode === 'auto') return
    
                localStorage.setItem('theme', this.theme)
    
                if (this.theme === 'dark' && (!document.documentElement.classList.contains('dark'))) {
                    document.documentElement.classList.add('dark')
                } else if (this.theme === 'light' && document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark')
                }
    
                $dispatch('dark-mode-toggled', this.theme)
            })
        },
    
        isSystemDark: function() {
            return window.matchMedia('(prefers-color-scheme: dark)').matches
        },
    }">
        <div>
            @if (config('filament.dark_mode'))
                <x-dropdown.list.item icon="heroicon-s-moon" x-show="theme === 'dark'" x-on:click="close(); mode = 'manual'; theme = 'light'">
                    Toggle Light Mode
                </x-dropdown.list.item>

                <x-dropdown.list.item icon="heroicon-s-sun" x-show="theme === 'light'" x-on:click="close(); mode = 'manual'; theme = 'dark'">
                    Toggle Dark Mode
                </x-dropdown.list.item>
            @endif
        </div>
    </x-dropdown.list>
</x-dropdown>
