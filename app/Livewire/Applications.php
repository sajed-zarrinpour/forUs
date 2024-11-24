<?php

namespace App\Livewire;

use App\Livewire\Forms\ApplicationForm;
use App\Models\Application;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithFileUploads; // For file uploads

class Applications extends Component
{
    use WithFileUploads; // Enables file uploads

    public ApplicationForm $form;

    public function mount(Position $position, Application $application)
    {
        $this->form->setApplication($position, $application);
    }

    public function save()
    {
        if ($this->form->only('application.id')['application.id']!==null) 
        {
            $this->form->update();
        }
        else
        {
            $this->form->store();
        }
        return $this->redirect('/');
    }

    public function render()
    {
        return view('livewire.applications', ['position_id'=>$this->form->position_id]);
    }

    public function delete($id)
    {
        Application::find($id)->delete();
    }
}




// namespace App\Http\Livewire;

// use Livewire\Component;
// use Livewire\WithFileUploads; // For file uploads
// use App\Models\Application;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Storage;

// class ApplicationForm extends Component
// {
//     use WithFileUploads; // Enables file uploads

//     public $email;
//     public $applied_at;
//     public $interview_at;
//     public $sop;
//     public $motivation_letter;
//     public $cv;
//     public $tr_bachelor;
//     public $tr_master;
//     public $tr_phd;
//     public $crt_bachelor;
//     public $crt_master;
//     public $crt_phd;
//     public $custom_form;
//     public $refrence_letter;
//     public $additional_info;
//     public $position_id;

//     protected $rules = [
//         'email' => 'nullable|email',
//         'applied_at' => 'nullable|date',
//         'interview_at' => 'nullable|date',
//         'sop' => 'nullable|file|mimes:pdf|max:2048',
//         'motivation_letter' => 'nullable|file|mimes:pdf|max:2048',
//         'cv' => 'nullable|file|mimes:pdf|max:2048',
//         'tr_bachelor' => 'nullable|file|mimes:pdf|max:2048',
//         'tr_master' => 'nullable|file|mimes:pdf|max:2048',
//         'tr_phd' => 'nullable|file|mimes:pdf|max:2048',
//         'crt_bachelor' => 'nullable|file|mimes:pdf|max:2048',
//         'crt_master' => 'nullable|file|mimes:pdf|max:2048',
//         'crt_phd' => 'nullable|file|mimes:pdf|max:2048',
//         'custom_form' => 'nullable|file|mimes:pdf|max:2048',
//         'refrence_letter' => 'nullable|file|mimes:pdf|max:2048',
//         'additional_info' => 'nullable|string',
//         'position_id' => 'required|integer',
//     ];

//     public function submit()
//     {
//         $this->validate();

//         $application = new Application();
//         $application->email = $this->email;
//         $application->applied_at = $this->applied_at;
//         $application->interview_at = $this->interview_at;
//         $application->user_id = Auth::id(); // Automatically set user ID
//         $application->position_id = $this->position_id;
//         $application->additional_info = $this->additional_info;

//         // Handle file uploads
//         foreach (['sop', 'motivation_letter', 'cv', 'tr_bachelor', 'tr_master', 'tr_phd', 'crt_bachelor', 'crt_master', 'crt_phd', 'custom_form', 'refrence_letter'] as $field) {
//             if ($this->$field) {
//                 $path = $this->$field->store('applications'); // Adjust storage path as needed
//                 $application->$field = $path;
//             }
//         }

//         $application->save();

//         session()->flash('success', 'Application submitted successfully.');
//         $this->reset(); // Reset form fields after submission
//     }

//     public function render()
//     {
//         return view('livewire.application-form');
//     }
// }