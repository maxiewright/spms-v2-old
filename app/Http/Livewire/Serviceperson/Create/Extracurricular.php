<?php

namespace App\Http\Livewire\Serviceperson\Create;

use App\Http\Livewire\Traits\WithSteps;
use Livewire\Component;

class Extracurricular extends Component
{
    use WithSteps;

    public function render()
    {
        return view('livewire.serviceperson.create.extracurricular');
    }
}
