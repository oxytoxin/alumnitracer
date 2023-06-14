<div>
    <div class="grid grid-cols-ram gap-4 mb-8">
        @foreach ($profiles as $profile)
            <div class="bg-white dark:bg-slate-800 border-primary border-2 p-2 flex flex-col">
                <div class="w-32 h-32 mx-auto border-2 border-slate-500">
                    <img class="object-cover object-center" src="{{ $profile->user->avatar?->getUrl() ?? asset('images/user.jpg') }}" alt="profile photo">
                </div>
                <div class="mt-2 flex flex-col">
                    <p class="px-2 p-1 border border-primary bg-primary self-center text-xs font-semibold">{{ $profile->id_number }}</p>
                    <h3 class="font-semibold mt-2">{{ $profile->full_name }}</h3>
                    <p class="italic text-sm">Class of {{ $profile->year_graduated ?? 'Unknown' }}</p>
                </div>
                <div class="flex-1"></div>
                <div class="flex justify-end mt-4">
                    <a class="border-primary border px-2 hover:bg-primary duration-200 text-sm" href="{{ route('personal-information.show', [
                        'user' => $profile->user_id,
                    ]) }}">Visit</a>
                </div>
            </div>
        @endforeach
    </div>
    {{ $profiles->links() }}
</div>
