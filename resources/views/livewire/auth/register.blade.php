<div class="flex-1 flex flex-col justify-center gap-4">
    <div class="flex flex-col items-center gap-4">
        <div class="w-32 h-32">
            <img class="rounded-full" src="{{ asset('images/eso.jpg') }}" alt="eso logo">
        </div>
        <h1 class="text-3xl font-bold">ALUMNITRACER</h1>
    </div>
    <x-filament::card class="w-1/3 mx-auto">
        <form wire:submit.prevent="register">
            {{ $this->form }}
            <div class="flex flex-col items-end mt-2">
                <a class="text-sm text-primary mb-2 underline" href="{{ route('login') }}">Already have an account?</a>
                <x-filament::button type="submit" wire:target="register" class="w-full">REGISTER</x-filament::button>
            </div>
        </form>
    </x-filament::card>
</div>
