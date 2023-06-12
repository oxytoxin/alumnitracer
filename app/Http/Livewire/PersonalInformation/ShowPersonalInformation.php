<?php

namespace App\Http\Livewire\PersonalInformation;

use App\Models\PersonalInformation;
use App\Models\User;
use Livewire\Component;

class ShowPersonalInformation extends Component
{
    public User $user;

    public function mount()
    {
        abort_unless(auth()->id() == $this->user->id, 403);
    }

    public function render()
    {
        return view('livewire.personal-information.show-personal-information', [
            'personal_information' => $this->user->personal_information,
        ]);
    }
}
