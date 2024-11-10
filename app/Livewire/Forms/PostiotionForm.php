<?php

namespace App\Livewire\Forms;

use App\Models\Position;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PostiotionForm extends Form
{
    public ?Position $position;

    #[Validate('required|min:5')]
    public $url = '';
    #[Validate('required|min:5')]
    public $title = '';
    #[Validate('required|min:5')]
    public $organazaion = '';
    #[Validate('nullable|min:5')]
    public $location = '';
    #[Validate('nullable|min:5')]
    public $apply_link = '';
    #[Validate('nullable|min:5')]
    public $email = '';
    #[Validate('required|min:5')]
    public $deadline_at = '';

    public function store()
    {
        $this->validate();
        Position::create($this->all());
    }

    public function setPosition(Position $position)
    {
        $this->position = $position;
 
        $this->url = $position->url;
        $this->title = $position->title;
        $this->organazaion = $position->organazaion;
        $this->location = $position->location;
        $this->apply_link = $position->apply_link;
        $this->email = $position->email;
        $this->deadline_at = $position->deadline_at;
    }

    public function update()
    {
        $this->validate();

        $this->position->update(
            $this->all()
        );
    }
}
