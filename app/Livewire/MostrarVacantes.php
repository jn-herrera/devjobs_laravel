<?php

namespace App\Livewire;

use App\Models\Vacante;
use Livewire\Component;

class MostrarVacantes extends Component
{
    public function render()
    {
        //solo recupera vacantes asociadas al usuario con auth()->user()->id
        $vacantes = Vacante::where('user_id', auth()->user()->id)->paginate(10);
        
        return view('livewire.mostrar-vacantes', [
            'vacantes' => $vacantes
        ]);

    }
}
