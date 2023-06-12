<x-layouts.auth>
    <div class="flex-1 flex flex-col justify-center gap-4">
        <div class="flex flex-col items-center gap-4">
            <div class="w-32 h-32">
                <img class="rounded-full" src="{{ asset('images/eso.jpg') }}" alt="eso logo">
            </div>
            <h1 class="text-3xl font-bold">ALUMNITRACER</h1>
            <p class="text-sm">You must verify your email address. We have sent you an email.</p>
        </div>
        <form action="{{ route('verification.send') }}" method="post" class="w-1/3 mx-auto">
            @csrf
            <div class="flex flex-col items-end mt-2">
                <x-filament::button type="submit" wire:target="login" class="w-full">RESEND VERIFICATION LINK</x-filament::button>
                @if (session('message'))
                    <p class="text-sm italic mt-2">{{ session('message') }}</p>
                @endif
            </div>
        </form>
    </div>

</x-layouts.auth>
