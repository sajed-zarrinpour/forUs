<?php

namespace App\Livewire;

use App\Livewire\Forms\PostiotionForm;
use App\Models\Application;
use App\Models\Position;
use Livewire\Component;

class Positions extends Component
{
    public PostiotionForm $form;

    public function mount(Position $position)
    {
        $this->form->setPosition($position);
    }

    public function save()
    {
        if ($this->form->only('position.id')['position.id']!==null) {
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
        return view('livewire.positions',[
            'positions' => Position::all()
        ]);
    }


    public function delete($id)
    {
        Position::find($id)->delete();
    }
}
