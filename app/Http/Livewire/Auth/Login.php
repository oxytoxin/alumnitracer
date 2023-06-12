<?php

namespace App\Http\Livewire\Auth;

use Auth;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Login extends Component implements HasForms
{
    use InteractsWithForms;

    public $email;

    public $password;

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('email')
                ->required()
                ->email(),
            TextInput::make('password')
                ->required()
                ->password(),
        ];
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.auth');
    }

    public function login()
    {
        $data = $this->form->getState();
        if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
            session()->regenerate();

            return redirect()->route('welcome');
        } else {
            $this->password = '';
            throw ValidationException::withMessages([
                'email' => 'Invalid credentials.',
            ]);
        }
    }
}
