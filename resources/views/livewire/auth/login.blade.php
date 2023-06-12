<div class="flex-1 flex flex-col justify-center gap-4">
    <div class="flex flex-col items-center gap-4">
        <div class="w-32 h-32">
            <img class="rounded-full" src="{{ asset('images/eso.jpg') }}" alt="eso logo">
        </div>
        <h1 class="text-3xl font-bold">ALUMNITRACER</h1>
    </div>
    <form wire:submit.prevent="login" class="w-1/3 mx-auto">
        {{ $this->form }}
        <div class="flex flex-col items-end mt-2">
            <a class="text-sm text-primary mb-2 underline" href="{{ route('register') }}">Create an account</a>
            <x-filament::button type="submit" wire:target="login" class="w-full">LOGIN</x-filament::button>
        </div>
    </form>
</div>
