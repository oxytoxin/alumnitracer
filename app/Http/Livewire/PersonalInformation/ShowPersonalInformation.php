<?php

namespace App\Http\Livewire\PersonalInformation;

use App\Models\User;
use Livewire\Component;

class ShowPersonalInformation extends Component
{
    public User $user;

    public function render()
    {
        return view('livewire.personal-information.show-personal-information', [
            'personal_information' => $this->user->personal_information,
        ]);
    }
}
