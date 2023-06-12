<?php

use App\Http\Livewire\PersonalInformation\ManagePersonalInformation;
use App\Http\Livewire\PersonalInformation\ShowPersonalInformation;

Route::middleware('auth')->group(function () {
    Route::get('personal-information/{user}', ShowPersonalInformation::class)->name('personal-information.show');
    Route::get('personal-information/{user}/manage', ManagePersonalInformation::class)->name('personal-information.manage');
});
