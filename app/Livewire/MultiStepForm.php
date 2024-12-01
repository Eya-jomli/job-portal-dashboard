<?php
namespace App\Http\Livewire;

use Livewire\Component;

class MultiStepForm extends Component
{
    public $currentStep = 1;
    public $selectedDegree;

    public function setDegree($degree)
    {
        $this->selectedDegree = $degree;
        $this->nextStep();
    }

    public function nextStep()
    {
        $this->currentStep++;
    }

    public function render()
    {
        return view('livewire.multi-step-form');
    }
}
