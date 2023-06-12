<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Auth;
use DB;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Auth\Events\Registered;
use Livewire\Component;

class Register extends Component implements HasForms
{
    use InteractsWithForms;

    public $email;

    public $password;

    public $password_confirmation;

    public $role;

    protected function getFormSchema(): array
    {
        return [
            Radio::make('role')
                ->inline()
                ->options([
                    'alumni' => 'Alumni',
                    'faculty' => 'Faculty',
                ])
                ->dehydrated(false)
                ->default('alumni'),
            TextInput::make('email')
                ->required()
                ->unique('users', 'email')
                ->endsWith('@msugensan.edu.ph')
                ->email(),
            TextInput::make('password')
                ->required()
                ->confirmed()
                ->password(),
            TextInput::make('password_confirmation')
                ->required()
                ->label('Confirm Password')
                ->dehydrated(false)
                ->password(),
        ];
    }

    public function mount()
    {
        $this->form->fill();
    }

    public function render()
    {
        return view('livewire.auth.register')
            ->layout('components.layouts.auth');
    }

    public function register()
    {
        $data = $this->form->getState();
        DB::beginTransaction();
        $user = User::create($data);
        $user->assignRole($this->role);
        event(new Registered($user));
        DB::commit();
        Auth::login($user);

        return redirect()->route('home');
    }
}
