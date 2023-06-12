<x-dropdown placement="bottom-end">
    <x-slot name="trigger" class="ml-4 rtl:ml-0 rtl:mr-4">
        <button class="flex w-8 h-8 border-2 rounded-full flex-col overflow-clip items-center justify-center border-black">
            <img class="bg-cover bg-center" src="{{ auth()->user()->avatar?->getUrl() ?? asset('images/user.jpg') }}" alt="">
        </button>
    </x-slot>

    <x-dropdown.list>
        <div>
            @auth
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    <x-dropdown.list.item icon="heroicon-s-logout" type="submit">
                        Logout
                    </x-dropdown.list.item>
                </form>
            @endauth
        </div>
    </x-dropdown.list>
</x-dropdown>
