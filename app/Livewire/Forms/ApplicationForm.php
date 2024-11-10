<?php

namespace App\Livewire\Forms;

use App\Models\Application;
use App\Models\Position;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Livewire\Form;
use Livewire\WithFileUploads; // For file uploads

class ApplicationForm extends Form
{
    use WithFileUploads; // Enables file uploads

    public ?Application $application;

    #[Validate('required|min:5')]
    public $email = '';
    #[Validate('required')]
    public $applied_at = '';
    #[Validate('nullable')]
    public $interview_at = '';
    #[Validate('nullable')]
    public $sop = '';
    #[Validate('nullable')]
    public $motivation_letter = '';
    #[Validate('nullable')]
    public $cv = '';
    #[Validate('nullable')]
    public $tr_bachelor = '';
    #[Validate('nullable')]
    public $tr_master = '';
    #[Validate('nullable')]
    public $tr_phd = '';
    #[Validate('nullable')]
    public $crt_bachelor = '';
    #[Validate('nullable')]
    public $crt_master = '';
    #[Validate('nullable')]
    public $crt_phd = '';
    #[Validate('nullable')]
    public $custom_form = '';
    #[Validate('nullable')]
    public $refrence_letter = '';
    #[Validate('nullable')]
    public $additional_info = '';
    #[Validate('nullable')]
    public $user_id = '';
    #[Validate('nullable')]
    public $position_id = '';
    

    public function store()
    {
        $this->validate();
        $this->application = Application::create($this->only([
            'email',
            'applied_at',
            'interview_at',
            'position_id',
            'additional_info',
        ]));
        // var_dump($this->application);
         // Handle file uploads
         foreach (['sop', 'motivation_letter', 'cv', 'tr_bachelor', 'tr_master', 'tr_phd', 'crt_bachelor', 'crt_master', 'crt_phd', 'custom_form', 'refrence_letter'] as $field) {
            if ($this->$field) {
 
                $originalName = $this->$field->getClientOriginalName();
                $destinationPath = 'documents/'.auth()->user()->name; // Set the path where you want to save
                $path = $this->$field->storeAs(
                    $destinationPath, $originalName,'public'
                );

                $this->application->$field = $path;
            }
        }
        $this->application->save();
    }

    public function setApplication(Position $position, Application $application)
    {
        $this->application = $application;
 
        $this->email = $application->email;
        $this->applied_at = $application->applied_at;
        $this->interview_at = $application->interview_at;
        $this->sop = $application->sop;
        $this->motivation_letter = $application->motivation_letter;
        $this->cv = $application->cv;
        $this->tr_bachelor = $application->tr_bachelor;
        $this->tr_master = $application->tr_master;
        $this->tr_phd = $application->tr_phd;
        $this->crt_bachelor = $application->crt_bachelor;
        $this->crt_master = $application->crt_master;
        $this->crt_phd = $application->crt_phd;
        $this->custom_form = $application->custom_form;
        $this->refrence_letter = $application->refrence_letter;
        $this->additional_info = $application->additional_info;
        $this->user_id = $application->user_id;
        $this->position_id = $application->position_id??$position->id;
    }

    public function update()
    {
        $this->validate();

        $data = $this->all();

        // Handle file uploads
        foreach (['sop', 'motivation_letter', 'cv', 'tr_bachelor', 'tr_master', 'tr_phd', 'crt_bachelor', 'crt_master', 'crt_phd', 'custom_form', 'refrence_letter'] as $field) {
            if (($file_input = $data[$field]) instanceof TemporaryUploadedFile) {
                $originalName = $file_input->getClientOriginalName();
                $destinationPath = 'documents/'.auth()->user()->name; // Set the path where you want to save
                
                if(file_exists($this->application->$field))
                {
                    Storage::delete($this->application->$field);
                }

                $path = $file_input->storeAs(
                    $destinationPath, $originalName,'public'
                );

                $this->application->$field = $path;
            }
        }

        $this->application->update([
                'email' => $data['email']??$this->application->email,
                'applied_at' => $data['applied_at']??$this->application->applied_at,
                'interview_at' => $data['interview_at']??$this->application->interview_at,
                'position_id' => $data['position_id']??$this->application->position_id,
                'additional_info' => $data['additional_info']??$this->application->additional_info,
            ]
        );

    }
}
