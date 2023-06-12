<div x-data>
    <div class="flex justify-end gap-2">
        @if ($personal_information)
            <x-filament::button @click="printOut($refs.resume.outerHTML, 'ALUMNITRACER RESUME', '{{ Vite::asset('resources/css/app.css') }}')" role="button" color="success" icon="ri-save-3-line">
                <span>Download</span>
            </x-filament::button>
        @endif
        <x-filament::button icon="ri-user-settings-line" tag="a" href="{{ route('personal-information.manage', [
            'user' => auth()->id(),
        ]) }}">
            <span>Manage</span>
        </x-filament::button>
    </div>
    <div>
        @if ($personal_information)
            <div iv x-ref="resume" class="border-slate-900 dark:border-white dark:divide-white border-2 mt-4 print:mt-0 flex divide-x-2 divide-black">
                <div class="p-8 print:p-2 w-2/5 flex flex-col">
                    <div class="flex-1">
                        <div class="w-32 h-32 mx-auto overflow-clip rounded-full border-2 border-primary ">
                            <img class="bg-cover bg-center" src="{{ $personal_information->user->avatar?->getUrl() ?? asset('images/user.jpg') }}" alt="profile photo">
                        </div>
                        <div class="mt-4">
                            <p class="prose text-xs italic dark:text-white text-center whitespace-pre-line">{{ $personal_information->bio }}</p>
                        </div>
                        <div class="mt-8 text-sm">
                            <h3 class="font-semibold text-lg uppercase">Contact</h3>
                            <div class="space-y-2 flex flex-col mt-2 pl-4">
                                <div class="flex items-center gap-2">
                                    <x-ri-mail-line class="flex-shrink-0 self-start" />
                                    <p class="break-all">{{ $personal_information->user->email }}</p>
                                </div>
                                <div class="flex items-center gap-2">
                                    <x-ri-phone-line class="flex-shrink-0 self-start" />
                                    <span>{{ $personal_information->contact_number }}</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <x-ri-map-pin-line class="flex-shrink-0 self-start" />
                                    <span>{{ $personal_information->address }}</span>
                                </div>
                            </div>
                        </div>

                        @if ($personal_information->skills)
                            <div class="mt-8">
                                <h3 class="font-semibold text-lg uppercase">Skills</h3>
                                <ul class="mt-2 pl-4">
                                    @foreach ($personal_information->skills as $skill)
                                        <li class="flex items-center gap-2">
                                            <x-ri-lightbulb-flash-line />
                                            <span>{{ $skill }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($personal_information->hobbies)
                            <div class="mt-8">
                                <h3 class="font-semibold text-lg uppercase">Hobbies</h3>
                                <ul class="mt-2 pl-4">
                                    @foreach ($personal_information->hobbies as $hobby)
                                        <li class="flex items-center gap-2">
                                            <x-ri-sparkling-line />
                                            <span>{{ $hobby }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div>
                        <p class="text-xs italic">Last Updated: {{ $personal_information->updated_at->format('F d, Y') }}</p>
                    </div>
                </div>
                <div class="p-8 print:p-4 w-3/5">
                    <h1 class="text-4xl print:text-2xl font-semibold">{{ $personal_information->full_name }}</h1>
                    <div class="flex items-center gap-2 mt-2">
                        @if ($personal_information->post_nominal_designations)
                            <p class="border inline px-2 bg-primary font-semibold">{{ $personal_information->post_nominal_designations }}</p>
                        @endif
                        <p class="">{{ $personal_information->current_designation }}</p>
                    </div>
                    <div class="mt-8">
                        <p class="font-semibold text-lg uppercase">Education</p>
                        <ul class="space-y-2 mt-4">
                            @forelse ($personal_information->educational_background as $educational_background)
                                <li class="p-2 border-2 border-primary rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div class="text-sm flex items-center gap-2 font-semibold">
                                            <x-ri-graduation-cap-line class="flex-shrink-0" />
                                            <span>{{ $educational_background->level_description }}</span>
                                        </div>
                                        <p class="text-sm font-bold">{{ $educational_background->year_enrolled->format('Y') }} - {{ $educational_background->year_graduated?->format('Y') ?? 'PRESENT' }}</p>
                                    </div>
                                    @if ($educational_background->academic_program)
                                        <div class="text-lg flex items-center gap-2">
                                            <x-ri-book-mark-line class="flex-shrink-0" />
                                            <span class="font-bold text-primary-700">{{ $educational_background->academic_program }}</span>
                                        </div>
                                    @endif
                                    <div class="flex items-center gap-2">
                                        <x-ri-school-line class="flex-shrink-0" />
                                        <span>{{ $educational_background->institution }}</span>
                                    </div>
                                    @isset($educational_background->other_details['remarks'])
                                        <div class="dark:text-white prose flex items-center gap-2 text-sm italic">
                                            <x-ri-git-commit-line />
                                            <span>{{ $educational_background->other_details['remarks'] }}</span>
                                        </div>
                                    @endisset
                                </li>
                            @empty
                                <li>No records found.</li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="mt-8">
                        <p class="font-semibold text-lg uppercase">Work Experience</p>
                        <ul class="space-y-2 mt-4">
                            @forelse ($personal_information->work_experiences as $work_experience)
                                <li class="p-2 border-2 border-primary rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <p class="text-sm flex items-center gap-2 font-semibold">
                                            <x-ri-building-4-line />
                                            <span>{{ $work_experience->employer }}</span>
                                        </p>
                                        <p class="text-sm font-bold">{{ $work_experience->date_from->format('Y') }} - {{ $work_experience->date_to?->format('Y') ?? 'PRESENT' }}</p>
                                    </div>
                                    <p class="text-lg flex items-center gap-2">
                                        <x-ri-tools-line />
                                        <span class="font-bold text-primary-700">{{ $work_experience->designation }}</span>
                                    </p>
                                    @isset($work_experience->other_details['remarks'])
                                        <div class="dark:text-white prose flex items-center gap-2 text-sm italic">
                                            <x-ri-git-commit-line />
                                            <span>{{ $work_experience->other_details['remarks'] }}</span>
                                        </div>
                                    @endisset
                                </li>
                            @empty
                                <li>No records found.</li>
                            @endforelse
                        </ul>
                    </div>
                    <div class="mt-8">
                        <p class="font-semibold text-lg uppercase">References</p>
                        <ul class="space-y-2 mt-4">
                            @forelse ($personal_information->references as $reference)
                                <li class="flex items-center justify-between">
                                    <p class="flex items-center gap-2">
                                        <x-ri-contacts-line />
                                        <span>{{ $reference['name'] }}</span>
                                    </p>
                                    <p class="flex items-center gap-2">
                                        <x-ri-contacts-book-line />
                                        <span>{{ $reference['contact'] }}</span>
                                    </p>
                                </li>
                            @empty
                                <li>No records found.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        @else
            <div>
                <p>Click on manage to update your personal information.</p>
            </div>
        @endif
    </div>
</div>
