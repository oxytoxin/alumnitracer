<?php

namespace App\Http\Livewire;

use App\Models\PersonalInformation;
use Livewire\Component;
use Livewire\WithPagination;

class Homepage extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.homepage', [
            'profiles' => PersonalInformation::paginate()
        ]);
    }
}
