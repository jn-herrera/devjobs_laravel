<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;

    public $cv;
    public $vacante;


    protected $rules = [
        'cv' => 'required|mimes:pdf'
    ];

    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }

    public function postularme()
    {
        $datos = $this->validate();

        //Almacenar CV en el disco duro
        $cv = $this->cv->store('public/cv');

        //str_replace es un metodo propio de php
        $datos['cv'] = str_replace('public/cv/', '', $cv);

        //Crear candidato a la vacante
        $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' => $datos['cv']
        ]);

        //Crear notificacion y enviar al email
        //Instanciar un nuevo candidato
        $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id, $this->vacante->titulo,auth()->user()->id));



        //Mostrar al usuario un mensaje de ok
        session()->flash('mensaje','El curriculum fue enviado correctamente');

        return redirect()->back();

    }




    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
