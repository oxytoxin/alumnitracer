<?php

namespace App\Http\Livewire\PersonalInformation;

use App\Models\EducationalBackground;
use App\Models\PersonalInformation;
use App\Models\User;
use Awcodes\FilamentTableRepeater\Components\TableRepeater;
use DB;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TextInput\Mask;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class ManagePersonalInformation extends Component implements HasForms
{
    use InteractsWithForms;

    public $data;
    public $modelExists = false;
    public User $user;

    protected function getFormModel(): PersonalInformation|string
    {
        $model = PersonalInformation::firstWhere('user_id', auth()->id());
        if ($model) {
            $this->modelExists = true;
        }
        return $model ?? PersonalInformation::class;
    }

    protected function getFormSchema(): array
    {
        return [
            SpatieMediaLibraryFileUpload::make('avatar')
                ->collection('profile_photo')
                ->disk('profile_photos')
                ->avatar(),
            Fieldset::make('Basic Information')
                ->schema([
                    Textarea::make('bio')
                        ->placeholder('Write a short description of yourself...')
                        ->maxLength(60000),
                    TextInput::make('current_designation')
                        ->maxLength(125),
                    TextInput::make('first_name')
                        ->required()
                        ->maxLength(125),
                    TextInput::make('last_name')
                        ->required()
                        ->maxLength(125),
                    TextInput::make('middle_name')
                        ->maxLength(125),
                    TextInput::make('suffix')
                        ->maxLength(125),
                    TextInput::make('post_nominal_designations')
                        ->label('Post-Nominal Designations')
                        ->placeholder('PhD, MS, MBA, etc.')
                        ->maxLength(125),
                ]),

            Grid::make(2)
                ->schema([
                    TextInput::make('address')
                        ->required(),
                    TextInput::make('contact_number')
                        ->required()
                        ->mask(fn (Mask $mask) => $mask->pattern('{+639000000000}'))
                        ->maxLength(125),
                    TextInput::make('year_graduated')
                        ->required()
                        ->mask(fn (Mask $mask) => $mask->pattern('0000'))
                        ->numeric()
                        ->maxLength(125),
                    TextInput::make('id_number')
                        ->label('ID Number')
                        ->regex('/[0-9]{4}-[0-9]+/')
                        ->mask(fn (Mask $mask) => $mask->pattern('{0000-0000000}'))
                        ->required()
                        ->maxLength(125),
                ]),
            Repeater::make('educational_background')
                ->columns(2)
                ->relationship()
                ->schema([
                    Select::make('level')
                        ->options(EducationalBackground::LEVELS)
                        ->required(),
                    TextInput::make('academic_program')
                        ->maxLength(125),
                    TextInput::make('institution')
                        ->required()
                        ->maxLength(125),
                    DatePicker::make('year_enrolled')
                        ->withoutTime()
                        ->required(),
                    DatePicker::make('year_graduated')
                        ->afterOrEqual('year_enrolled')
                        ->withoutTime()
                        ->required(),
                    Textarea::make('other_details.remarks')
                        ->rows(2)
                        ->columnSpanFull()
                        ->label('Awards/Recognition')
                ])
                ->orderable(),
            Repeater::make('work_experiences')
                ->columns(2)
                ->relationship()
                ->schema([
                    TextInput::make('employer')
                        ->required()
                        ->maxLength(125),
                    TextInput::make('designation')
                        ->required()
                        ->maxLength(125),
                    DatePicker::make('date_from')
                        ->withoutTime()
                        ->required(),
                    DatePicker::make('date_to')
                        ->afterOrEqual('date_from')
                        ->withoutTime()
                        ->required(),
                    Textarea::make('other_details.remarks')
                        ->rows(2)
                        ->columnSpanFull()
                        ->label('Trainings/Recognition')
                ])
                ->orderable(),
            TagsInput::make('skills')->placeholder('Add skills...'),
            TagsInput::make('hobbies')->placeholder('Add hobbies...'),
            TableRepeater::make('references')
                ->hideLabels()
                ->schema([
                    TextInput::make('name')
                        ->required(),
                    TextInput::make('contact')
                        ->label('Email/Contact #')
                ])
        ];
    }

    protected function getFormStatePath(): ?string
    {
        return 'data';
    }

    public function mount()
    {
        $info = $this->user->personal_information;
        if ($info) {
            $this->form->fill([
                'current_designation' => $info->current_designation,
                'bio' => $info->bio,
                'first_name' => $info->first_name,
                'last_name' => $info->last_name,
                'middle_name' => $info->middle_name,
                'suffix' => $info->suffix,
                'post_nominal_designations' => $info->post_nominal_designations,
                'address' => $info->address,
                'year_graduated' => $info->year_graduated,
                'id_number' => $info->id_number,
                'contact_number' => $info->contact_number,
                'skills' => $info->skills,
                'hobbies' => $info->hobbies,
                'references' => $info->references,
            ]);
        } else {
            $this->form->fill();
        }
    }

    public function render()
    {
        return view('livewire.personal-information.manage-personal-information');
    }

    public function save()
    {
        try {
            $data = $this->form->getState();
        } catch (\Throwable $th) {
            Notification::make()->title('Input error.')
                ->body($th->getMessage())
                ->danger()
                ->send();
            throw $th;
        }
        DB::beginTransaction();
        $personalInformation = PersonalInformation::updateOrCreate(
            [
                'user_id' => auth()->id(),
            ],
            [
                'current_designation' => $data['current_designation'],
                'bio' => $data['bio'],
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'middle_name' => $data['middle_name'],
                'suffix' => $data['suffix'],
                'post_nominal_designations' => $data['post_nominal_designations'],
                'address' => $data['address'],
                'year_graduated' => $data['year_graduated'],
                'id_number' => $data['id_number'],
                'contact_number' => $data['contact_number'],
                'skills' => $data['skills'],
                'hobbies' => $data['hobbies'],
                'references' => $data['references'],
            ]
        );

        $this->form->model($personalInformation)->saveRelationships();

        DB::commit();
        Notification::make()->title('Changes saved!')->success()->send();
    }
}
