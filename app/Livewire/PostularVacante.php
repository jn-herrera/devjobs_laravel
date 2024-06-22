<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{

    public $cv;
    use WithFileUploads;

    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function postularme()
    {
        $this->validate();

        //Almacenar CV en el disco duro


        //Crear la vacante

        //Crear notificacion y enviar al email

        //Mostrar al usuario un mensaje de ok


    }




    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
